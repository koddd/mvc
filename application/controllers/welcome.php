<?php
if(!defined('__FULLPATH__')) { die(header('HTTP/1.0 404 Not Found')); }


class Welcome extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        // echo "!!!!default!!!<br>".PHP_EOL;

        $this->load->library(array("email", "validation", "formvalidation"));

        echo "<pre>".print_r($this->load->view("hello view!!!"), true)."</pre>";
        echo "<pre>".print_r($this->load->view(" hello view2!!!"), true)."</pre>";

        /*
        echo "<pre>".print_r($this->load->library("hello library!!!"), true)."</pre>";
        echo "<pre>".print_r($this->load->helper("hello helper!!!"), true)."</pre>";
        echo "<pre>".print_r($this->load->module("hello module!!!"), true)."</pre>";
        */

        echo "<pre>".print_r($this, true)."</pre>";

    }
}