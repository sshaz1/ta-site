<!-- Displays all Ta info except images
Also has a hidden submitting form which sends tauserid to selected_ta.php onclick of the row -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Western's Teaching Assistants-Info</title>
</head>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #333;
            background-color: #04AA6D;
            padding: 15px;
            border-radius: 5px;
        }

        h2 {
            color: #04AA6D;
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
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #04AA6D;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        form {
            display: none;
        }

        script {
            display: none;
        }

        tr:hover {
	    background-color: #e0f7fa; /* Light Blue color on hover */
    	transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
    	cursor: pointer;
    	transform: scale(1.05); /* Slight scaling effect on hover */
    	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for a pop-out effect */
        }

        script {
            display: none;
        }
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
    </tr>

<?php
    $query = 'SELECT * FROM ta';
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
   	echo '</tr>';
     }
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
   //releases memory
   mysqli_free_result($result);
   mysqli_close($connection);
?>
</body>
</html>




