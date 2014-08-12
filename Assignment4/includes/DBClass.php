<?php
class DB extends PDO
{
	
	//Constructor to connect Mysql Databases
	function __construct($host,$user='',$password='',$options=array())
	{
		try {
			parent::__construct($host,$user,$password,$options);
		}
 		catch (PDOException $e) {
   			 echo 'Connection failed: ' . $e->getMessage();
			 die();
		}
	}
	//Function to Insert new user
	function insertUser($userData=array())
	{
		try 
		{			
			$stmt = parent::prepare("INSERT INTO users (firstName,lastName,email,password)VALUES(?,?,?,?)");
			$stmt->bindParam(1, $userData['firstName']);
			$stmt->bindParam(2, $userData['lastName']);
			$stmt->bindParam(3, $userData['email']);
			$stmt->bindParam(4, $userData['password']);
			$stmt->execute();
			return true;
			
		}
 		catch (PDOException $e) {
   			 echo 'Connection failed: ' . $e->getMessage();
			 die();
		}
	}
	//Function to Insert book
	function insertBook($bookData=array())
	{
		try 
		{			
			$stmt = parent::prepare("INSERT INTO books (name,author,publisher,description,bookshelfId)VALUES(?,?,?,?,?)");
			$stmt->bindParam(1, $bookData['name']);
			$stmt->bindParam(2, $bookData['author']);
			$stmt->bindParam(3, $bookData['publisher']);
			$stmt->bindParam(4, $bookData['description']);
			$stmt->bindParam(5, $bookData['bookShelfId']);
			$stmt->execute();
			return true;
			
		}
 		catch (PDOException $e) {
   			 echo 'Connection failed: ' . $e->getMessage();
			 die();
		}
	}
	//Function to update book
	function updateBook($bookData=array())
	{
		try 
		{			
			$stmt = parent::prepare("UPDATE books SET name = ?,author = ? , publisher = ?, description = ?, bookshelfId = ? WHERE id = ?");
			$stmt->bindParam(1, $bookData['name']);
			$stmt->bindParam(2, $bookData['author']);
			$stmt->bindParam(3, $bookData['publisher']);
			$stmt->bindParam(4, $bookData['description']);
			$stmt->bindParam(5, $bookData['bookShelfId']);
			$stmt->bindParam(6, $bookData['bookId']);
			$stmt->execute();
			return true;
			
		}
 		catch (PDOException $e) {
   			 echo 'Connection failed: ' . $e->getMessage();
			 die();
		}
	}
	//Function to Insert bookshelf
	function insertBookShelf($bookShelfData=array())
	{
		try 
		{			
			$stmt = parent::prepare("INSERT INTO bookshelf (name,uid)VALUES(?,?)");
			$stmt->bindParam(1, $bookShelfData['name']);
			$stmt->bindParam(2, $bookShelfData['userID']);
			$stmt->execute();
			return true;
			
		}
 		catch (PDOException $e) {
   			 echo 'ERROR: ' . $e->getMessage();
			 die();
		}
	}
	//Function to update bookshelf
	function updateBookShelf($bookShelfData=array())
	{
		try 
		{			
			$stmt = parent::prepare("UPDATE bookshelf SET name = ? WHERE id = ? ");
			$stmt->bindParam(1, $bookShelfData['name']);
			$stmt->bindParam(2, $bookShelfData['bookShelfId']);
			$stmt->execute();
			return true;
			
		}
 		catch (PDOException $e) {
   			 echo 'ERROR: ' . $e->getMessage();
			 die();
		}
	}
	//Function to delete bookshelf
	function deleteBookshelf($id)
	{
		try 
		{
			$stmt = parent::prepare("delete  FROM bookshelf WHERE  id = ? ");
			$stmt->bindParam(1, $id);
			$stmt->execute();

		}
 		catch (PDOException $e) {
   			 echo 'ERROR: ' . $e->getMessage();
			 die();
		}
	}
	//Function to delete book
	function deleteBook($id)
	{
		try 
		{
			$stmt = parent::prepare("delete  FROM books WHERE  id = ? ");
			$stmt->bindParam(1, $id);
			$stmt->execute();

		}
 		catch (PDOException $e) {
   			 echo 'ERROR: ' . $e->getMessage();
			 die();
		}
	}

	//function to check user credentials and start session if correct.
	function login($credentials)
	{
		try 
		{	
			
			$stmt = parent::prepare("SELECT * FROM users WHERE  email = ? AND password = ? ");
			$stmt->bindParam(1, $credentials['email']);
			$stmt->bindParam(2, $credentials['password']);
			$stmt->execute();
			if($stmt->rowcount())
			{
				echo 'hi';
				$userDetails = $stmt->fetch();
				$_SESSION['userName']= $userDetails['firstName'].$userDetails['lastName'];
				$_SESSION['userID']= $userDetails['id'];
				return true;
			}
			else
				return false;
		}
 		catch (PDOException $e) {
   			 echo 'ERROR : ' . $e->getMessage();
			 die();
		}
	} 
	//function to fetch list of bookshelf of users individually.
	function getBookShelf($userId)
	{
		$stmt = parent::prepare("SELECT DISTINCT id,name FROM bookshelf WHERE  `bookshelf`.`uid` = ?");
		$stmt->bindParam(1, $userId);
		$stmt->execute();
		
		return ($stmt->fetchAll(PDO::FETCH_ASSOC));
	}
	//function to get list of book 
	function getBooks($userId)
	{
		$stmt = parent::prepare("SELECT DISTINCT * FROM bookshelf , books WHERE  `bookshelf`.`uid` = ? AND `books`.`bookshelfId`=`bookshelf`.`id`");
		$stmt->bindParam(1, $userId);
		$stmt->execute();
		//var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
		return ($stmt->fetchAll());
	}
	//function to fetch details of bookshelf 
	function getBookShelfDetails($bookshelfId)
	{
		$stmt = parent::prepare("SELECT DISTINCT * FROM bookshelf WHERE  `bookshelf`.`id` = ?");
		$stmt->bindParam(1, $bookshelfId);
		$stmt->execute();
		return ($stmt->fetch(PDO::FETCH_ASSOC));
	}
	//function to get details of book
	function getBookDetails($bookId)
	{
		$stmt = parent::prepare("SELECT DISTINCT * FROM books WHERE  `books`.`id` = ?");
		$stmt->bindParam(1, $bookId);
		$stmt->execute();
		return ($stmt->fetch(PDO::FETCH_ASSOC));
	}
	//function to check user already exist or no
	function checkUsernameExists($email) {
		try
		{
			$result = parent::exec("select id from users where email='$email'");
    		if(mysql_num_rows($result) == 0)
    		{
			return false;
	   		}else{
	   		return true;
			}
		}
 		catch (PDOException $e) {
   			 echo 'Connection failed: ' . $e->getMessage();
			 die();
		}
	}
	//function to get user details
	function getUserDetails($userId)
	{
		$stmt = parent::prepare("SELECT DISTINCT * FROM users WHERE  `users`.`id` = $userId");
		$stmt->bindParam(1, $userId);
		$stmt->execute();
		return ($stmt->fetch(PDO::FETCH_ASSOC));
		
	}
	
}

//creating object of class DB
$db = new DB('mysql:host=localhost;dbname=bookShelf', "root", "root", array(PDO::ATTR_PERSISTENT => true));

?>