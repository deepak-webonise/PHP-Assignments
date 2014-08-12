<?php
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
		if(strlen($password)<6)
		{
			return false;	
		}
		else if(!preg_match("/([A-Za-z])+([0-9])+/",$password))
		{
			return false;
		}
		else
		{
			return true;
		}
	
}
?>