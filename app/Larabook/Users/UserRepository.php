<?php namespace Larabook\Users;


class UserRepository
{
    /*
     * persist a user
     * @param User $user
     * @return mixed
     */
    public function save(User $user)
    {
        return $user->save();
    }
}