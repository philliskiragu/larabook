<?php
    /**
     * Date: 14/10/16
     * Cytonn Technologies
     * @author: Phillis Kiragu pkiragu@cytonn.com
     */


    namespace Larabook\Providers;


    use Illuminate\Support\ServiceProvider;

    class EventServiceProvider extends ServiceProvider
    {
        /**
         * Register Larabook event listeners
         */
        public function register(){
            $this->app['events']->listen('Larabook.*', 'Larabook\Handlers\EmailNotifier');
        }
    }