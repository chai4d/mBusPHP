<?php
include_once "global.php";
$act = req("act");
if ($act == "getBusPaths")
{
	$sourceId = req("sourceId");
	$destinationId = req("destinationId");
	$map = new myBusPath;
	$map->getBusPaths($sourceId, $destinationId);
}
else if ($act == "encode")
{
	$str = req("str");
	$map = new myBusPath;
	$map->encode($str);
}
?>