
<?php
require_once('DBClass.php');
class users extends PDO
{
	public $id;
	public $firstName;
	public $lastName;
	public $line1;
	public $line2;
	public $city;
	public $state;
	public $country;
	public $pincode;
	public $email;
	public $contact;
	public $password;
	

	function __construct()
	{
		
	}
	//Function to Insert new user
	function insertUser($userData=array(),$newuser=false)
	{
		$db = new DB();
		try 
		{			
			if($newuser)
			{
				$stmt = $db->prepare("INSERT INTO users (firstName,lastName,email,password)VALUES(?,?,?,?)");
				$stmt->bindParam(1, $userData['firstName']);
				$stmt->bindParam(2, $userData['lastName']);
				$stmt->bindParam(3, $userData['email']);
				$stmt->bindParam(4, $userData['password']);
				if($stmt->execute())
				{
					return true;
				}
				else
				{
					return false;
				}

			}
			else
			{
				$stmt = $db->prepare("UPDATE users SET firstName=?,lastName=?,email=?,password=? WHERE id=?");
				$stmt->bindParam(1, $userData['firstName']);
				$stmt->bindParam(2, $userData['lastName']);
				$stmt->bindParam(3, $userData['email']);
				$stmt->bindParam(4, $userData['password']);
				$stmt->bindParam(5, $userData['id']);
				if($stmt->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			
			
			
		}
 		catch (PDOException $e) {
   			 echo 'Connection failed: ' . $e->getMessage();
			 die();
		}
	}
	//function to check user already exist or no
	function checkUsernameExists($email) {
		try
		{
			$db = new DB();
			$result = $db->query("select id from users where email=". $email);
			
			//var_dump($result);
    		if(count($result) > 0)
    		{
				
				return false;
	   		}
	   		else
	   		{
	   			echo 'hi3';
	   			return true;
	   			
			}
		}
 		catch (PDOException $e) {
   			 echo 'Connection failed: ' . $e->getMessage();
			 die();
		}
	}
	//Function to  authentificaticate user.
	function login($credentials=array())
	{
		$db = new DB();
		try 
		{	
			
			$stmt = $db->prepare("SELECT * FROM Users WHERE  email = ? AND password = ? ");
			$stmt->bindParam(1, $credentials['email']);
			$stmt->bindParam(2, $credentials['password']);
			if($stmt->execute())
			{
				if($stmt->rowcount())
				{
				
					$userDetails = $stmt->fetch();
					setcookie('userName', $userDetails['FirstName'].$userDetails['LastName']);
					$_SESSION['userID']= $userDetails['ID'];
					$_SESSION['userRole']= $userDetails['UserRoleID'];

					return true;
				}
				else
					return false;
			}
			else
			{
				return false;
			}
			
		}
 		catch (PDOException $e) {
   			 echo 'ERROR : ' . $e->getMessage();

		}
	}
	function getUserId()
	{
		if(isset($_SESSION['userID']))
		{
			return $_SESSION['userID'];
		}
		else
		{
			return false;
		}
	} 
	function getUserRole()
	{
		if(isset($_SESSION['userRole']))
		{
			return $_SESSION['userRole'];
		}
		else
		{
			return false;
		}
	} 
	function isLoggedIn()
	{
		
		if(isset($_SESSION['userID']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function logout()
	{
		session_start();
		unset($_SESSION['userId']);
		setcookie('userName','',time()-1);
		session_destroy();
	}
	function userDashboard()
	{
		
		switch($this->getUserRole())
		{
			case 1: return "adminMenu.php";
					break;
			case 2: return "courierMenu.php";
					break;
			case 3: return "userMenu.php";
					break;

		}
	}
}
$user = new users();

?>