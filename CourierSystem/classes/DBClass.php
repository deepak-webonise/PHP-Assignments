<?php
class DB extends PDO
{
	protected $host = "localhost";
	protected $port= 3306;
	protected $db_user= 'root';
	protected $db_password='root';
	protected $db_name='courier_system';
	protected $db_options = array(PDO::ATTR_PERSISTENT => true);

	//Constructor to connect Mysql Databases
	function __construct()
	{
		try {

			 parent::__construct("mysql:host=$this->host;dbname=$this->db_name",$this->db_user,$this->db_password,$this->db_options);
		}
 		catch (PDOException $e) {
   			 echo 'Connection failed: ' . $e->getMessage();
			 die();
		}
	}
}
	
?>