
<?php
	session_start();
	require_once("header.php");
	require_once "includes/require.php";
	if(!isset($_SESSION['userID']))
	{
  		header("Location:index.php");
  		exit;
	}
	if(isset($_POST['submit']))
	{
		$bookDetails['name']=$_POST['bookName'];
		$bookDetails['author']= $_POST['author'];
		$bookDetails['publisher']= $_POST['publisher'];
		$bookDetails['description']= $_POST['description'];
		$bookDetails['bookShelfId']=$_POST['bookShelfId'];
		if($db->insertBook($bookDetails))
		{
			echo '<p class="text-success">Successfully Added</p>';
		}
	}
	    
?>
<div class="col-lg-3">

</div>
<div class="col-lg-3">
	<form action="addBook.php" method="post">
		<div class="form-group">
  		<label>Book Name</label>
  		<input type="text" class="form-control" name="bookName" id="bookName" placeholder="Enter Book Name">
		</div>
		<div class="form-group">
  		<label>Author Name</label>
  		<input type="text" class="form-control" name="author" id="author" placeholder="Enter Author Name">
		</div>
		<div class="form-group">
  		<label>Publisher Name</label>
  		<input type="text" class="form-control" name="publisher" id="publisher" placeholder="Enter Publisher Name">
		</div>
		<div class="form-group">
  		<label>Book Description</label>
  		<textarea class="form-control" name="description" id="description" placeholder="Enter Book Description"></textarea>
		</div>
		<div class="form-group">
  		<label>Select BookShelf</label>
  		<select name="bookShelfId">
  		<?php
  			
  			$opt = $db->getBookShelf($_SESSION['userID']);
  			print_r($opt);
  			foreach($opt as $value){
  				echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
  		}


  		?>
  		</select>
  		
		</div>
  		<button type="submit" name="submit" class="btn btn-default">Add</button>
   		<button type="reset" class="btn btn-default">Reset</button>
	</form>
</div>
<div class="col-lg-3">

</div>

<div class="col-lg-3">
<?php require_once("sideMenu.php"); ?>

</div>



<?php
require_once("footer.php");
?>