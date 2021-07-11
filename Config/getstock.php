<?php
session_start();

/* THIS BLOCK OF CODE IS FOR CHECKING WHETHER OR NOT THE USER IS LOGGEDINCHECK
 * WILL USE IF | ELSE STATEMENT TO GENERATE NECASSARY LINKS TO START
 */

if(isset($_SESSION["APP_USER"])){
    $LOGGEDINCHECK = TRUE;
    $user = $_SESSION["APP_USER"];
}else{
    $LOGGEDINCHECK = FALSE;            
}

include "../Include/functions.php";

$response = array();

$sql = "SELECT * FROM `tbl_inventory` WHERE `TYPE` = 'stock'";
        
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){            
    $_SESSION["APP_USER"] = $username;
    $LOGGEDINCHECK = TRUE;
    $response = TRUE;
}else{
    $response = FALSE;
}
echo $response;
?>