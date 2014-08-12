<?php
	//Starting Session and importing required files
	session_start();
	require_once("header.php");
	require_once "includes/require.php";
	if(!isset($_SESSION['userID']))
	{
  		header("Location:index.php");
  		exit;
	}
?>
<div class="col-lg-3">

</div>
<div class="col-lg-3">
<?php
	//Receiving data on submit
	if(isset($_POST['submit']))
	{
		$bookShelf['name']=$_POST['bookShelfName'];
		$bookShelf['bookShelfId']=$_POST['bookShelfId'];
		if($db->updateBookShelf($bookShelf))
		{
			echo '<p class="text-success">Successfully Updated</p>';
		}
		else
		{
			echo '<p class="text-danger">Unsuccessfully Updated</p>';
		}
	}
	//Receiving data on user clicks on click
	if(isset($_GET['id']))
	{
		$bookShelf = $db->getBookShelfDetails($_GET['id']);

		//validating the bookshelf belongs to logged in user
		if($bookShelf['uid'] == $_SESSION['userID'])
		{

			echo'<form action="editBookShelf.php" method="post">
	  		<div class="form-group">
	    		<label>BookShelf Name</label>
	    		<input type="text" class="form-control" name="bookShelfName" id="bookShelfName" value="'.$bookShelf['name'].'">
	    		<input type="hidden" class="form-control" name="bookShelfId" id="bookShelfId" value="'.$bookShelf['id'].'">
	  		</div>
	  		<button type="submit" name="submit" class="btn btn-default">Update</button>
	   		<button type="reset" class="btn btn-default">Reset</button>
			</form>';
		}
		else
		{
			echo '<p class="text-danger">Invalid Access</p>';
		}
	}
	//Fetching the bookshels of user
	$opt = $db->getBookShelf($_SESSION['userID']);	
?>
<h3> BookShelfs</h3>
	<table class="table">
	
		<?php  
			foreach($opt as $value){
				echo '<tr><td>'.$value['name'].'</td>
					 <td><a href="editBookShelf.php?id='.$value['id'].'">Edit</a></td><tr>';
			}
				
		?>	
	</table>
</div>
<div class="col-lg-3">

</div>

<div class="col-lg-3">
<?php require_once("sideMenu.php"); ?>

</div>

<?php

require_once("footer.php");
?>
