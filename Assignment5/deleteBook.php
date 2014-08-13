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
		if($db->deleteBook($_POST['bookId']))
		{
			echo '<p class="text-success">Successfully Deleted</p>';
		}
	}
	if(isset($_GET['id']))
	{
		$bookShelf = $db->getBookShelfDetails($_GET['bsid']);
		
		if($bookShelf['uid'] == $_SESSION['userID'])
		{
			$bookDetails = $db->getBookDetails($_GET['id']);
	?>
		<form action="deleteBook.php" method="post">
  		<div class="form-group">
    		<label>Book Name : <?php echo $bookDetails['name'];?></label>
    		
  		</div>
  		<div class="form-group">
    		<label>Author Name : <?php echo $bookDetails['author'];?></label>
    		
  		</div>
  		<div class="form-group">
    		<label>Publisher Name : <?php echo $bookDetails['publisher'];?></label>
    		
  		</div>
    		
  		<input type="hidden" name="bookId" value="<?php echo $bookDetails['id'];?>"/>
  		<button type="submit" name="submit" class="btn btn-default">Confirm Delete</button>
   		
	</form>

	<?php
		}
		else
		{
			echo '<p class="text-danger">Invalid Access</p>';
		}
	}
			
?>
<?php
	$opt = $db->getBooks($_SESSION['userID']);
?>
<h3> Books</h3>
	<table class="table">
		<tr>
		<th>Name of Book</th>
		<th>Book Shelf</th>
		<th></th>
		</tr>
		<?php  
			foreach($opt as $value){
				echo '<tr><td>'.$value[name].'</td><td>'.$value[1].'</td>
					 <td><a href="deleteBook.php?id='.$value[3].'&bsid='.$value[0].'">Delete</a></td></tr>';
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
