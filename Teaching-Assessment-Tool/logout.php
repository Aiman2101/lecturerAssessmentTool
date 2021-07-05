<?php
session_start();

//Clear Session
$_SESSION['auto_id'] = "";
session_destroy();

// clear cookies

if (isset($_COOKIE['rememberme'])) {
    setcookie("rememberme", "");
}


header("Location: login.php");
?>
