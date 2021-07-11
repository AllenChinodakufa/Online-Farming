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
 
if (isset($_POST["item"]) && isset($_POST["category"]) && isset($_POST["cost"])) {
    $item = sanitize_string($_POST["item"]);
    
    $category = sanitize_string($_POST["category"]);

    $cost = sanitize_string($_POST["cost"]);
    
    if (empty($item) || empty($category)|| empty($cost)) {
        $response_message = false;
    } else {
        $sql = "INSERT INTO `tbl_inventory` (`USER_ID`, `ITEM`, `CATEGORY`, `COST`, `TYPE`, `DATE_CREATED`) VALUES ('".get_userid($user)."', '$item', '$category', '$cost', 'expense', '".time()."')";
        
        if (mysqli_query($conn, $sql)) {
            $response_message = true;
        } else {
            $response_message = false;
        }
    }
}
echo $response_message;
