<!-- Programmer Name: 94
Displays all the course offerings onto the screen.
Has a hidden form which sends coid onclick of a course offering to selected_courseoffer.php -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Western's Teaching Assistants-Course Offers</title>
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

<h1>Course Offering Information:</h1>
<h2>Click on a course to learn more!</h2>

<table id="courseofferTable">
    <tr>
        <th>Course Name</th>
        <th>Course ID</th>
        <th>Term</th>
        <th>Year</th>
	<th>Number of Students</th>
    </tr>

<?php
    $query = 'SELECT * FROM courseoffer';
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Query to display all course offerings failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<tr onclick="selectRow(\'' . $row["coid"] . '\')">';
        echo '<td>' . $row["whichcourse"] . '</td>';
        echo '<td>' . $row["coid"] . '</td>';
        echo '<td>' . $row["term"] . '</td>';
        echo '<td>' . $row["year"] . '</td>';
	echo '<td>' . $row["numstudent"] . '</td>';
        echo '</tr>';
     }
?>

</table>

<form id="selectedForm" method="post" action="selected_courseoffer.php">
    <input type="hidden" name="selected_courseoffer" id="selected_courseoffer">
</form>

<script>
    function selectRow(coid) {
        document.getElementById('selected_courseoffer').value = coid;
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
