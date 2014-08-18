<?php
require_once("includes/require.php");
require_once("header.php");
if(!isset($_SESSION['userID']))
{
  header("Location:index.php");
}
?>
<div class="col-lg-9">
	<img src="img/bookshelf.gif" alt="bookshelf"/>
</div>

<div class="col-lg-3">
<?php require_once($user->userDashboard()); ?>

</div>



<?php
require_once("footer.php");
?>