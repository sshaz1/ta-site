<!-- Programmer Name:94
Assigns a course offering to a Ta both given by user with form inputs -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Western's Teaching Assistants-Assign a Course Offering</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e6ffe6;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            color: #006600;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
        }

        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #006600;
            color: #fff;
            cursor: pointer;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
	    color: #006600;
        }

    </style>

</head>
<body>
<?php
    include 'connectdb.php'
?>

<h1>Assign a Course Offering</h1>
<h2>Our TAs</h2>

<?php

   echo '<form method="post" action="";">';
   echo "Select a TA to assign a course offering to:</br>";

   $query = "SELECT * FROM ta";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("TA selection failed.");
    }
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="selected_ta" value="';
        echo $row["tauserid"];
        echo '">' . $row["firstname"] . " " . $row["lastname"] . "<br>";
   }
   echo "<br>";
   echo "Select the course offering to assign:</br>";

   $query2 = "SELECT * FROM courseoffer";
   $result2 = mysqli_query($connection,$query2);
   if (!$result2) {
        die("Course Offering selection failed.");
    }
   while ($row = mysqli_fetch_assoc($result2)) {
        echo '<input type="radio" name="selected_coid" value="';
        echo $row["coid"];
        echo '">' . 'Course ID: ' . $row["coid"] . ', Course Name:  ' . $row["whichcourse"] . "<br>";
   }

echo "<br>";
echo 'Amount of hours: <input type="text" name="hours">';

echo '<input type="submit" name="modify_ta" value="Modify TA">';
echo '</form>';

mysqli_free_result($result);
mysqli_free_result($result2);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if selected_ta, selected coid and hours are set
    if (isset($_POST["selected_ta"]) && isset($_POST["selected_coid"]) && isset($_POST["hours"])) {
        $selected_ta = $_POST["selected_ta"];
        echo "Selected TA: " . $selected_ta . "<br>";

	$selected_coid = $_POST["selected_coid"];
        echo "Selected Course ID: " . $selected_coid . "<br>";

	$hours = $_POST["hours"];
        echo "Selected hours: " . $hours . "<br>";

	$query = 'INSERT INTO hasworkedon VALUES("' . $selected_ta . '","' . $selected_coid . '",' . $hours . ')';
        if (!mysqli_query($connection, $query)) {
		if (mysqli_errno($connection) == 1062) {
			echo "Course offering already assigned to TA!";}
		else{
             		die("Error: Query for Course assignment failed" . mysqli_error($connection));}
	    }
	else{
        echo "Course has been assigned to TA!";}
        mysqli_close($connection);

	   }

    else{
    echo "Please Select Both: A TA and Course Offering! Also the amount of hours!";
    }

}
?>

</body>
</html>
