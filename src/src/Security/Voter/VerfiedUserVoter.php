<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

final class VerfiedUserVoter extends Voter
{
  public const VERIFIED_USER = 'VERIFIED_USER';

  protected function supports(string $attribute, mixed $subject): bool
  {
    return $attribute === self::VERIFIED_USER;
  }

  protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
  {
    $user = $token->getUser();

    // if the user is anonymous, do not grant access
    /** @var \App\Entity\User|null $user */
    if (null === $user) {
      return false;
    }

    // ... (check conditions and return true to grant permission) ...
    switch ($attribute) {
      case self::VERIFIED_USER:
        return $user->isVerified();
    }

    return false;
  }
}
