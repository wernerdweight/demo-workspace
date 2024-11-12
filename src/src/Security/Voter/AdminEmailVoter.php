<?php

namespace App\Security\Voter;

use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

final class AdminEmailVoter extends Voter
{
    public const IS_ADMIN_BY_EMAIL = 'IS_ADMIN_BY_EMAIL';

    protected function supports(string $attribute, mixed $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return $attribute === self::IS_ADMIN_BY_EMAIL;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {   
        /** @var User|null $user */
        $user = $token->getUser();

        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        $isAdminByEmail = strpos($user->getEmail(), 'admin') !== false;  

        return $isAdminByEmail;
    }
}
