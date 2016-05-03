<?php
class myBusPath
{
  function getBusPaths($sourceId, $destinationId)
  {
  	$sql = "select cast(uncompress(bus_path) as char) as bus_path ";
  	$sql .= "from bus_path ";
  	$sql .= "where source_id = $sourceId ";
  	$sql .= " and destination_id = $destinationId ";
  	
  	$db = new mydb;
  	$db->connect();
	$db->query($sql);
	if ($row = $db->fetch_row())
  	{
  		echo $row["bus_path"];
  	}
	$db->close();
  }

  function encode($str)
  {
  	echo base64_encode($str);
  }
}
?>