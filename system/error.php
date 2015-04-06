<?php
if(!defined('__FULLPATH__')) { die(header('HTTP/1.0 404 Not Found')); }


class Error {
    public $instance;
    public $error;

    public function __construct() {}
    public function __destruct() {}

    public static function load($data) {}

}