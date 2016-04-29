<?php
class myBusPath
{
  function getBusPaths($sourceId, $destinationId)
  {
  	$sql = "select cast(uncompress(bus_path) as char) as bus_path ";
  	$sql .= "from bus_path ";
  	$sql .= "where source_id = ? ";
  	$sql .= " and destination_id = ? ";
  	
  	$db = new mydb;
  	$db->connect();
  	$stmt = $db->prepare($sql);
  	$stmt->bind_param("ss", $sourceId, $destinationId);
  	$stmt->execute();
  	$result = $stmt->get_result();
  	if ($row = $result->fetch_assoc())
  	{
  		echo $row["bus_path"];
  	}
	$stmt->free_result();
	$db->close();
  }

  function encode($str)
  {
  	echo base64_encode($str);
  }
}
?>