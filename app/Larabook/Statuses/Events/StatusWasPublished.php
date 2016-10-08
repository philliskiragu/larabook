<?php
    /**
     * Date: 04/10/16
     * Cytonn Technologies
     * @author: Phillis Kiragu pkiragu@cytonn.com
     */


    namespace Larabook\Statuses\Events;


    class StatusWasPublished
    {
        private $body;

        /**
         * StatusWasPublished constructor.
         */
        public function __construct($body)
        {
            $this->body = $body;
        }
    }