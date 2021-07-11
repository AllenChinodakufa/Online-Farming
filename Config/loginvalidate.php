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

$register_report = FALSE;
 
if(isset($_POST["username"]) && isset($_POST["password"])){
    
    $username = sanitize_string($_POST["username"]);
    
    $password = sanitize_string($_POST["password"]);
    
    if(empty($username) || empty($password)){
        $register_report = FALSE;
    }else{
        
        $sql = "SELECT * FROM `tbl_users` WHERE `USERNAME` = '$username' AND `PASSWORD` = '".hash_string($password)."'";
        
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0){            
            $_SESSION["APP_USER"] = $username;
            $LOGGEDINCHECK = TRUE;
            $register_report = TRUE;
        }else{
            $register_report = FALSE;
        }
    }
}
echo $register_report;
?>