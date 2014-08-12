
<?php
require_once "DBClass.php";
class users
{
	function login($credentials=array())
	{
		try 
		{	
			$stmt = $db->prepare("SELECT * FROM users WHERE  email = ? AND password = ? ");
			echo 'a';
			$stmt->bindParam(1, $credentials['email']);
			$stmt->bindParam(2, $credentials['password']);
			echo 'z';
			$stmt->execute();
			print_r($stmt);
		}
 		catch (PDOException $e) {
   			 echo 'ERROR: ' . $e->getMessage();
			 die();
		}
	} 
}
$temp = array('email'=>'abc@abc.com','password'=>'abc');
$user = new users();
$user->login($temp);
echo 'z';
?>