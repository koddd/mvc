<?php
if(!defined('__FULLPATH__' )) { die(header('HTTP/1.0 404 Not Found')); }


class base {
    public $load;

    function run() {

        require_once 'system/model.php';
        require_once 'system/view.php';


        require_once 'system/controller.php';
        require_once 'system/error.php';
        require_once 'system/route.php';
        require_once 'system/benchmark.php';
        require_once 'system/library.php';
        require_once 'system/config.php';
        require_once 'system/load.php';


        $route_array = explode('/', $_SERVER['REQUEST_URI']);

        if(!empty($route_array[1])) {
            if(preg_match('/^404$/', $route_array[1])) {
                $controller_name = "error_404";
            } else {
                $controller_name = $route_array[1];
            }
        } else {
            $controller_name = "welcome";
        }


        if(!empty($route_array[2])) {
            $action_name = $route_array[2];
        } else {
            $action_name = 'index';
        }


        // echo "<pre>".print_r($route_array, true)."</pre>";
        // echo "<pre>".print_r($controller_name, true)."</pre>";
        // echo "<pre>".print_r($action_name, true)."</pre>";

        if(file_exists(__FULLPATH__.'/'.CONTROLLERS.'/'.$controller_name.'.php')) {
            include __FULLPATH__.'/'.CONTROLLERS.'/'.$controller_name.'.php';
        } else {
            header('Location: /404');
            exit;
        }

        $controller = new $controller_name();
        $controller->$action_name();

        // $loader =  new load;
        // echo "<pre>".print_r($this, true)."</pre>";

        // echo BASE.'/'.CONTROLLERS.'/'.$controller_name.'.php';

    }
}