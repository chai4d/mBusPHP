<?php
include_once "global.php";
$act = req("act");
if ($act == "resetBusPath")
{
	$map = new myBusPath;
	$map->resetBusPath();
}
else if ($act == "insertBusPath")
{
	$sourceId = req("sourceId");
	$destinationId = req("destinationId");
	$busPath = req("busPath");
	$map = new myBusPath;
	$map->insertBusPath($sourceId, $destinationId, $busPath);
}
else if ($act == "getBusPaths")
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