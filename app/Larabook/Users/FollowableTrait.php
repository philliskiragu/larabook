<?php
    /**
     * Date: 13/10/16
     * Cytonn Technologies
     * @author: Phillis Kiragu pkiragu@cytonn.com
     */


    namespace Larabook\Users;


    trait FollowableTrait
    {
        /**
         * relationship to see who the current user follows
         * @return mixed
         */
        public function followedUsers(){
            return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')->withTimestamps();
        }

        /**
         * Users who follow current user
         * @return mixed
         */
        public function followers(){
            return $this->belongsToMany(Self::class, 'follows', 'followed_id', 'follower_id')->withTimestamps();
        }

        /**
         * determine if current user follows another user
         * @param User $otherUser
         * @return bool
         */
        public function isFollowedBy(User $otherUser){
            $idsWhoOtherUserFollows = @$otherUser->followedUsers()->lists('followed_id');

            return in_array($this->id, $idsWhoOtherUserFollows);
        }
    }