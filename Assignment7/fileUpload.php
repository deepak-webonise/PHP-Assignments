
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
<div class="col-lg-2">

</div>
<div class="col-lg-4">
<?php
if(isset($_POST['submit']))
{
	try {
			
		if (is_uploaded_file($_FILES['userFile']['tmp_name'])) 
		{
			$uploaddir = 'upload/';
			$fileName= $_SESSION['userID'].'_'.mt_rand().'_' .basename($_FILES['userFile']['name']);
			$uploadfile = $uploaddir.$fileName;
			if(empty($_FILES['userFile']['name']))
			{
				echo '<p class="text-danger">Please Select File First</p>';			
			}
			else if($_FILES['userFile']['size'] > 102400)
			{
				echo '<p class="text-danger">File Size Exceeds</p>';
			}
			else if(!preg_match("/(.txt)$/",$_FILES['userFile']['name']))
			{
				echo '<p class="text-danger"> Select valid Text file </p>';
			}
			else
			{
				
				if (move_uploaded_file($_FILES['userFile']['tmp_name'], $uploadfile)) 
				{
	    			echo '<p class="text-success">File is valid, and was successfully uploaded.</p>';
	    			if($db->insertFile($fileName,$_FILES['userFile']['name'],$_SESSION['userID']))
	    			{

	    			}
				} else {
	    			echo '<p class="text-danger">Unable to upload File</p>';
				}
			}
		}
	} catch (Exception $e) 
	{
		 echo $e->getMessage();
	}		
}

?>
	
	<form enctype="multipart/form-data" action="fileUpload.php" method="post">
		<div class="form-group">
  		<label>Browse File</label>
  		<input type="file" class="form-control" name="userFile" id="userFile" placeholder="Browse File">
  		<p>Please select text file , size less than 1 MB.</p>
		</div>		
  		<button type="submit" name="submit" class="btn btn-default">Upload</button>
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