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
	$opt = $db->getBookShelf($_SESSION['userID']);
?>
<h3> BookShelfs</h3>
	<table class="table">
	
		<?php  
			foreach($opt as $value){
				echo '<tr><td>'.$value['name'].'</td>
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
