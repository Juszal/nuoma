<?php
session_start();

//paths
define("LIBRARY_PATH", realpath(dirname(__FILE__)) . '/resources/library/');    
define("TEMPLATES_PATH", realpath(dirname(__FILE__)) . '/resources/templates/');
define("CONFIG_PATH", realpath(dirname(__FILE__)) . '/resources/config/');

//config
require_once CONFIG_PATH . 'config.php';
require_once CONFIG_PATH . 'db.php';

//libraries
require_once LIBRARY_PATH . 'core.php';
require_once LIBRARY_PATH . 'order_sql.php';

if($config['debug']){
    ini_set("error_reporting", "true");
    error_reporting(E_ALL|E_STRCT);
}