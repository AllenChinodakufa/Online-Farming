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
 
if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["weight"]) && isset($_POST["dateborn"])) {
    $id = sanitize_string($_POST["id"]);

    $name = sanitize_string($_POST["name"]);
    
    $weight = sanitize_string($_POST["weight"]);

    $dateborn = sanitize_string($_POST["dateborn"]);
    
    if (empty($name) || empty($weight)|| empty($dateborn)) {
        $response_message = false;
    } else {
        $sql = "UPDATE `tbl_animals` SET `NAME` = '$name', `WEIGHT` = '$weight', `DATE_BORN` = '$dateborn' WHERE `tbl_animals`.`ANIMAL_ID` = $id";

        if (mysqli_query($conn, $sql)) {
            $response_message = true;
        } else {
            $response_message = false;
        }
    }
}
echo $response_message;
