<?php
$requestMethod = $_SERVER["REQUEST_METHOD"];
include('../class/Rest.php');
$api = new Rest();
switch($requestMethod) {
	case 'GET':
		$deptId = '';	
		if($_GET['id']) {
			$deptId = $_GET['id'];
		}
		$api->getDepartment($deptId);
		break;
	default:
	header("HTTP/1.0 405 Method Not Allowed");
	break;
}
?>