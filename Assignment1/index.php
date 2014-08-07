<?php
    $string1 = 'PHP parses a file by looking for <br/> one of the special tags that tells it to start interpreting the text as PHP code. 
                          The parser then executes all of the code it finds until it runs into a PHP closing <br/> tag.';
    $string2 = "PHP does not require (or support) explicit type definition in variable declaration; a variable's 
                        type is determined by the context in which the variable is used.";

    $arrString1 = explode(" ",$string1);
    $occurance = array();
    $i = 0;
    $j = 0;
    while($i < count($arrString1))
    {
        if($arrString1[$i]=="PHP")
        {
              $i++;
              $occurance[$j++] =$i;
        }
        else
        {
              $i++;
        }
    }
    /* Find occurance of PHP from string1 and  Find the position where PHP occures in the string 1*/
    echo '<h3>Occurance of PHP from string 1 is </h3>'.count($occurance);
    echo '<h3>Position where PHP occures in string 1 </h3>'.implode(",",$occurance);

    //Recursion Function
    echo '<h3>Create array of words in string 1 & print them using a recursive function. </h3>';
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

    //Capitalise string1
    echo'<h3>Capitalise string 1 </h3>'.strtoupper($string1);
    //combine String1 and String2
    echo '<h3>Combine String1 and String2</h3>'.$string1.$string2;
    //heredoc example
    $str = <<<EOD
            PHP parses a file by looking for <br/> one of the special tags that tells it to start interpreting the text as PHP code. 
            The parser then executes all of the code it finds until it runs into a PHP closing <br/> tag.
            PHP does not require (or support) explicit type definition in variable declaration; a variable's 
            type is determined by the context in which the variable is used.
EOD;
    echo '<h3>Heredoc Example</h3>'.$str;

    //currentdate
    echo "<h3>Today Date</h3>".date("d-m-Y");

    //print 12th Jan 2012
    echo "<h3>mktime(12th Jan 2012)</h3>".date("dS M Y",mktime(0,0,0,1,12,2012));

    //add 7 days to current date
    $date = new DateTime(date("d-m-Y")); //take cuurent date
    $date->add(new DateInterval('P7D')); //add 7 days to current date
    echo '<h3>Add 7 days to current date</h3>'.$date->format('d-m-Y') . "<br/>";

    //Remove the HTML characters from string.
    echo '<h3>Remove the HTML characters from string.</h3>';
    $str = str_replace("<br/>", "", $str);
    echo $str;
    //create file and write first string
    $file = fopen("file.txt","w");
    fwrite($file, $string1);

    //Global variables provided by PHP
    echo '<h3>Global Variables provided by php</h3>   $GLOBALS, $_SERVER,   $_REQUEST,   $_POST,  $_GET,   $_FILES,  $_ENV,   $_COOKIE, $_SESSION' ;

    //Compare two dates and calculate days between these dates

    $date1 = new DateTime('12-4-2010');
    $date2 = new DateTime('12-5-2011');
    $interval = $date1->diff($date2);
    echo '<h3>Date Compare and calculate days</h3>'.$interval->format('%R%a days');

    //print daet in array formate
    $date = getdate();

    echo "<h3>Date in array </h3>".$date['mday'].'-'.$date['month'].'-'.$date['year'];

    //string lengths
    echo '<h3> Sting 1 Length</h3>'.strlen($string1);
    echo '<h3> Sting 2 Length</h3>'.strlen($string2);

    //date after 20 days of  current date
    $date = new DateTime(date("d-m-Y")); //take cuurent date
    $date->add(new DateInterval('P20D')); //add 7 days to current date
    echo '<h3>Date after 20 days to current date</h3>'.$date->format('d-m-Y') . "\n";

    //Divide the string 1 by occurances of '.'. Combine the array in reverse word sequence
    $arrReverse = explode(".",$string1);
    $arrReverse = array_reverse($arrReverse);
    echo "<h3>Divide the string 1 by occurances of '.'. Combine the array in reverse word sequence</h3>";
    foreach ($arrReverse as  $value) {
        echo $value;
    }
    //divide string into  4 parts and pritn
    $length = strlen($string1)/4;
    $arrSplit = str_split($string1,$length);
    echo '<h3>Divide string into  4 parts and pritn</h3>';
    $i=1;
    foreach ($arrSplit as  $value) {
        echo"<h3>Part $i </h3>".$value;
        $i++;
    }
?>