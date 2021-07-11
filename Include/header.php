<?php

session_start();

include "functions.php";

if(isset($_SESSION['APP_USER'])){
    $LOGGEDINCHECK = TRUE;
    
    $user = $_SESSION['APP_USER'];
    
} else{
    $LOGGEDINCHECK = FALSE;
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/fonts/ionicons/css/ionicons.min.css">
</head>