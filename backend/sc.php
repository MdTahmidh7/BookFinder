<?php
session_start();
echo "sc";

echo $_SESSION['to_email'];

echo $_POST['b'];
$_SESSION['to_email'] = $_POST['b'];


echo '<script language="javascript">';
echo 'window.location = "http://localhost/bookFinder/chat.php"';
echo '</script>';



?>