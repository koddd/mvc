<?php
if(!defined('__FULLPATH__')) { die(header('HTTP/1.0 404 Not Found')); }


class Benchmark {
    public $begin_time;
    public $end_time;
    public $total_execution_time;

    public function __construct() {
        $this->begin_time = microtime(true);
        $this->end_time   = microtime(true);

    }

    public function __destruct() {}

}