<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class UserRepository extends BaseRepository
{

    protected static function entityClass(): string
    {
       return User::class;
    }

    public function findOneByEmailOrFail(string $email): User
    {
        $user = $this->objectRepository->findOneBy(['email' => $email]);
        if(null === $user ) {
            throw \UserNotFoundException::fromEmail($email);
        }
        return $user;
    }

    /**
     * @param User $user
     * @return void
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(User $user): void
    {
        $this->saveEntity($user);
    }

    /**
     * @param User $user
     * @return void
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(User $user): void
    {
        $this->removeEntity($user);
    }
}