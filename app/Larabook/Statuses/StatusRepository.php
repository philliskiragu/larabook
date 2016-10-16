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
        $userIds = $user->followedUsers()->lists('followed_id');

        $userIds[] = $user->id;

        return Status::with('comments')->whereIn('user_id', $userIds)->latest()->get();

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

    public function leaveComment($userId, $statusId, $body){
        $comment = Comment::leave($body, $statusId);

        User::findOrFail($userId)->comments()->save($comment);

        return $comment;
    }
}