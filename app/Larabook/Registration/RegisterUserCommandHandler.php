<?php namespace Larabook\Registration;


use Larabook\Users\User;
use Larabook\Users\UserRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class RegisterUserCommandHandler implements CommandHandler
{
    use DispatchableTrait;

    protected $repository;

    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }


    /*
     * handle the command
     */
    public function handle($command)
    {
        $user = User::register(
            $command->username, $command->email, $command->password
        );

        $this->repository->save($user);

        $this->dispatchEventsFor($user);

        return $user;
    }
}