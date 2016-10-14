<?php
    /**
     * Date: 14/10/16
     * Cytonn Technologies
     * @author: Phillis Kiragu pkiragu@cytonn.com
     */


    namespace Larabook\Mailers;


    use Larabook\Users\User;

    class UserMailer extends Mailer
    {
        public function sendWelcomeMessageTo(User $user){
            $subject =  'Welcome to Larabook';
            $view = 'emails.registration.confirm';

            $this->sendTo($user, $subject, $view);
        }
    }