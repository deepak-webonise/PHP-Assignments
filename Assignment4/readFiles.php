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

			if(isset($_GET['id']))
			{
				$fileContent = $db->getFileContent($_GET['id']);
				if($_SESSION['userID'] === $fileContent['userId'])
				{
					echo '<h3>'.$fileContent['orignalName'].'</h3>';
					try
					{
						if (file_exists("upload/".$fileContent['name']))
						{
							$file = fopen("upload/".$fileContent['name'],"r");
							if($file)
							{
								while (!feof($file)) {
									$content .=fgets($file);
								}
								echo '<textarea cols="60" rows="20" name="content">'.$content.'</textarea>';
							}
						}
						else
						{
							echo '<p class="text-danger">File Not Found. Please Retry.</p>';
						}
					}
					catch(Exception $e)
					{
						echo $e->getMessage();
					}
				}
				else
				{
					echo '<p class="text-danger">Invalid File Access.</p>';
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
