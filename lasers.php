<?php require 'includes/config.php';?>
<?php $title = "Lasers";?>
<?php include 'includes/header.php';?>
<?php
//lasers.php
$sql = "select * from lasers";
//---config area ends here-------------------------

echo '

<h1>Lasers</h1>         
    <p><strong>L</strong>ight <strong>A</strong>mplification by <strong>S</strong>timulated <strong>E</strong>mission of <strong>R</strong>adiation</p>

';

$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
    while ($row = mysqli_fetch_assoc($result))
    {
       echo "<p>";
       echo "Laser Typed: <b>" . $row['type'] . "</b><br />";
       echo "Gain Medium: <b>" . $row['medium'] . "</b><br />";
       echo "Application: " . $row['application'] . "<br />";
       echo "</p>";
    }
}else{//no records
    echo '<div align="center">What! No customers?  There must be a mistake!!</div>';
}

@mysqli_free_result($result); #releases web server memory
@mysqli_close($iConn); #close connection to database




/*
//
$myConn = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
//
mysql_select_db(DB_NAME,$myConn);
//
$result = mysql_query($sql, $myConn);

$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_error()));
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error()));
if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
    while ($row = mysqli_fetch_assoc($result))
    {
       echo "<p>";
       echo "FirstName: <b>" . $row['FirstName'] . "</b><br />";
       echo "LastName: <b>" . $row['LastName'] . "</b><br />";
       echo "Email: <b>" . $row['Email'] . "</b><br />";
       echo "</p>";
    }
}else{//no records
    echo '<div align="center">What! No customers?  There must be a mistake!!</div>';
}

@mysqli_free_result($result); #releases web server memory
@mysqli_close($iConn); #close connection to database
*/
include 'includes/footer.php';?>