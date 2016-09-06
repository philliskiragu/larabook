<?php namespace Larabook\Core;

use Illuminate\Support\Facades\App;

trait CommandBus
{
    /**
     * execute method
     * @param $command
     * @return mixed
     */
    public function execute($command)
    {
        return $this->getCommandBus()->execute($command);
    }

    /**
     * @return mixed
     */
    public function getCommandBus()
    {
        return App::make('Laracasts\Commander\CommandBus');
    }
}