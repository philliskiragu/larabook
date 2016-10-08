<?php namespace Larabook\Statuses;


use Larabook\Users\User;

class StatusRepository
{

    public function getAllForUser(User $user)
    {
        return $user->statuses()->get();
    }

    /*
     * save a new status for a user
     * @param User $status
     * @return mixed
     */
    public function save(Status $status, $userId)
    {
        User::findOrFail($userId)
            ->statuses()
            ->save($status);
    }
}