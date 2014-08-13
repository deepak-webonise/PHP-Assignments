<style type="text/css">
.tr a{
	display: inline;
}
</style>
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

		$content = NULL;
		if(isset($_POST['submit']))
		{
			$fileName = $_POST['fileName'].".txt";
			$content = $_POST['content'];
			$uploaddir = 'upload/';
			$newFileName= $_SESSION['userID'].'_'.mt_rand().'_' .basename($fileName);
			if($file = fopen("upload/".$newFileName,"x"))
			{
				
				$db->insertFile($newFileName,$fileName,$_SESSION['userID']);
				if(fwrite($file, $content))
				{
					echo'<p class="text-success">Successfully Story Created.</p>';
				}
			}
			else
			{
				echo'<p class="text-success">Unsuccessfully to create story.</p>';
			}
			fclose($file);
		}
		
	?>
				
	<form action="createFiles.php" method="post">
		<div class="form-group">
	      <label>Story Name</label>
	      <input type="text" class="form-control" name="fileName" id="fileName" placeholder="Enter Story Name">
	    </div>
	    <div class="form-group">
	      <label>Write Story</label>
	      <textarea cols="60" rows="20" name="content" placeholder="Write Story Here."></textarea>
	    </div>
	    <div class="form-group">	
			<button type="submit" name="submit">Create</button>
			<button type="reset" name="submit">Reset</button>
		</div>
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
