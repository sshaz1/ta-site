<!-- Programmer Name: 94
Displays all the courses onto the screen. Has a hidden form which sends coursenum onclick of a course to selected_course.php -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Western's Teaching Assistants-Courses</title>
</head>

<style>
       	body {
            font-family: Arial, sans-serif;
        }

	table{
            width: 100%;
        }

	th{
	background-color: #04AA6D;
        }

	th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

	tr:hover {background-color: GhostWhite;}

    </style>

<body>

<?php
include 'connectdb.php';
?>

<h1>Course Information:</h1>
<h2>Click on a course to learn more!</h2>

<table id="courseTable">
    <tr>
        <th>Course Number</th>
        <th>Course Name</th>
        <th>Level</th>
        <th>year</th>
    </tr>

<?php
    $query = 'SELECT * FROM course';
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Query to display all courses' info failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<tr onclick="selectRow(\'' . $row["coursenum"] . '\')">';
        echo '<td>' . $row["coursenum"] . '</td>';
        echo '<td>' . $row["coursename"] . '</td>';
        echo '<td>' . $row["level"] . '</td>';
        echo '<td>' . $row["year"] . '</td>';
        echo '</tr>';
     }
?>

</table>

<form id="selectedForm" method="post" action="selected_course.php">
    <input type="hidden" name="selected_course" id="selected_course">
</form>

<script>
    function selectRow(coursenum) {
        document.getElementById('selected_course').value = coursenum;
        document.getElementById('selectedForm').submit();
    }
</script>


<?php
   //releases memory
   mysqli_free_result($result);
   mysqli_close($connection);
?>

</body>
</html>
