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
 
if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["category"]) && isset($_POST["dimensions"])) {
    $id = sanitize_string($_POST["id"]);

    $name = sanitize_string($_POST["name"]);
    
    $category = sanitize_string($_POST["category"]);

    $dimensions = sanitize_string($_POST["dimensions"]);
    
    if (empty($name) || empty($category)|| empty($dimensions)) {
        $response_message = false;
    } else {
        $sql = "UPDATE `tbl_crops` SET `NAME` = '$name', `CATEGORY` = '$category', `DIMENSIONS` = '$dimensions' WHERE `tbl_crops`.`CROP_ID` = $id";

        if (mysqli_query($conn, $sql)) {
            $response_message = true;
        } else {
            $response_message = false;
        }
    }
}
echo $response_message;
