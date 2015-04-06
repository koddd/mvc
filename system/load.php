<?php

class Load {

    private $output;
    private $library;

    function __construct(View $output = null, Library $library_list) {
        $this->output = &$output->output;
        $this->library = &$library_list;
    }
    // private function __destruct() {}


    public function module($name) {
        return "module!";
    }

    public function helper($name) {
        return "helper!";
    }

    public function library($library_name) {
        if(is_array($library_name)) {
            foreach($library_name as $library) {
                if(file_exists(__FULLPATH__.'/'.LIBRARIES.'/'.$library.'.php')) {
                    require_once __FULLPATH__.'/'.LIBRARIES.'/'.$library.'.php';
                    $this->library->{$library} = new $library();
                }
            }
        } else {
            if(file_exists(__FULLPATH__.'/'.LIBRARIES.'/'.$library_name.'.php')) {
                require_once __FULLPATH__.'/'.LIBRARIES.'/'.$library_name.'.php';
                $this->library->{$library_name} = new $library_name();
            }
        }
    }

    public function view($data) {
        $this->output .= $data;
		// echo "<pre>".print_r($this, true)."</pre>";
        // return $data;
    }
}