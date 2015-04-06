<?php


define('__FULLPATH__', $_SERVER['DOCUMENT_ROOT']);
define('APPLICATION', 'application');
define('CONTROLLERS', 'application/controllers');
define('LIBRARIES', 'application/libraries');
define('VIEWS', 'application/views');
define('MODELS', 'application/models');
define('CONFIG', 'application/config');

/*
function __autoload($model) {
    require_once 'system/{$model}.php';
}
*/


require_once 'system/base.php';

$base = new base;
$base->run();



// echo "<pre>".print_r($base->run(), true)."</pre>";
// echo "<pre>".print_r($_GET['route'], true)."</pre>";
// echo "<pre>".print_r($routes, true)."</pre>";
// echo "<pre>".print_r($this, true)."</pre>";

// begin
ob_start();



// end
ob_end_clean();
