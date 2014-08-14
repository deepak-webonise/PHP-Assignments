<div class="col-lg-3">
</div>
<?php
session_start();
require_once("header.php");
require_once "includes/require.php";
if(isset($_POST['submit']))
{
  $userData['email'] = $_POST['email'];
  $userData['password'] = $_POST['password'];
  $message=NULL;
  if(!isEmpty($userData['email']))
  {
	   $message.="Email ";
		
  }
  if(!isEmpty($userData['password']))
  {
	   $message.="Password";	
  }
  else
  {
	  if($user->login($userData))
	  {
	    header("Location: index.php");
	  }
	  else
	  {
	    echo '<p class="text-danger">Invalid UserName or Password</p>';
	  }

  }
  if(isset($message))
  {
  	echo '<p class="text-danger">Please enter'.$message.'</p>';
  }
  
}

?>
<div class="col-lg-3">
  <h3>Login</h3>
  <form action="login.php" method="post">
    <div class="form-group">
      <label>Email address</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
     <button type="submit" name="submit" class="btn btn-default">Login</button>
     <button type="reset" class="btn btn-default">Reset</button>
  </form>
</div>
<?php


require_once("footer.php");
?>