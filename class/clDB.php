<?php
$DB_HOST = "localhost";
$DB_NAME = "mbusinth_mbus";
$DB_USER = "mbusinth_mbus";
$DB_PASS = "Q2hhaS00REBXaXJvai5QOQ==";

class mydb
{
  var $db_connect;
  var $db_result;

  function connect()
  {
    if (!$this->db_connect)
    {
      if (!($this->db_connect = mysql_pconnect($GLOBALS["DB_HOST"], $GLOBALS["DB_USER"], base64_decode($GLOBALS["DB_PASS"]))))
      {
        die("Could not connect to ".$GLOBALS["DB_HOST"]);
      }

      if (!(mysql_select_db($GLOBALS["DB_NAME"], $this->db_connect)))
      {
        $this->show_error();
      }
    }
  }

  function query($sql)
  {
    if (!($this->db_result = mysql_query($sql, $this->db_connect)))
    {
      $this->show_error($sql);
    }
  }

  function fetch_row()
  {
    $row = mysql_fetch_array($this->db_result, MYSQL_BOTH);
    if (!$row)
    {
      if ($this->db_result)
      {
        mysql_free_result($this->db_result);
      }
      return false;
    }
    else
    {
      return $row;
    }
  }

  function show_error($sql = null)
  {
  	echo "Error ".mysql_errno()." : ".mysql_error()."<br><br>";
  	if ($sql)
  	{
  		echo "<i>".$sql."</i><br><br>";
  	}
  	die();
  }
  
  function close()
  {
  	mysql_close($this->db_connect);
  }
}
?>