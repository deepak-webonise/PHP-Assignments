<?php
class DB extends PDO
{
	protected $host = "localhost";
	protected $port= 3306;
	protected $db_user= 'root';
	protected $db_password='root';
	protected $db_name='bookShelf';
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
			if($stmt->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
			
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
			if($stmt->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
			
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
			if($stmt->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
			
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
			if($stmt->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
			
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
			$stmt = parent::prepare("DELETE  FROM bookshelf WHERE  id = ? ");
			$stmt->bindParam(1, $id);
			if($stmt->execute())
			{
				return true;
			}
			else
			{
				return false;
			}

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
			$stmt = parent::prepare("DELETE  FROM books WHERE  id = ? ");
			$stmt->bindParam(1, $id);
			if($stmt->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
 		catch (PDOException $e) {
   			 echo 'ERROR: ' . $e->getMessage();
			 die();
		}
	}
	
	//function to fetch list of bookshelf of users individually.
	function getBookShelf($userId)
	{
		$stmt = parent::prepare("SELECT DISTINCT id,name FROM bookshelf WHERE  `bookshelf`.`uid` = ?");
		$stmt->bindParam(1, $userId);
		if($stmt->execute())
		{
			return ($stmt->fetchAll(PDO::FETCH_ASSOC));
		}
		else
		{
			return false;
		}
		
		
	}
	//function to get list of book 
	function getBooks($userId)
	{
		$stmt = parent::prepare("SELECT DISTINCT * FROM bookshelf , books WHERE  `bookshelf`.`uid` = ? AND `books`.`bookshelfId`=`bookshelf`.`id`");
		$stmt->bindParam(1, $userId);
		if($stmt->execute())
		{
			return ($stmt->fetchAll());
		}
		else
		{
			return false;
		}
		
	}
	//function to fetch details of bookshelf 
	function getBookShelfDetails($bookshelfId)
	{
		$stmt = parent::prepare("SELECT DISTINCT * FROM bookshelf WHERE  `bookshelf`.`id` = ?");
		$stmt->bindParam(1, $bookshelfId);
		if($stmt->execute())
		{
			return ($stmt->fetch(PDO::FETCH_ASSOC));
		}
		else
		{
			return false;
		}
		
	}
	//function to get details of book
	function getBookDetails($bookId)
	{
		$stmt = parent::prepare("SELECT DISTINCT * FROM books WHERE  `books`.`id` = ?");
		$stmt->bindParam(1, $bookId);
		if($stmt->execute())
		{
			return ($stmt->fetch(PDO::FETCH_ASSOC));
		}
		else
		{
			return false;
		}
		
	}
	
	//function to get user details
	function getUserDetails($userId)
	{
		$stmt = parent::prepare("SELECT DISTINCT * FROM users WHERE  `users`.`id` = $userId");
		$stmt->bindParam(1, $userId);
		if($stmt->execute())
		{
			return ($stmt->fetch(PDO::FETCH_ASSOC));
		}
		else
		{
			return false;
		}
		
		
	}
	//function to store uploaded file name in database
	function insertFile($fileName,$orignalName,$userId)
	{
		try 
		{			
			$stmt = parent::prepare("INSERT INTO userFiles (name,orignalName,userId)VALUES(?,?,?)");
			$stmt->bindParam(1, $fileName);
			$stmt->bindParam(2, $orignalName);
			$stmt->bindParam(3, $userId);
			if($stmt->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
			
		}
 		catch (PDOException $e) {
   			 echo 'ERROR: ' . $e->getMessage();
			 die();
		}
	}
	//get list of user files
	function getFiles($userId)
	{
		try 
		{
			$stmt = parent::prepare("SELECT DISTINCT * FROM userFiles WHERE  userId = ? ");
			$stmt->bindParam(1, $userId);
			if($stmt->execute())
			{
				return ($stmt->fetchAll(PDO::FETCH_ASSOC));
			}
			else
			{
				return false;
			}
			
		}
 		catch (PDOException $e) {
   			 echo 'ERROR: ' . $e->getMessage();
			 die();
		}
	}
	//get the content of files
	function getFileContent($id)
	{
		try 
		{
			$stmt = parent::prepare("SELECT DISTINCT * FROM userFiles WHERE  id = ?");
			$stmt->bindParam(1, $id);
			if($stmt->execute())
			{
				return ($stmt->fetch(PDO::FETCH_ASSOC));
			}
			else
			{
				return false;
			}
			
		}
 		catch (PDOException $e) {
   			 echo 'ERROR: ' . $e->getMessage();
			 die();
		}
	}
	//Function to delete file
	function deleteFile($id)
	{
		try 
		{
			$stmt = parent::prepare("DELETE  FROM userFiles WHERE  id = ? ");
			$stmt->bindParam(1, $id);
			if($stmt->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
			

		}
 		catch (PDOException $e) {
   			 echo 'ERROR: ' . $e->getMessage();
			 die();
		}
	}
	
}
$db = new DB();


?>