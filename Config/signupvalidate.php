<?php
session_start();

/* THIS BLOCK OF CODE IS FOR CHECKING WHETHER OR NOT THE USER IS LOGGEDIN
 * WILL USE IF | ELSE STATEMENT TO GENERATE NECASSARY LINKS TO START
 */

if(isset($_SESSION["MAGAZINE_USER"])){
    $LOGGEDIN = TRUE;
    $MAG_USERNAME = $_SESSION["MAGAZINE_USER"];
}else{
    $LOGGEDIN = FALSE;            
}

include "../Include/functions.php";

$register_report = "";

/*
 * If form-signin is submited,
 * Check if the username || password are valid
 * Check if they exist in the mysqli database
 * If true <click.me> to verify account
*/

/*
 * If form-signup is submited,
 * Check if the username || password are valid
 * Check if they exist in the mysqli database
 * If true return, username taken
 * register and ask to login to verify account
*/

if(isset($_POST["username"]) && isset($_POST["password"])){
    
    $username = sanitize_string($_POST["username"]);
    
    $password = sanitize_string($_POST["password"]);
    
    if(empty($username) || empty($password)){
        $signup_report = FALSE;
    }else{
        
        $sql = "SELECT * FROM `tbl_users` WHERE `USERNAME` = '$username'";
        
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0){            
            $signup_report = FALSE;
        }else{
            $sql = "INSERT INTO `tbl_users` (`USER_ID`, `USERNAME`, `PASSWORD`, `ACCOUNT_TYPE`, `DATE_CREATED`) VALUES (".time().", '$username', '".hash_string($password)."', 'basic', ".time().")";
            if(mysqli_query($conn, $sql)){
                $signup_report = TRUE;
            }
        }
    }
    echo $signup_report;
}
?>