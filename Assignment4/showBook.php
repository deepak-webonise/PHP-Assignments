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
	$opt = $db->getBooks($_SESSION['userID']);
?>
<h3> Books</h3>
	<table class="table">
		<tr>
		<th>Name of Book</th>
		<th>Book Shelf</th>
		</tr>
		<?php  
			foreach($opt as $value){
				echo '<tr><td>'.$value[name].'</td><td>'.$value[1].'</td>
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
