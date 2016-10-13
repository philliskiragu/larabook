<?php namespace Larabook\Statuses;


use Larabook\Users\User;

class StatusRepository
{

    /**
     * get all statuses for a user
     * @param User $user
     * @return mixed
     */
    public function getAllForUser(User $user)
    {
        return $user->statuses()->latest()->get();
    }

    /**
     * get all feed for a user
     * @param User $user
     * @return mixed
     */
    public function getFeedForUser(User $user)
    {
        $userIds = $user->follows()->lists('followed_id');

        $userIds[] = $user->id;

        return Status::whereIn('user_id', $userIds)->latest()->get();

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