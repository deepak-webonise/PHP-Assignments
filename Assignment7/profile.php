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
		$userData['firstName'] = $_POST['firstName'];
		$userData['lastName'] = $_POST['lastName'];
		$userData['email'] = $_POST['email'];
		$userData['password'] = $_POST['password'];
		$message=NULL;
		if(!isEmpty($userData['firstName']) || preg_match("/[0-9*_.,]+/",$userData['firstName']))
		{
			$message.="Firstname ";			
		
		}
		if(!isEmpty($userData['lastName']) || preg_match("/[0-9*_.,]+/",$userData['lastName']))
		{
			$message.="Lastname ";
		
		}
		if(!isEmpty($userData['email']))
		{
			$message.="Email ";
		
		}
		if(!isEmpty($userData['password']))
		{
		$message.="Password";
	
		}
		if(!checkPassword($userData['password']))
		{
			$message.="Strong Password";
	
		}
	
		if(!isset($message))
		{
			
			if($db->updateUser($userData))
			{
				echo'<p class="text-success">Successfully Updated.</p>';
				
			}
		}
		else
		{
			
			echo '<p class="text-danger">Please Enter Valid '.$message.'</p>';
		}
	}
?>
<?php
	$userDetails=$db->getUserDetails($_SESSION['userID']);
?>
<h3> User Profile</h3>
	<table class="table">
	<tr>
    	<td><div><input class="form-control" type="text" name="firstName" value="<?php echo $userDetails['firstName']; ?>" placeholder="Enter First Name" /></div></td>
    
    </tr>
    <tr>
    	<td><div><input class="form-control" type="text" name="lastName" value="<?php echo $userDetails['lastName']; ?>" placeholder="Enter Last Name"/></div></td>
    
    </tr>
    <tr>
    	<td><div><input class="form-control" type="text" name="email"  value="<?php echo $userDetails['email']; ?>" placeholder="Enter Email Address" /></div></td>
    
    </tr>
    <tr>
    	<td><div><input class="form-control" type="password" name="password" placeholder="Enter New Password"/></div></td>
    
    </tr>
    <tr>
    <td><button type="submit" name="submit" class="btn btn-default">Update</button>
   <button type="reset" class="btn btn-default">Reset</button></td>
    </tr>

</table>
</div>
<div class="col-lg-3">

</div>

<div class="col-lg-3">
<?php

 require_once("sideMenu.php"); ?>

</div>

<?php

require_once("footer.php");
?>
