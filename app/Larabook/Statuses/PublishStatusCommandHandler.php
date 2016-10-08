<?php namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class PublishStatusCommandHandler implements CommandHandler
{
    use DispatchableTrait;
    /**
     * @var statusRepository
     */
    protected $statusRepository;

    /**
     * PublishStatusCommandHandler constructor.
     * @param $statusRepository
     */
    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }


    /**
     * handle the command
     * @param $command
     */
    public function handle($command)
    {
        $status = Status::publish($command->body);

        $this->statusRepository->save($status, $command->userId);

        $this->dispatchEventsFor($status);

        return $status;
    }
}