//Programmer name:94
//Takes menuchhoice from main menu and directs to the appropriate file


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["menu_choice"])) {
    $selected_option = $_POST["menu_choice"];

    switch ($selected_option) {
	case "1":
	    header("Location: gettas.php");
	    exit();
            break;
	case "2M":
	    header("Location: getmasters.php");
	    exit();
	    break;
 	case "2P":
	    header("Location: getphd.php");
	    exit();
            break;
	case "3":
            header("Location: insertta.php");
	    exit();
            break;
	case "4":
            header("Location: deleteta.php");
            exit();
            break;
        case "5":
            header("Location: modifyta.php");
            exit();
            break;
        case "6":
            header("Location: assignta.php");
            exit();
            break;
        case "7":
            header("Location: getcourse.php");
            exit();
            break;
        case "8":
            header("Location: getcourseoffer.php");
            exit();
            break;
        default:
            echo "Invalid option";
    }
}
?>
