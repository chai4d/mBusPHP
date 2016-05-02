<?php
$DB_HOST = "localhost";
$DB_NAME = "m_bus";
$DB_USER = "chai"; //mbusinth_mbus
$DB_PASS = "Q2hhaS00REBXaXJvai5QOQ==";

class mydb
{
  var $db_connect;

  function connect()
  {
  	if (!$this->db_connect)
  	{
  		$this->db_connect = new mysqli($GLOBALS["DB_HOST"], $GLOBALS["DB_USER"], base64_decode($GLOBALS["DB_PASS"]), $GLOBALS["DB_NAME"]);

  		if (mysqli_connect_errno())
  		{
  			die("Could not connect to ".$GLOBALS["DB_HOST"].". (".mysqli_connect_errno().") : ".mysqli_connect_error());
  		}

  		mysqli_query($this->db_connect, "SET NAMES UTF8");
  	}
  }

  function query($sql)
  {
  	if (!($result = mysqli_query($this->db_connect, $sql)))
  	{
  		$this->show_error($sql);
  	}
  	return $result;
  }

  function prepare($sql)
  {
  	if (!($stmt = mysqli_prepare($this->db_connect, $sql)))
  	{
  		$this->show_error($sql);
  	}
  	return $stmt;
  }

  function show_error($sql = null)
  {
  	echo "Error ".mysqli_errno($this->db_connect)." : ".mysqli_error($this->db_connect)."<br><br>";
  	if ($sql)
  	{
  		echo "<i>".$sql."</i><br><br>";
  	}
  	die();
  }

  function close()
  {
  	mysqli_close($this->db_connect);
  }
}
?>