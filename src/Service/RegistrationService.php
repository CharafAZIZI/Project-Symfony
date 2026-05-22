<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegistrationService
{
    public function __construct(
        private EntityManagerInterface $entityManager,      // ✅ CORRIGÉ
        private UserPasswordHasherInterface $passwordHasher,
        private ValidatorInterface $validator
    ) {
    }

    public function register(User $user, string $plainPassword): bool
    {
        $errors = $this->validator->validate($user);
        if (count($errors) > 0) {
            return false;
        }

        $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
        $user->setPassword($hashedPassword);
        $user->setRoles(['ROLE_USER']);

        $this->entityManager->persist($user);  // ✅ CORRIGÉ (em → entityManager)
        $this->entityManager->flush();

        return true;
    }
}