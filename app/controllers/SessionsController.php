<?php

use Illuminate\Support\Facades\Auth;
use Larabook\Forms\SignInForm;
use Laracasts\Flash\Flash;

class SessionsController extends \BaseController {
	/**
	 * SessionsController constructor.
	 */

	public function __construct(SignInForm $signInForm)
	{
		$this->signInForm = $signInForm;

		$this->beforeFilter('guest', ['except' => 'destroy']);
	}


	/**
	 * Show the form for signing in.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//fetch form input
		//validate the form
		// if invalid, then go back
		$formData = Input::only('email', 'password');
		$this->signInForm->validate($formData);

		//if valid, then try to sign in
		if (Auth::attempt($formData))
		{
			//redirect to statuses
			Flash::message('Welcome back');

			return Redirect::intended('statuses');

		}


	}

	public function destroy()
	{
		Auth::logout();

		Flash::message('You have been logged out');

		return Redirect::home();
	}

}

