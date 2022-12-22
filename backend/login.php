<?php
session_start();
$conn = new mysqli('localhost','root','','bookFinder');
if(!$conn){
echo "Can not connect to Database.";
}
$rollEmpty = "";

$email = $_POST['email'];
$pass = $_POST['pass'];
//$roll = $_POST['roll'];
$md5Pass = md5($pass);

$cookieName = 'email';
setcookie($cookieName,$email, time()+(8600*30),"/");
//echo " c v = ". $_COOKIE[$email];


if(!empty($email) && !empty($pass)){
$sql = "SELECT * FROM users WHERE email = '$email' AND newPassword = '$md5Pass' ";
$query = $conn -> query($sql);
if($query-> num_rows > 0){
    $_SESSION['login'] = 'successful';
    header("Location: http://localhost/bookFinder/home.php");
}else{
    echo '<script language="javascript">';
    echo 'alert("Incorrect EMAIL Or PASSWORD");';
    echo 'window.location = "http://localhost/bookFinder/home.php"';
    echo '</script>';
   // header("Location: http://localhost/bookFinder/home.php");
   //echo "Can not login";
}
}
?>