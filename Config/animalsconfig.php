<?php
session_start();

/* THIS BLOCK OF CODE IS FOR CHECKING WHETHER OR NOT THE USER IS LOGGEDINCHECK
 * WILL USE IF | ELSE STATEMENT TO GENERATE NECASSARY LINKS TO START
 */

if (isset($_SESSION["APP_USER"])) {
    $LOGGEDINCHECK = true;
    $user = $_SESSION["APP_USER"];
} else {
    $LOGGEDINCHECK = false;
}

include "../Include/functions.php";

$response_message = false;
 
if (isset($_POST["name"]) && isset($_POST["weight"]) && isset($_POST["dateborn"])) {
    $name = sanitize_string($_POST["name"]);
    
    $weight = sanitize_string($_POST["weight"]);

    $dateborn = sanitize_string($_POST["dateborn"]);
    
    if (empty($name) || empty($weight)|| empty($dateborn)) {
        $response_message = false;
    } else {
        $sql = "INSERT INTO `tbl_animals` (`USER_ID`, `NAME`, `DATE_BORN`, `WEIGHT`, `DATE_CREATED`) VALUES ('".get_userid($user)."', '$name', '$dateborn', '$weight', '".time()."')";
        
        if (mysqli_query($conn, $sql)) {
            $response_message = true;
        } else {
            $response_message = false;
        }
    }
}
echo $response_message;
