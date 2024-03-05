
<?php
/*Programmer name:94
Establishes connection with assign2db database*/

$dbhost = "localhost";
$dbuser= "root";
$dbpass = "cs3319";
$dbname = "assign2db";
$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
if (mysqli_connect_errno()) {
     die("database connection failed :" .
     mysqli_connect_error() .
     "(" . mysqli_connect_errno() . ")"
         );
    }
?>
