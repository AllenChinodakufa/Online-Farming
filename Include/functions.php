<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "online_farming");
define("DB_PORT", "3306");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

if (!$conn) {
    die("Could not connect to database:" .mysqli_connect_error());
}

mysqli_select_db($conn, DB_NAME) or die("Could not select datbase:". mysqli_connect_error());


// FUNCTION TO CREATE A QUERY A VALUE FOR MYSQL
function query_mysqli($query)
{
    global $conn;
    
    $result = mysqli_query($conn, $query);
    
    return $result;
}


// FUNCTION TO CREATE A QUERY A VALUE FOR MYSQL
function get_userid($user)
{
    global $conn;

    $user;
    $sql = "SELECT * FROM `tbl_users` WHERE `USERNAME` = '$user'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $user = $row["USER_ID"];
        }
    }
    
    return $user;
}


// FUNCTION TO GET INPUT FROM A USER
function sanitize_string($var)
{
    $var = htmlentities($var);
    
    $var = stripslashes($var);
    
    $var = strip_tags($var);
    
    global $conn;
    
    return mysqli_real_escape_string($conn, $var);
}


// FUNCTION TO SECURE STRING USING MD%
function hash_string($var)
{
    return md5($var);
}


// FUNCTION TO DESTROY SESSIONS OF A USER
function logout_check($user)
{
    $_SESSION = array();
    
    if (session_id() != "" || isset($_COOKIE['loggedin'])) {
        setcookie('loggedin', "$user", time()-(86400 * 30), '/');
    }
    
    session_destroy();
}


// FUNCTION TO DESTROY SESSIONS OF A USER
function login_check($user)
{
    if (isset($user)) {
        echo "You are already loggedin $user";
    } elseif (isset($_COOKIE[''.$user.''])) {
        echo "You are already loggedin";
    }
}
