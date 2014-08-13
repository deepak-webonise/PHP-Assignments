<?php
require_once("header.php");
require_once "includes/require.php";
?>
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
			
			if($db->insertUser($userData))
			{
				echo'<p class="text-success">Successfully Registered.</p>';
				echo'<p>Click Here to <a href="login.php">Login</a></p>';
			}
		}
		else
		{
			
			echo '<p class="text-danger">Please Enter Valid '.$message.'</p>';
		}
	}			
?>
<div class="col-lg-3">
<h3>Signup</h3>
<form action="signup.php" method="post">
<div class="form-group">

<table class="table">
	<tr>
    	<td><div><input class="form-control" type="text" name="firstName" placeholder="Enter First Name"/></div></td>
    
    </tr>
    <tr>
    	<td><div><input class="form-control" type="text" name="lastName" placeholder="Enter Last Name"/></div></td>
    
    </tr>
    <tr>
    	<td><div><input class="form-control" type="text" name="email" placeholder="Enter Email Address"/></div></td>
    
    </tr>
    <tr>
    	<td><div><input class="form-control" type="password" name="password" placeholder="Enter Password of length 6"/></div>
    				<span>Must contain Uppercase,Lowercase and Numbers</span>
    	</td>
    
    </tr>

</table>
<input type="submit" name="submit" class="btn btn-default">
   <button type="reset" class="btn btn-default">Reset</button>
</div>
</form>
</div>
<?php

require_once("footer.php");
?>