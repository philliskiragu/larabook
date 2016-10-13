<?php

	use Larabook\Users\FollowUserCommand;
	use Larabook\Users\UnfollowUserCommand;
	use Laracasts\Flash\Flash;

	class FollowsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Follow a user
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = array_add(Input::get(), 'userId', Auth::id());

		$this->execute(FollowUserCommand::class, $input);

		Flash::success('You are now following this User.');

		return Redirect::back();
	}


	/**
	 * Unfollow a user
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($userIdToUnfollow)
	{
		$input = array_add(Input::get(), 'userId', Auth::id());

		$this->execute(UnfollowUserCommand::class, $input);

		Flash::success('You have now unfollowed this user.');

		return Redirect::back();
	}


}
