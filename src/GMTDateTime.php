<?php

namespace Cybtow\Utils;

/**
 * Description of GMTDateTime
 *
 * @author juanma
 */
class GMTDateTime extends \DateTime {

    /**
     * 
     * @param mixed $time
     * @param \DateTimeZone $timeZone
     */
    public function __construct($time, \DateTimeZone $timeZone = null) {
        if (is_null($timeZone)) {
            $timeZone = new \DateTimeZone('GMT');
        }

        parent::__construct($time, $timeZone);
    }

}
