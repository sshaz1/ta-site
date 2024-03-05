<!-- Programmer Name: 94
Gets tauserid and image from modifyta.php. Updates the image column with the giver image of given tauserid -->

<!DOCTYPE html>
<html>

<!-- Programmer Name: 94
Gets tauserid and image from modifyta.php. Updates the image column with the giver image of given tauserid -->

<head>
<meta charset="utf-8">
<title>Modify TA</title>
</head>
<body>
<?php
   include 'connectdb.php';
   include 'upload_file.php';
?>
<ol>
<?php
   $tauserid = $_POST["tauserid"];
   $query = 'UPDATE ta SET image = "'. $image . '" WHERE tauserid ="' . $tauserid . '";';
   if (!mysqli_query($connection, $query)) {
        die("Error: update failed" . mysqli_error($connection));
    }
   echo "Image added to TA!";
   mysqli_close($connection);
?>
</ol>
</body>
</html>
