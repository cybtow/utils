<?php

namespace Cybtow\Utils;

/**
 * CtrlTime class
 *
 * @author cybtow
 */
class CtrlTime {

    private $time;

    public function start() {
        $this->time = microtime();
    }

    public function time() {
        $t = microtime() - $this->time;
        $this->start();
        return $t;
    }

}
