<?php
session_start();

echo "Logged Out\n";
echo "Redirecting to the home page now...";

// remove all session variables
session_unset();

// destroy the session
session_destroy();
header("refresh:1;url=index.php");

?>
