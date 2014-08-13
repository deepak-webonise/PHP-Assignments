<?php
session_start();
require_once("header.php");
if(isset($_SESSION['userID']))
{
  header("Location:dashboard.php");
}
?>
<div class="col-lg-9">
<h1>My BookShelf</h1>
<img src="img/bookshelf.gif" alt="bookshelf"/>
</div>
<div class="col-lg-3">
<h3>Login</h3>
<form action="login.php" method="post">
  <div class="form-group">
    <label >Email address</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
  </div>
   <button type="submit" name="submit" class="btn btn-default">Login</button>
   <button type="reset" class="btn btn-default">Reset</button>
</form>
<h3>New User Signup</h3>
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
    	<td><div><input class="form-control" type="password" name="password" placeholder="Enter Password"/></div>
                <span>Must contain Uppercase,Lowercase and Numbers</span>
      </td>
    
    </tr>

</table>
<button type="submit" name="submit" class="btn btn-default">Signup</button>
   <button type="reset" class="btn btn-default">Reset</button>
</div>
</form>

</div>



<?php
require_once("footer.php");
?>