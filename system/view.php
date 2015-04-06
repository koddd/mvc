<?php
if(!defined('__FULLPATH__')) { die(header('HTTP/1.0 404 Not Found')); }


class View {
    public $output;

    public function __construct() {
        $this->output = "";
    }

    public function __destruct() {}

    /*
    public static function load($data) {
        $this->output .= $data;
        // return parent::$my_static;
    }
    */
}