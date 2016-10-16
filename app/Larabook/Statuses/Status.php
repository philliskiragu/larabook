<?php namespace Larabook\Statuses;

use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Status extends \Eloquent
{
    use EventGenerator, PresentableTrait;

    /*
     * mass assignable fields
     */
    protected $fillable = ['body'];

    /*
     * path to the presenter for a status
     */
    protected $presenter = 'Larabook\Statuses\StatusPresenter';

    /**
     * A status belongs to one user
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('Larabook\Users\User');
    }

    /**
     * Publish a new status
     *
     * @param $body
     * @return static
     */
    public static function publish($body)
    {
        $status = new static(compact('body'));

        $status->raise(new StatusWasPublished($body));

        return $status;
    }

    /**
     * A status can have many comments
     *
     * @return mixed
     */
    public function comments(){
      return $this->hasMany('Larabook\Statuses\Comment');
    }
}