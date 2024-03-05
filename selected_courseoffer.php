<!-- Programmer Name: 94
Gets coid from getcourseoffer.php and displays all the ta information who are working on the course offering -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Western's Teaching Assistants-Info</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e6ffe6;
            color: #006600;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            color: #006600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #c3e6c3;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #006600;
            color: #fff;
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

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        li::before {
            content: "\2022";
            color: #006600;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
    </style>

</head>
<body>

<?php
include 'connectdb.php';

$coid = $_POST["selected_courseoffer"];

?>

<table>
    <tr>
        <th>Course Name</th>
        <th>Course ID</th>
        <th>Term</th>
        <th>Year</th>
        <th>Number of Students</th>
    </tr>

<?php
    $query = "SELECT * FROM courseoffer WHERE coid = '$coid'";
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Query to display course offer's info failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row["whichcourse"] . '</td>';
        echo '<td>' . $row["coid"] . '</td>';
        echo '<td>' . $row["term"] . '</td>';
        echo '<td>' . $row["year"] . '</td>';
        echo '<td>' . $row["numstudent"] . '</td>';
        echo '</tr>';
     }
     mysqli_free_result($result);
?>

</table>
<br>


<?php

$query2 = "SELECT t.* FROM ta AS t, hasworkedon AS hwo WHERE t.tauserid = hwo.tauserid AND hwo.coid = '$coid'";
$result2=mysqli_query($connection,$query2);
if (!$result2) {
         die("Query to display ta information has failed: " . mysqli_error($connection));
     }

// Check if there are rows
if (mysqli_num_rows($result2) > 0) {
       echo '<ul> Ta working on this course offering:';
       while ($row=mysqli_fetch_assoc($result2)) {
           echo '<li>';
           echo $row["tauserid"] . ": " . $row["firstname"] . " " . $row["lastname"] . ".";
           echo '</li>';}
        echo '</ul>';}

   else {
	echo "<p>No TA has worked on this course offering </p>";}

   mysqli_free_result($result2);

   mysqli_close($connection);
?>

</body>
</html>
