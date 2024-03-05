<!-- Programmer Name: 94
Submits a form with tauserid and image file to modifytaimage.php -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Western's Teaching Assistants-Modify a TA</title>

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
      background-color: #fff;
      align-items: center;
      flex-direction: column;
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

    label {
      margin-bottom: 8px;
    }

    input[type="file"] {
      margin-bottom: 20px;
    }

    input[type="submit"] {
      background-color: #04AA6D;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #045e3a;
    }
  </style>

</head>
<body>
<?php
    include 'connectdb.php'
?>

<h1>Modify a TA</h1>
<h2>Select a TA to modify:</h2>

<form action="modifytaimage.php" method="post" enctype="multipart/form-data">

<?php

   $query = "SELECT * FROM ta";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("TA selection failed.");
    }
   while ($row = mysqli_fetch_assoc($result)) {
	echo $row["firstname"] . " " . $row["lastname"] . "<br>";
        echo '<input type="radio" name="tauserid" value="';
        echo $row["tauserid"];
        echo '">';
   }

?>

Upload TA's image: <input type="file" name="file" id="file"><br>
<input type="submit" name="modify_ta" value="Modify TA">
</form>


</body>
</html>
