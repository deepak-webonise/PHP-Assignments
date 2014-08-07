<?php
$GLOBALS['firstName'] = NULL;
$GLOBALS['lastName'] = NULL;
$GLOBALS['email'] = NULL;
$GLOBALS['passwd'] =NULL;
function isEmpty($field)
{
	if(isset($field) && empty($field) )
	{
		return false;
	}
	else
	{
		
		return true;
		
	}
}
function checkPassword($password)
{
		if(strlen($password)<10)
		{
			return false;	
		}
		else if(!ereg("([A-Za-z])+([0-9])+",$password))
		{
			return false;
		}
		else
		{
			return true;
		}
	
}
function display($userData)
{
	echo '<ul class="display">';
	foreach($userData as $key => $value)
	{
		echo '<li><span>'.$key.' : </span><span class="label">'.$value.'</span></li>';
	}
	echo'</ul>';
	echo '<a href="index.php?id=1">Edit Details</a>';
}
function formDisplay($userData)
{
	?>
		<table class="tbl">
		<form action="index.php" method="post">
			
				
				<tr>
			        <td>	
			        		<div>
			            		<input type="text" name="firstName" id="firstName" placeholder="Enter First Name"/>
			            	</div>
			        </td>
			        <td>
			        		<span class="error"></span>
			        </td>
			    </tr>
			    <tr>
			        <td>
			            <div>
			            	<input type="text" name="lastName" id="lastName" placeholder="Enter Last Name"/>
			            </div>
			        </td>
			        <td>
			        		<span class="error"></span>
			        </td>
			    </tr>
			    <tr>
			        <td>
			            <div>
			            	<input type="email" name="email" id="email" placeholder="Enter Email Address"/>
			            </div>
			        </td>
			        <td>
			        		<span class="error"></span>
			        </td>
			    </tr>
			    <tr>
			        <td>
			            <div>
			            	<input type="password" name="passwd" id="passwd" placeholder="Enter Password"/>
			                <span class="message">Must be 10 characters containing special character,capital and small letters. </span>
			            </div>
			        </td>
			        <td>
			        		<span class="error"></span>
			        </td>
			    </tr>
			    <tr>
			        <td>
			            <div>
			            	<input type="text" name="country" id="country" placeholder="Enter Country"/>
			            </div>
			        </td>
			        <td>
			        		<span class="error"></span>
			        </td>
			    </tr>
			    <tr>
			        <td>
			            <div>
			            	<input type="text" name="zipcode" id="zipcode" placeholder="Enter Zipcode"/>
			            </div>
			        </td>
			        <td>
			        		<span class="error"></span>
			        </td>
			    </tr>
			    <tr>
			        <td>
			            <div>
			            	<input type="radio" name="gender" id="gender" value="Male"/>Male
			            	<input type="radio" name="gender" id="gender" value="Female"/>Female
			            </div>
			        </td>
			        <td>
			        		<span class="error"></span>
			        </td>
			    </tr>
			    <tr>
			        <td>
			           
			            <div>
			            	<input type="submit" name="submit" value="Register"/>
			                <input type="reset" value="Reset"/>
			            </div>
			        </td>
			        <td>
			        		<span class="error"></span>
			        </td>
			    </tr>
			</table>    
		     
		</form> 
<?php
}
?>
