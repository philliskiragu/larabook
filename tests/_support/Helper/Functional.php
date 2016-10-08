<?php
    namespace Helper;

    use Laracasts\TestDummy\Factory as TestDummy;

// here you can define custom actions
// all public methods declared in helper class will be available in $I
    class Functional extends \Codeception\Module
    {
        public function signIn()
        {
            $email = 'foo@example.com';
            $password = 'foo';

            $this->haveAnAccount(compact('email', 'password'));

            $I = $this->getModule('Laravel4');

            $I->amOnPage('/login');
            $I->fillField('email', $email);
            $I->fillField('password', $password);
            $I->click('Sign In');
        }

        public function postAStatus($body)
        {
            $I =$this->getModule('Laravel4');
            $I->fillField('Status:', $body);
            $I->click('Post Status');
//            $this->have('Larabook\Statuses\Status', $overides);
        }

        public function have($model, $overides = [])
        {
            return TestDummy::create($model, $overides);
        }

        public function haveAnAccount($overides = [])
        {
            $this->have('Larabook\Users\User', $overides);
        }
    }
