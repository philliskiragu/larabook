<?php
    /**
     * Date: 14/10/16
     * Cytonn Technologies
     * @author: Phillis Kiragu pkiragu@cytonn.com
     */


    namespace Larabook\Mailers;

    use Illuminate\Mail\Mailer as Mail;


    abstract class Mailer
    {
        /**
         * @var Mail
         */
        private $mail;


        /**
         * Mailer constructor.
         */
        public function __construct(Mail $mail)
        {
            $this->mail = $mail;
        }

        /**
         * @param $user
         * @param $subject
         * @param $view
         * @param $data
         */
        public function sendTo($user, $subject, $view, $data=[])
        {
            $this->mail->queue($view, $data, function($message) use($user, $subject){
                $message->to($user->email)->subject($subject);
            });
        }
    }