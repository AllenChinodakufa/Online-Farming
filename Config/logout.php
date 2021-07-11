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

$register_report = TRUE;

logout_check($user);

echo $register_report;
?>