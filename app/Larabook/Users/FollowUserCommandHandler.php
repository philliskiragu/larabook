<?php
    /**
     * Date: 13/10/16
     * Cytonn Technologies
     * @author: Phillis Kiragu pkiragu@cytonn.com
     */


    namespace Larabook\Users;


    use Laracasts\Commander\CommandHandler;

    class FollowUserCommandHandler implements CommandHandler
    {
        protected $userRepo;

        /**
         * FollowUserCommandHandler constructor.
         * @param $userRepo
         */
        public function __construct(UserRepository $userRepo)
        {
            $this->userRepo = $userRepo;
        }


        /**
         * Follow a user
         * @param $command
         * @return mixed
         */
        public function handle($command){
            $user = $this->userRepo->findById($command->userId);

            $this->userRepo->follow($command->userIdToFollow, $user);

            return $user;
        }
    }