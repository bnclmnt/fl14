<?php
//config.php
include 'credentials.php';#database credentials
define('THIS_PAGE' ,basename($_SERVER['PHP_SELF']));
define('DEBUG',TRUE); #we want to see all errors
//echo THIS_PAGE;
//die;

$nav1['home.php'] = "Home";
$nav1['ourwork.php'] = "Our Work";
$nav1['testimonials.php'] = "Testimonials";
$nav1['lasers.php'] = "Lasers";
$nav1['contact.php'] = "Contact";

/*
echo '<pre>';
var_dump(makeLinks($nav1));
echo '</pre>';
*/
switch(THIS_PAGE){
	case 'home.php' :
		$title = "Home";
		$pic = "images/laserhorse.jpg";
		$pageId ="About Us";
		break;
		
	case 'ourwork.php' :
		$title = "Our Work";
		$pic = "images/laserracoon.jpg";
		$pageId ="What We Do";
		break;
		
		case 'testimonials.php' :
		$title = "Testimonials";
		$pic = "images/laserbear.jpg";
		$pageId ="What People Are Saying About Us";
		break;
		
	case 'contact.php' :
		$title = "Contact";
		$pic = "images/laserwolf.jpg";
		$pageId ="Send us a message";
		break;
		
	case 'lasers.php' :
		$title = "Laser";
		$pic = "images/laserfalcon.jpg";
		$pageId ="Awesome Lasers!";
		break;
		
	default:
		$title = "Default Title Tag";
		$banner = "Site Banner";
	}







function makeLinks($nav){
	$myReturn ='';
	foreach ($nav as $url => $label){
		if($url==THIS_PAGE){
			//current page, add class
			$myReturn .='<li class="current"><a href=" ' . $url . ' ">' . $label . ' </a></li>';
			}
		else{
			//no class
			$myReturn .='<li><a href=" ' . $url . ' ">' . $label . ' </a></li>';
			}
		}
	return $myReturn;
	}
/*
builds and sends a safe email, using Reply-To properly!
$today = date("Y-m-d H:i:s");
$to = 'bcleme04@seattlecentral.edu';
$replyTo = 'bnclmnt@gmail.com';
$subject = 'Test Email, No ReplyTo: ' . $today;
$message = 'Test Message Here.  Below should be a carriage return or two: ' . PHP_EOL . PHP_EOL . 'Here is some more text.  Hopefully BELOW the carriage return!';

safeEmail($to, $subject, $message, $replyTo);
*/

function safeEmail($to, $subject, $message, $replyTo=''){#builds and sends a safe email, using Reply-To properly!
	$fromDomain = $_SERVER["SERVER_NAME"];
	$fromAddress = "noreply@" . $fromDomain; //form always submits from domain where form resides
	if($replyTo==''){$replyTo='';}
	$headers = 'From: ' . $fromAddress . PHP_EOL .
		'Reply-To: ' . $replyTo . PHP_EOL .
		'X-Mailer: PHP/' . phpversion();
	return mail($to, $subject, $message, $headers);
}


function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
}


function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
        echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
        die();
    }
}

?>