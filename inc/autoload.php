<?php
require_once(realpath(dirname(__FILE__)). '/config.php');
//require_once('inc/config.php');


function __autoload($class_name) {
//	die(ROOT_PATH);
	$class = explode("_", $class_name);
	$path = implode("/", $class).".php";
	require_once($path);
}