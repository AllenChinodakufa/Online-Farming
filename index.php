<?php
include "Include/header.php";

if(!$LOGGEDINCHECK){
    header("location: login.php");
} else{
    header("location: main.php");
}

include "Include/footer.php";
?>