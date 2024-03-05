<!--Programmer name:94
A form to submite to addnewta.php with all values of Ta to insert into database -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New TA</title>

<style>
    body {
      background-color: #f0f0f0;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    h1 {
      text-align: center;
      color: #333;
      padding: 20px 0;
      background-color: #04AA6D;
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

    label {
      margin-bottom: 8px;
    }

    input {
      padding: 10px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="radio"] {
      margin-right: 8px;
    }

    input[type="file"] {
      margin-bottom: 20px;
    }

    input[type="submit"] {
      background-color: #04AA6D;
      color: #fff;
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
   include 'connectdb.php';
?>

<h1>Let's add a new TA!</h1>

<form action="addnewta.php" method="post" enctype="multipart/form-data">
New TA's User ID: <input type="text" name="tauserid"><br>
New TA's First Name: <input type="text" name="firstname"><br>
New TA's Last Name: <input type="text" name="lastname"><br>
New TA's Student Number: <input type="text" name="studentnum"><br>
Masters<br>
<input type="radio" name="degreetype" value="Masters">Phd<br>
<input type="radio" name="degreetype" value="PhD"><br>
Upload TA's image: <input type="file" name="file" id="file"><br>
<input type="submit" value="Add New TA">
</form>


<?php
mysqli_close($connection);
?>

</body>
</html>
