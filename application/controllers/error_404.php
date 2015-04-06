<?php
if(!defined('__FULLPATH__')) { die(header('HTTP/1.0 404 Not Found')); }


class Error_404 extends Controller {

    public function __construct() {

    }

    public function __destruct() {

    }

    public function index() {
        echo "<pre>".print_r($this, true)."</pre>";
        // $this->load->view("home_view");
    }

}