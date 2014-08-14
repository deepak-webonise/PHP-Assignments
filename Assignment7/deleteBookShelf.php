<?php
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
	if(isset($_POST['submit']))
	{
		if($db->deleteBookshelf($_POST['bookShelfId']))
		{
			echo '<p class="text-success">Successfully Deleted</p>';
		}
	}
	if(isset($_GET['id']))
	{
		$bookShelf = $db->getBookShelfDetails($_GET['id']);
		
		if($bookShelf['uid'] == $_SESSION['userID'])
		{

			echo'<form action="deleteBookShelf.php" method="post">
	  		<div class="form-group">
	    		<label>BookShelf Name</label>
	    		<p>'.$bookShelf['name'].'</p>
	    		<input type="hidden" class="form-control" name="bookShelfId" id="bookShelfId" value="'.$bookShelf['id'].'">
	  		</div>
	  		<button type="submit" name="submit" class="btn btn-default">Confirm Delete</button>
	   		</form>';
		}
	}
	$opt = $db->getBookShelf($_SESSION['userID']);
	

?>
<h3> BookShelfs</h3>
	<table class="table">
	
		<?php  
			foreach($opt as $value){
				echo '<tr><td>'.$value['name'].'</td>
					 <td><a href="deleteBookShelf.php?id='.$value['id'].'">Delete</a></td><tr>';
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
