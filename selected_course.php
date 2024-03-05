<!-- Programmer Name: 94
Gets coursenum from getcourse.php and displays all information about the course's offering -->

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

        li::before {
            content: "\2022";
            color: #006600;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
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

$coursenum = $_POST["selected_course"];

?>

<table>
    <tr>
        <th>Course Number</th>
        <th>Course Name</th>
        <th>Level</th>
        <th>Year</th>
    </tr>

<?php
    $query = "SELECT * FROM course WHERE coursenum = '$coursenum'";
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Query to display course's info failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row["coursenum"] . '</td>';
        echo '<td>' . $row["coursename"] . '</td>';
        echo '<td>' . $row["level"] . '</td>';
        echo '<td>' . $row["year"] . '</td>';
        echo '</tr>';
     }
     mysqli_free_result($result);
?>

</table>
<br>


<?php

$query2 = 'SELECT co.* FROM courseoffer AS co, course AS c WHERE c.coursenum = "' . $coursenum . '" AND c.coursenum = co.whichcourse';
$result2=mysqli_query($connection,$query2);
if (!$result2) {
	 die("Query to display course offering has failed.");
     }

// Check if there are rows
if (mysqli_num_rows($result2) > 0) {
       echo '<ul> Course offerings:';
       while ($row=mysqli_fetch_assoc($result2)) {
	   echo '<li>';
           echo $row["coid"] . " :- "  .  'Number of Students: ' . $row["numstudent"] . ' for ' . $row["term"] . ' ' . $row["year"];
           echo '</li>';}
	echo '</ul>';}

   else {
	echo "<p>TA hasn't worked on any courses </p>";}

   mysqli_free_result($result2);

   mysqli_close($connection);
?>

</body>
</html>
