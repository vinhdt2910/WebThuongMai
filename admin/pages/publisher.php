<?php
Login::restrictAdmin();

$action = Url::getParam('action');

switch($action) {
	
	case 'add':
	require_once('publisher/add.php');
	break;
	
	case 'added':
	require_once('publisher/added.php');
	break;
	
	case 'added-failed':
	require_once('publisher/added-failed.php');
	break;
	
	case 'edit':
	require_once('publisher/edit.php');
	break;
	
	case 'edited':
	require_once('publisher/edited.php');
	break;
	
	case 'edited-failed':
	require_once('publisher/edited-failed.php');
	break;
	
	case 'remove':
	require_once('publisher/remove.php');
	break;
	
	default:
	require_once('publisher/list.php');

}







