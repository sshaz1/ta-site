/* Programmer Name: 94
Displays a main menu with options to choose from and submits form to menuchoice.php*/

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title>Western's Teaching Assistants</title>

<style>

/* Apply a background color and add some padding to the body */
body {
    background-image: url('https://www.thoughtco.com/thmb/rDJq8YMIMBxyYgJ1851qpoSI6iw=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/138540030-56a449713df78cf772819703.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-color: #f4f4f4;
    padding: 20px;
    font-family: Arial, sans-serif;
    height: 100vh; /* Set the height to 100% of the viewport height */
}

/* Style the header */
h1 {
    color: #333;
}

/* Style the form container */
form {
    max-width: 600px;
    margin: 20px auto;
}

/* Style each menu item container */
div {
    display: flex;
    align-items: center;
    justify-content: center; /* Center the content horizontally */
    margin-bottom: 10px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Style labels for better alignment */
label {
    margin-right: 10px;
    font-weight: bold;
}

/* Style paragraphs inside each menu item */
div p {
    padding: 10px;
    text-align: center; /* Center the text */
}

/* Style buttons */
button {
    padding: 10px 15px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Hover effect on buttons */
button:hover {
    background-color: #45a049;
}


</style>

</head>

<body>

<h1>Welcome to the Western TA site</h1>
<h2>Main Menu</h2>

<?php
include 'connectdb.php';
?>


<!-- All the choices displayed with a form to be sent to menuchoice.php -->

<form method="post" action="menuchoice.php">

    <div>
        <label for="option1">1.</label>
        <p>List all information about all the TA's (except images):</p>
        <button type="submit" name="menu_choice" value="1" id="option1">All Ta's</button>
    </div>

    <div>
	<label for="option2">2.</label>
        <p>TA info depending on their degree type:</p>
        <button type="submit" name="menu_choice" value="2M" id="option2">Masters</button>
	<p>or</p>
        <button type="submit" name="menu_choice" value="2P" id="option2">PhD</button>
     </div>

    <div>
	<label for="option3">3.</label>
        <p>Insert A New TA: </p>
        <button type="submit" name="menu_choice" value="3" id="option3">Insert</button>
     </div>

     <div>
	<label for="option4">4.</label>
        <p>Delete a TA: </p>
        <button type="submit" name="menu_choice" value="4" id="option4">Delete</button>
     </div>

     <div>
	<label for="option5">5.</label>
        <p>Modify a TA's Image: </p>
        <button type="submit" name="menu_choice" value="5" id="option5">Modify</button>
     </div>

     <div>
	<label for="option6">6.</label>
        <p>Assign TA a Course Offering: </p>
        <button type="submit" name="menu_choice" value="6" id="option6">Assign</button>
     </div>

     <div>
	<label for="option7">7.</label>
        <p>List all information about all Courses: </p>
        <button type="submit" name="menu_choice" value="7" id="option7">All Courses</button>
     </div>

     <div>
	<label for="option8">8.</label>
        <p>List all information about all Course Offers: </p>
        <button type="submit" name="menu_choice" value="8" id="option8">All Course Offers</button>
     </div>

</form>



</body>
</html>
