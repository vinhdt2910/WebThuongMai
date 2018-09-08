<?php
Login::restrictAdmin();

$action = Url::getParam('action');

switch($action) {
	
	case 'show':
	require_once('publisher/result.php');
	break;

	default:
	require_once('reports/chooseDate.php');

}







