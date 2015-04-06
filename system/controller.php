<?php
if(!defined('__FULLPATH__')) { die(header('HTTP/1.0 404 Not Found')); }


class Controller {

    public $benchmark;
    public $config;
    public $route;
    public $model;
    public $library;
    public $view;
    public $error;
    public $load;

    public function __construct() {
        $this->benchmark  = new Benchmark();
        $this->config = new Config();
        $this->route = new Route();

        $this->model = new Model();
        $this->library = new Library();

        $this->error = new Error();
        $this->view  = new View();

        // $load = new Load($this->view, $this->library);
        $this->load = new Load($this->view, $this->library);

        // sleep(5);

        $this->benchmark->end_time = microtime(true);

        $begin_time = explode(' ', $this->benchmark->begin_time);
        $end_time = explode(' ', $this->benchmark->end_time);
        // $seconds = $end_time[0] - $begin_time[0];
        // $milliseconds = $end_time[1] - $begin_time[1];
        // echo "<pre>".print_r($seconds, true)."</pre>";
        // echo "<pre>".print_r($begin_time, true)."</pre>";
        // echo "<pre>".print_r($end_time, true)."</pre>";

        // echo $this->benchmark->end_time - $this->benchmark->begin_time;
        // echo "<br>";

        $this->benchmark->total_execution_time = ($end_time[0] - $begin_time[0]); // ($end_time[1] - $start_time[1]); // + ($end_time[0] - $start_time[0]);
        // explode(' ', $this->benchmark->end_time)[1] - explode(' ', $this->benchmark->begin_time)[1];
        // echo $this->load->output;
		


    }

    public function __destruct() {}

    /*
    public function __destruct() {
        $this->view->output = "111222";
    }
    */


    public function getInstance() {
        if(!$this->instance) {
            $this->instance = new Controller();
        }

        return $this->instance;
    }

    /*
    public function load() {

        // $type, $name
        $this->library->{"email"} = "email";

        if(preg_match('/^library|helper|module$/', $type)) {
            if(file_exists(__FULLPATH__.'/'.APPLICATION.'/'.strtolower($type).'/'.$name.'.php')) {
                require_once __FULLPATH__.'/'.APPLICATION.'/'.strtolower($type).'/'.$name.'.php';
                $this->library->{"email"} = new $name();
            }
        }
    }
    */

}