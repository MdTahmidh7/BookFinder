<?php
session_start();
$var = $_GET['forSessionChange'];
echo "email = " . $var;
$_SESSION['to_email'] = $var;
echo "<br>session value = " . $_SESSION['to_email'];
echo '<script language="javascript">';
echo 'window.location = "http://localhost/bookFinder/chat.php"';
echo '</script>';
?>