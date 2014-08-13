<?php
$string1 = 'PHP parses a file by looking for <br/> one of the special tags that tells it to start interpreting the text as PHP code. 
			  The parser then executes all of the code it finds until it runs into a PHP closing <br/> tag.';

$arrString1 = explode(" ",$string1);

printWord(0, $arrString1);
function printWord($i , $str)
{
	if($i > count($str))
	{
		
		return 0;

	}
	else
	{
		echo  $str[$i++];
		return printWord($i , $str);
	}
		
}

?>