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
				$content = $_POST['content'];
				$fileName = $_POST['fileName'];
				$file = fopen("upload/".$fileName,"w");
				if(fwrite($file, $content))
				{
					echo'<p class="text-success">Successfully Updated.</p>';
				}
				fclose($file);
			}
			if(isset($_GET['id']))
			{
				$fileContent = $db->getFileContent($_GET['id']);
				echo '<h3>'.$fileContent['orignalName'].'</h3>';
				try
				{
					$file = fopen("upload/".$fileContent['name'],"r");
					if($file)
					{
						while (!feof($file)) {
							$content .=fgets($file);
						}
						fclose($file);
		?>
				
						<form action="writeFiles.php" method="post">
						<textarea cols="60" rows="20" name="content"><?php echo $content;?></textarea>
						<input type="hidden" name="fileName" value="<?php echo $fileContent['name']?>"/>
						<button type="submit" name="submit">Update</button>
						</form>
		<?php
					}
				}
				catch(Exception $e)
				{
					echo $e->getMessage();
				}
				
			}
			
				
		?>	
	
</div>
<div class="col-lg-3">

</div>

<div class="col-lg-3">
<?php require_once("sideMenu.php"); ?>

</div>

<?php

require_once("footer.php");
?>
