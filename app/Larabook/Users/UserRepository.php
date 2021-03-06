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

    /**
     * Get a paginated list of all users
     * @param int $howMany
     * @return mixed
     */
    public function getPaginated($howMany=25){
        return User::orderBy('username', 'asc')->simplePaginate($howMany);
    }

    /**
     * fetch a user by their username
     * @param $username
     * @return mixed
     */
    public function findByUsername($username){
        return User::with('statuses')->whereUsername($username)->first();
    }

    /**
     * find user by id
     * @param $id
     * @return mixed
     */
    public function findById($id){
        return User::findOrFail($id);
    }

    /**
     * follow a user
     * @param $userIdToFollow
     * @param User $user
     * @return mixed
     */
    public function follow($userIdToFollow, User $user){
        return $user->followedUsers()->attach($userIdToFollow);
    }

    /**
     * unfollow a user
     * @param $userIdToUnfollow
     * @param User $user
     * @return mixed
     */
    public function unfollow($userIdToUnfollow, User $user){
        return $user->followedUsers()->detach($userIdToUnfollow);
    }
}