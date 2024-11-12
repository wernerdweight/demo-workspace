<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Marvin255\RandomStringGenerator\Generator\RandomStringGenerator;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
  public function __construct(private EmailVerifier $emailVerifier)
  {
  }

  #[Route('/register', name: 'app_register')]
  public function register(
    Request $request,
    UserPasswordHasherInterface $userPasswordHasher,
    Security $security,
    EntityManagerInterface $entityManager,
    RandomStringGenerator $randomStringGenerator,
  ): Response {
    $user = new User();
    $form = $this->createForm(RegistrationFormType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      /** @var string $plainPassword */
      $plainPassword = $form->get('plainPassword')->getData();

      // encode the plain password
      $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));
      $user->setConfirmationToken($randomStringGenerator->alphanumeric(32));

      $entityManager->persist($user);
      $entityManager->flush();

      $template = new TemplatedEmail();
      $template->from(new Address('my@doamin.com', 'Football Stats Done Wrong'));
      $template->to($user->getEmail());
      $template->subject('Please Confirm your Email');
      $template->htmlTemplate('registration/confirmation_email.html.twig');

      // generate a signed url and email it to the user
      $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user, $template);

      return $this->redirectToRoute('app_register', ['registrationComplete' => true]);
    }

    $registrationComplete = $request->query->getBoolean('registrationComplete');

    return $this->render('registration/register.html.twig', [
      'registrationForm' => $form,
      'registrationComplete' => $registrationComplete,
    ]);
  }

  #[Route('/verify/email/{confirmationToken}', name: 'app_verify_email')]
  public function verifyUserEmail(
    UserRepository $userRepository,
    EntityManagerInterface $entityManager,
    string $confirmationToken,
  ): Response {
    $user = $userRepository->findOneBy(['confirmationToken' => $confirmationToken]);
    if (null === $user) {
      throw new BadRequestHttpException('Invalid confirmation token');
    }
    $user->setVerified(true);
    $user->setConfirmationToken(null);
    $entityManager->flush();

    // @TODO Change the redirect on success and handle or remove the flash message in your templates
    $this->addFlash('success', 'Your email address has been verified.');

    return $this->redirectToRoute('app_login');
  }
}
