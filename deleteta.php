<!-- Programmer Name: 94
Asks user for the Ta to be deleted and deletes them if possible -->


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Western's Teaching Assistants-Delete a TA</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    h1, h2 {
      text-align: center;
      color: #333;
      background-color: #04AA6D;
      padding: 20px 0;
      margin: 0;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin: 20px auto;
      width: 80%;
      max-width: 400px;
    }

    input[type="radio"] {
      margin-bottom: 10px;
    }

    input[type="submit"] {
      background-color: #e60000;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #990000;
    }
  </style>

</head>
<body>
<?php
    include 'connectdb.php'
?>

<h1>Delete a TA</h1>
<h2>Select a TA to delete:</h2>


<?php

   echo '<form method="post" action="" onsubmit="return confirmDelete();">';

   $query = "SELECT * FROM ta";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("TA selection failed.");
    }
   while ($row = mysqli_fetch_assoc($result)) {
        echo $row["firstname"] . " " . $row["lastname"] . "<br>";
        echo '<input type="radio" name="selected_ta" value="';
        echo $row["tauserid"];
        echo '">';
   }

echo '<input type="submit" name="delete_ta" value="Delete TA">';
echo '</form>';


// Check if a TA is selected for deletion
if (isset($_POST["delete_ta"]) && isset($_POST["selected_ta"])) {
$selected_ta = $_POST["selected_ta"];

// Perform the deletion query
$delete_query = "DELETE FROM ta WHERE tauserid = '$selected_ta'";
$delete_result = mysqli_query($connection, $delete_query);

if (!$delete_result) {

    // Check if the error is due to a foreign key constraint (1451 is the error code for this)
    if (mysqli_errno($connection) == 1451) {
        echo "Cannot delete the TA because they're working on a course offering.";
    } else {
        die("TA deletion failed: " . mysqli_errno($connection));
    }
}
else {
    echo "TA deleted successfully. Refreshing the page!";

    // Redirect to the same page to refresh delay of 1 second
    header("Refresh:1");
    }
}
mysqli_free_result($result);
mysqli_close($connection)
?>

<script>
    function confirmDelete() {
    return confirm("Are you sure you want to delete this person?");
        }
</script>

</body>
</html>
