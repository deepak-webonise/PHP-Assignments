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

<div class="col-lg-6">
<h3> My Stories</h3>
	<table class="table">
		<tr>
		<th>Story Name</th>
		<th></th>
		</tr>
		<?php  
			$opt=$db->getFiles($_SESSION['userID']);
			foreach($opt as $value)
			{
				echo '<tr class="tr"><td>'.$value['orignalName'].'</td>
				<td>
					<a href="readFiles.php?id='.$value['id'].'">Read</a>
					<a href="writeFiles.php?id='.$value['id'].'">Read/Write</a>
					<a href="appendFiles.php?id='.$value['id'].'">Append</a>
					<a href="deleteFiles.php?id='.$value['id'].'">Delete</a>
				</td>
					 <tr>';
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
