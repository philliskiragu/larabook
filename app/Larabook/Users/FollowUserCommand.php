<?php
    /**
     * Date: 13/10/16
     * Cytonn Technologies
     * @author: Phillis Kiragu pkiragu@cytonn.com
     */


    namespace Larabook\Users;


    class FollowUserCommand
    {
        public $userId;

        public $userIdToFollow;

        /**
         * FollowUserCommand constructor.
         * @param $userId
         * @param $userIdToFollow
         */
        public function __construct($userId, $userIdToFollow)
        {
            $this->userId = $userId;
            $this->userIdToFollow = $userIdToFollow;
        }


    }