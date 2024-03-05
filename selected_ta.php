<!DOCTYPE html>
<html>

<!-- Programmer Name: 94
Displays all information about Ta selected in gettas.php -->

<head>
<meta charset="utf-8">
<title>Western's Teaching Assistants-Info</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
            background-color: #4CAF50;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
        }

        img {
            max-width: 60px;
            max-height: 60px;
            border-radius: 50%;
        }

        p {
            margin-bottom: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            border: 1px solid #ddd;
            margin: 5px 0;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        p {
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        p + p {
            margin-top: 20px;
        }

    </style>

</head>
<body>

<?php
include 'connectdb.php';

$ta = $_POST["selected_ta"];

?>

<table>
    <tr>
        <th>Ta ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Student Num</th>
        <th>Degree Type</th>
        <th>Image</th>
    </tr>

<?php
    $query = "SELECT * FROM ta WHERE tauserid = '$ta'";
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Query to display all TAs' info failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row["tauserid"] . '</td>';
        echo '<td>' . $row["firstname"] . '</td>';
        echo '<td>' . $row["lastname"] . '</td>';
        echo '<td>' . $row["studentnum"] . '</td>';
        echo '<td>' . $row["degreetype"] . '</td>';
        echo '<td><img src="' . $row["image"] . '" height="60" width="60"></td>';
	echo '</tr>';
     }
     mysqli_free_result($result);
?>

</table>
<?php
   $query4 = "SELECT c.*, co.*, hwo.* FROM course AS c, hasworkedon AS hwo, courseoffer AS co WHERE hwo.tauserid = '$ta' AND co.coid = hwo.coid AND c.coursenum = co.whichcourse";
   $result4=mysqli_query($connection,$query4);
   if (!$result4) {
         die("Query to display courses Ta has worked on failed.");
     }

   // Check if there are rows
   if (mysqli_num_rows($result4) > 0) {
       echo '<h3>Ta has worked on:</h3>';
       echo '<ul>';
       while ($row=mysqli_fetch_assoc($result4)) {
		echo '<li>';
		echo $row["coursenum"] . ':- ' . $row["coursename"] . '. Course ID: ' . $row["coid"] . '<br>';
		echo $row["year"] . ' of ' . $row["term"] . ' for ' . $row["hours"] . ' hours';}
		echo '</li>';

       echo '</ul>';}


   else {
	echo "<p>TA hasn't worked on any courses </p>";}

   $query2 = "SELECT * FROM hates WHERE htauserid = '$ta'";
   $result2=mysqli_query($connection,$query2);
   if (!$result2) {
         die("Query to display Ta's hated courses failed.");
     }

   // Check if there are rows
   if (mysqli_num_rows($result2) > 0) {
       echo '<p> TA hates: ';
       while ($row=mysqli_fetch_assoc($result2)) {
           echo $row["hcoursenum"] . " ";}
       echo '</p>';}
   else {
	echo "<p> No courses hated by this TA </p>";}
   mysqli_free_result($result2);

   $query3 = "SELECT * FROM loves WHERE ltauserid = '$ta'";
   $result3=mysqli_query($connection,$query3);
   if (!$result3) {
         die("Query to display Ta's loved courses failed.");
     }

   // Check if there are rows
   if (mysqli_num_rows($result3) > 0) {
       echo '<p> TA loves: ';
       while ($row=mysqli_fetch_assoc($result3)) {
           echo $row["lcoursenum"] . " ";}
       echo '</p>';}

   else {
	echo "<p> No courses loved by this TA </p>";}

   mysqli_free_result($result3);

   mysqli_free_result($result4);

   mysqli_close($connection);
?>


</body>
</html>
