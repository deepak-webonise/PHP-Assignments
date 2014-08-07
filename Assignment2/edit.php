<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
    	<h3>Registration Form</h3>
        <?php
			if(isset($_POST['flag']))
			{
				require_once("validate.php");
				$message=NULL;
				$firstName= $_POST['firstName'];
				$lastName= $_POST['lastName'];
				$email= $_POST['email'];
				$passwd= $_POST['passwd'];
				
				if(!isEmpty($firstName))
				{
				$message.="Firstname ";
				
				
				}
				if(!isEmpty($lastName))
				{
					$message.="Lastname ";
				
				}
				if(!isEmpty($email))
				{
					$message.="Email ";
				
				}
				if(!isEmpty($passwd))
				{
					$message.="Password ";
				
				}
				if(!checkPassword($passwd))
				{
					$message.="Password ";
				
				}
				if(isset($message))
				{
					echo '<span class="error">Please Enter Valid '.$message.'</span>';
				}
				else
				{
					echo'<h4>Registered Successfully</h4>';
					echo "First Name : $firstName </br>";
					echo "Last Name : $lastName</br>";
					echo  "Email : $email</br>";
					$GLOBALS['firstName'] = $firstName;
					$GLOBALS['lastName'] = $lastName;
					$GLOBALS['email'] = $email;
					$GLOBALS['passwd'] =$passwd;
					
				?>
					<form action="edit.php" method="post">

					<input type="submit" value="Edit"/>
					</form>

				<?php
				}
			}
			
		?>
     	<form action="index.php" method="post">
        	<div>
            	<input type="text" name="firstName" id="firstName" placeholder="Enter First Name"/>
            </div>
            <div>
            	<input type="text" name="lastName" id="lastName" placeholder="Enter Last Name"/>
            </div>
            <div>
            	<input type="email" name="email" id="email" placeholder="Enter Email Address"/>
            </div>
            <div>
            	<input type="password" name="passwd" id="passwd" placeholder="Enter Password"/>
                <span class="message">Must be 10 characters containing special character,capital and small letters. </span>
            </div>
            <input type="hidden" value="1" name="flag" id="flag"/>
            <div>
            	<input type="submit" value="Register"/>
                <input type="reset" value="Reset"/>
            </div>
     
     	</form> 
     	<?php
     		
     	?>   
    </div>
</body>
</html>