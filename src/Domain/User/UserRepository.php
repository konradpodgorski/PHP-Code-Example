<?php

namespace Domain\User;

use Domain\ValueObject\Email;

/**
 * Interface UserRepository
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
interface UserRepository
{
    /**
     * @param UserId $userId
     *
     * @return null|User
     */
    public function findOneById(UserId $userId);

    /**
     * @param Email $email
     *
     * @return User|null
     */
    public function findOneByEmail(Email $email);

    /**
     * @param User $user
     */
    public function update(User $user);

    /**
     * @param User $user
     */
    public function add(User $user);
}
