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
		$bookDetails['name']=$_POST['bookName'];
		$bookDetails['author']= $_POST['author'];
		$bookDetails['publisher']= $_POST['publisher'];
		$bookDetails['description']= $_POST['description'];
		$bookDetails['bookShelfId']=$_POST['bookShelfId'];
		$bookDetails['bookId']=$_POST['bookId'];
		if($db->updateBook($bookDetails))
		{
			echo '<p class="text-success">Successfully Updated</p>';
		}
	}
	if(isset($_GET['id']))
	{
		$bookShelf = $db->getBookShelfDetails($_GET['bsid']);
		
		if($bookShelf['uid'] == $_SESSION['userID'])
		{
			$bookDetails = $db->getBookDetails($_GET['id']);
?>
			<form action="editBooks.php" method="post">
		  		<div class="form-group">
		    		<label>Book Name</label>
		    		<input type="text" class="form-control" name="bookName" id="bookName" value="<?php echo $bookDetails['name'];?>" placeholder="Enter Book Name"/>
		  		</div>
		  		<div class="form-group">
		    		<label>Author Name</label>
		    		<input type="text" class="form-control" name="author" id="author" value="<?php echo $bookDetails['author'];?>" placeholder="Enter Author Name"/>
		  		</div>
		  		<div class="form-group">
		    		<label>Publisher Name</label>
		    		<input type="text" class="form-control" name="publisher" id="publisher" value="<?php echo $bookDetails['publisher'];?>" placeholder="Enter Publisher Name"/>
		  		</div>
		  		<div class="form-group">
		    		<label>Book Description</label>
		    		<textarea class="form-control" name="description" id="description" placeholder="Enter Book Description"><?php echo $bookDetails['description'];?>"</textarea>
		  		</div>
		  		<div class="form-group">
		    		<label>Select BookShelf</label>
		    		<select name="bookShelfId">
			    		<?php
			    			
			    			$opt = $db->getBookShelf($_SESSION['userID']);
			    			foreach($opt as $value)
			    			{
			    				if($value['id'] == $bookDetails['bookshelfId'] )
			    				{
			    					echo '<option value="'.$value['id'].'" selected>'.$value['name'].'</option>';
			    				}
			    				else
			    				{
			    					echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
			    				}
			    				
			    			}
			    		?>
		    		</select>
		    	</div>
		  		<input type="hidden" name="bookId" value="<?php echo $bookDetails['id'];?>"/>
		  		<button type="submit" name="submit" class="btn btn-default">Update</button>
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
					 <td><a href="editBooks.php?id='.$value[3].'&bsid='.$value[0].'">Edit</a></td></tr>';
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
