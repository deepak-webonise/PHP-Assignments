<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
    	
        <?php
        	require_once("validate.php");
        	
				$userData= array();
				if(isset($_POST['submit']))
				{
					
					$message=NULL;
					$userData['firstName']= $_POST['firstName'];
					$userData['lastName']= $_POST['lastName'];
					$userData['email']= $_POST['email'];
					$userData['country']= $_POST['country'];
					$userData['zipcode']= $_POST['zipcode'];
					$userData['gender']= $_POST['gender'];
					$passwd= $_POST['passwd'];
					
					if(!isEmpty($userData['firstName']) || ereg("[0-9*_.,]+",$userData['firstName']))
					{
						$message.="Firstname ";			
					
					}
					if(!isEmpty($userData['lastName']) || ereg("[0-9*_.,]+",$userData['lastName']))
					{
						$message.="Lastname ";
					
					}
					if(!isEmpty($userData['email']))
					{
						$message.="Email ";
					
					}
					if(!isEmpty($userData['country']) || ereg("[0-9*_.,]+",$userData['country']))
					{
						$message.="Country ";
					
					}
					if(!isEmpty($userData['zipcode']) || ereg("[a-zA-Z]+",$userData['zipcode']))
					{
						$message.="Zipcode ";
					
					}
					if(!isEmpty($userData['gender']))
					{
						$message.="Gender ";
					
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
						formDisplay($userData);
					}
					else if(isset($_REQUEST['id']))
					{
						formDisplay($userData);
					}
					else
					{
						echo'<h4>Registered Successfully</h4>';
						display($userData);
						
					}
					
				}
				
				else
				{
				
					formDisplay($userData);
	     	 	}

	     
     	 	

     	 ?>
    </div>
</body>
</html>