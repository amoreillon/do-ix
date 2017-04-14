<?php
 class Database {

  public $con;
  private $host = "localhost";
  private $db = "do_ix";
  private $dbUser = "root";
  private $dbPass = "";

  public function __construct(){

	$this->con = mysqli_connect($this->host,$this->dbUser,$this->dbPass,$this->db);
	
   
 }

}


$dbobj = new Database();
?>