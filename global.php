<?php
include_once dirname(__FILE__)."/class/clDB.php";
include_once dirname(__FILE__)."/class/clMapBusPath.php";

function req($name, $default = "")
{
	$ret = trim($_REQUEST[$name]);
	return ($ret == "" ? $default : $ret);
}
?>