<html>
	<head>
		<title>String and Array Functions</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<?php
				$string1 = "PHP is a popular language general-purpose scripting language that is especially suited to language web development.";
				$string2 = "Fast, flexible and pragmatic, PHP powers everything from your blog to the most popular websites in the world.";
				$string3 = strip_tags('<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a>');
				$email =array (
								1=>'harshal.shinde@gmail.com',
								2=>'hrishikesh@yahoo.co.in',
								3=>'xyz@yomail.com',
							);
				echo'<h3>INPUT Strings</h3>';
				echo '<p>String1 : '.$string1.'</p>';
				echo '<p>String2 : '.$string2.'</p>';
				echo '<p>String3 : '.$string3.'</p>';

				//String Position
				$arrString1 = explode(" ",$string1);
			    $occurance = array();
			    $i = 0;
			    $j = 0;
			    while($i < count($arrString1))
			    {
			        if($arrString1[$i]=="language")
			        {
			              $i++;
			              $occurance[$j++] =$i;
			        }
			        else
			        {
			              $i++;
			        }
			    }
			   
    			echo '<h3>Position where language word occures in string 1 </h3>'.implode(",",$occurance);
    			echo '<h3>string postion of "langauge" </h3>';
    			$start=0;
    			while($pos=strpos($string1,"language",$start))
    			{
    				echo '<br/>'.$pos;
    				$start+=$pos;
    			}
    			

				//compare two strings
				echo'<h3>Compare strings and print the differnce between two strings</h3>';
				if (strcmp($var1, $var2) !== 0) {
   					 echo '$var1 is not equal to $var2 in a case sensitive string comparison';
				}
				$result = array_diff(explode(" ",$string1), explode(" ",$string2));
				echo implode("<br/>",$result);
				echo'<h3>Word count of String1</h3>'.str_word_count($string1,0);
				echo'<h3>Reverse and Join Both  String1 & String2</h3>'.strrev($string1).strrev($string2);
				echo'<h3>String length of   String1 & String2</h3>String1: '.strlen($string1).'</br>String 2:'.strlen($string2);
				echo'<h3>Wrap String after 10 characters </h3>'.wordwrap($string1,10,"<br/>",true);
				echo'<h3>Remove html tags from $string3 </h3>'.strip_tags($string3);
				echo'<h3>change the doamin name to = "weboniselab.com" </h3>'.implode("<br/>",preg_replace("/@(\w)+(\.(\w)+)+/", "@weboniselab.com", $email));

				//convert String1 to array and divide into 5 parts
				$str = array_chunk(explode(" ",$string1), 5);

				//convert String1 to array and divide into 6parts
				$str = array_chunk(explode(" ",$string2), 6);
				
				//Removes the last word from a string.
				echo'<h3>Removes the last word from a string. </h3>';
				echo '<p>INPUT : remove last word from the string quick brown fox</p>';
				$arr = explode(" ","remove last word from the string quick brown fox");
				array_pop($arr);
				echo implode(" ",$arr);
				echo'<h3>Round Function </h3>';
				echo '<p>INPUT:1.65, 1.65, -1.54</p>';
				echo Round(1.65, 1).'<br/>';
				echo Round(1.65, 1,PHP_ROUND_HALF_DOWN).'<br/>';
				echo Round(-1.54, 1,PHP_ROUND_HALF_UP).'<br/>';
				echo'<h3>Color array to display seperated by comma </h3>';
				$color = array('white', 'green', 'red');
				echo implode(",",$color);


				//Insert a new item in an array on any position.
				echo'<h3>Insert Element at Specific Position </h3>';
				$num = array(1,2,3,4,5);
				array_splice( $num, 3, 0, "*" );
				print_r($num);

				//Perform functions diff, merge and intersect on array 
				$toppings1 = array("Pepperoni", "Cheese", "Anchovies", "Tomatoes");
				$toppings2 = array("Ham", "Cheese", "Peppers");
				echo'<h3>Array Functions Merge, defference , Intersect. </h3>';
				echo '<h4>Array1 : </h4>'.implode(" ",$toppings1);
				echo '<h4>Array2 : </h4>'.implode(" ",$toppings2);

				//intersect function
				echo '<h4>Intersect Function</h4>'.implode(" ",array_intersect($toppings1, $toppings2));

				//merge function
				echo '<h4>Merge Function</h4>'.implode(" ",array_merge($toppings1, $toppings2));

				//deff function
				echo '<h4>Difference Function</h4>'.implode(" ",array_diff($toppings1, $toppings2));

				//Sort Array
				echo'<h3>Sort Array Elements </h3>';
				$arrString = explode(" ", $string1);
				natcasesort($arrString);
				echo '<br/>'.implode(" ", $arrString);


				//count number of characters in array
				echo'<h3>Count number of characters in array and print in array formate </h3>';
				$count =array();
				/*$i=0;
				foreach($email as $value)
				{
					$count[$i++] = strlen($value);
				}*/
				function charLength($item)
				{
					return strlen($item);
				}
				$count=array_map('charLength',$email);
				var_export($count);

				//array function array_walk
				echo'<h3>array_walk Function </h3>';
				$array = array('get', 'ready', 'for', 'cool');
				function arrWalk(&$item1, $key, $prefix)
				{
				    
				    $item1 = "[$key] => $prefix : $item1 (KEY : $key)";
				    echo "$item1<br />\n";
				}
				array_walk($array,'arrwalk','webonise')
			?>
		</div>
	</body>
</html>