<!-- Programmer name:94
Takes a form submitted from insertta.php and Inserts values into database -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New TA</title>
</head>
<body>
<?php
   include 'connectdb.php';
   include 'upload_file.php';
?>
<ol>
<?php
   $tauserid = $_POST["tauserid"];
   $firstname = $_POST["firstname"];
   $lastname = $_POST["lastname"];
   $studentnum = $_POST["studentnum"];
   $degreetype = $_POST["degreetype"];
   $query = 'INSERT INTO ta values("' . $tauserid . '","' . $firstname . '","' . $lastname . '","' . $studentnum . '","' . $degreetype . '","' . $image . '")';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
   echo "New TA added!";
   mysqli_close($connection);
?>
</ol>
</body>
</html>
