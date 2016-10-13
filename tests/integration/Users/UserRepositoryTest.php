<?php


    use Larabook\Users\User;
    use Larabook\Users\UserRepository;
    use Laracasts\TestDummy\Factory as TestDummy;

    class UserRepositoryTest extends \Codeception\TestCase\Test
    {
        public $repo;
        /**
         * @var \IntegrationTester
         */
        protected $tester;

        protected function _before()
        {
            $this->repo = new UserRepository;
        }

        /** @test */
        public function it_paginates_all_users()
        {
            TestDummy::times(4)->create('Larabook\Users\User');

            $results = $this->repo->getPaginated(2);

            $this->assertCount(2,$results);
        }

        /** @test */
        public function it_finds_a_user_with_statuses_by_their_username()
        {
            $statuses = TestDummy::times(3)->create('Larabook\Statuses\Status');

            $username = $statuses[0]->user->username;

            $user = $this->repo->findByUsername($username);

            $this->assertEquals($username, $user->username);
            $this->assertCount(3,$user->statuses);
        }

        /** @test */
        public function it_follows_another_user(){
            // given I have two users
            list($Martin,$Phillis) = TestDummy::times(2)->create('Larabook\Users\User');

            // and one user follows another user
            $this->repo->follow($Martin->id, $Phillis);

            // then I should see the user[1] in the list of those that user[0] follows
            $this->assertCount(1, $Phillis->followedUsers);

            // or this
            $this->assertTrue($Phillis->followedUsers->contains($Martin->id));

            // or this
            $this->tester->seeRecord('follows', [
                'follower_id' =>$Phillis->id,
                'followed_id' =>$Martin->id
            ]);
        }

        /** @test */
        public function it_unfollows_another_user(){
            // given I have two users
            list($Martin,$Phillis) = TestDummy::times(2)->create('Larabook\Users\User');

            // and one user follows another user
            $this->repo->follow($Martin->id, $Phillis);

            // when I unfollow that same user
            $this->repo->unfollow($Martin->id, $Phillis);

            // then I should NOT see the user[1] in the list of those that user[0] follows
            $this->tester->dontSeeRecord('follows', [
                'follower_id' =>$Phillis->id,
                'followed_id' =>$Martin->id
            ]);
        }
    }