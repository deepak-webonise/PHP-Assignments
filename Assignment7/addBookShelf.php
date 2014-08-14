<div class="col-lg-3">

</div>
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
		$bookShelf['name']=htmlentities($_POST['bookShelfName']);
		$bookShelf['userID']= $_SESSION['userID'];
		if(!isEmpty($bookShelf['name']))
		{
			echo '<p class="text-danger">Please Enter Valid Bookshelf Name</p>';
		
		}
		else
		{
			if($db->insertBookShelf($bookShelf))
			{
				echo '<p class="text-success">Successfully Added</p>';
			}
			else
			{
				echo '<p class="text-danger">Unsuccessfull to add new Bookshelf</p>';
			}
		}
		
	}
?>
<div class="col-lg-3">

</div>
<div class="col-lg-3">
	<form action="addBookShelf.php" method="post">
  		<div class="form-group">
    		<label>BookShelf Name</label>
    		<input type="text" class="form-control" name="bookShelfName" id="bookShelfName" placeholder="Enter Bookshelf Name">
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