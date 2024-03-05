<!-- Programmer NameL 94
Displays all Ta info where degreetype is masters -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Western's Teaching Assistants-Info</title>
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

<h1>Teaching Assistant Information:</h1>
<h2>Click on a TA to learn more!</h2>

<table id="taTable">
    <tr>
        <th>Ta ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Student Num</th>
        <th>Degree Type</th>
	<th>Image</th>
    </tr>

<?php
    $query = 'SELECT * FROM ta WHERE degreetype="Masters"';
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Query to display all TAs' info failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
	echo '<tr onclick="selectRow(\'' . $row["tauserid"] . '\')">';
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

<form id="selectedForm" method="post" action="selected_ta.php">
    <input type="hidden" name="selected_ta" id="selected_ta">
</form>

<script>
    function selectRow(tauserid) {
        document.getElementById('selected_ta').value = tauserid;
        document.getElementById('selectedForm').submit();
    }
</script>

<?php
   mysqli_close($connection);
?>
</body>
</html>
