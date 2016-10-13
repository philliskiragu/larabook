<?php

    use Larabook\Forms\RegistrationForm;
    use Larabook\Registration\RegisterUserCommand;
    use Laracasts\Flash\Flash;

    class RegistrationController extends \BaseController
    {
        private $registrationForm;

        /**
         * @param RegistrationForm $registrationForm
         */
        function __construct(RegistrationForm $registrationForm)
        {
            $this->registrationForm = $registrationForm;

            $this->beforeFilter('guest');
        }


        // function to register user
        public function create()
        {
            return View::make('registration.create');
        }

        /**
         * @return mixed
         * @throws \Laracasts\Validation\FormValidationException
         */
        public function store()
        {
            $this->registrationForm->validate(Input::all());

            $user = $this->execute(RegisterUserCommand::class);

            Auth::login($user);

            Flash::success('Glad to have you join us!');

            return Redirect::home();
        }
    }
