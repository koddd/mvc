<?php

class formvalidation {
    public $formerror;
    public $validation_rules;
    public $display_before;
    public $display_after;

    public function __construct() {
        $this->formerror = array();
        $this->display_before = '';
        $this->display_after = '';
        $this->validation_rules = array();
    }

    public function error_display($before = '', $after = '') {
        $this->display_before = $before;
        $this->display_after = $after;
    }

    function form_init_rules($rules = array()) {
        $this->validation_rules = $rules;
    }

    function validate() {
        $formerror = '';

        if(count($this->validation_rules)) {
            try {
                if(count($this->validation_rules) == count($_POST)) {
                    foreach($this->validation_rules as $rule) {
                        $rule = (object) $rule;
                        if(isset($_POST[$rule->name])) {
                            if(!preg_match($rule->rule, $_POST[$rule->name])) {
                                $this->formerror[$rule->name] = $rule->error;
                            }
                        }
                    }

                    if(!count($this->formerror)) {
                        return TRUE;
                    }
                } else {
                    throw new Exception("Ошибка конфига валидации, неправильное число полей формы");
                }
            } catch (Exception $e) {
                // save to log
                // display error_log
                echo $e->getMessage()." на строке ".$e->getLine();
            }
        }

        return FALSE;
    }

    function form_error($field_name = '') {
        if(count($this->formerror)) {
            if(preg_match('/\w+/', $field_name)) {
                foreach($this->formerror as $name => $error) {
                    if($name == $field_name) {
                        return $this->display_before.$error.$this->display_after;
                    }
                }
            }
        }

        return FALSE;
    }

    function form_value($field, $default = '') {
        if(isset($field)) {
            if(isset($_POST[$field]) || isset($_GET[$field])) {
                echo $_POST[$field];
            } else {
                echo $default;
            }
        }
    }
}




