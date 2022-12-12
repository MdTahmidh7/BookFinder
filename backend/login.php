<?php
session_start();
$conn = new mysqli('localhost','root','','bookFinder');
if(!$conn){
echo "Can not connect to Database.";
}
//if(isset($_POST('submit'))){
echo "
<pre>";
    print_r($_POST);
    echo "</pre>";
//}
$rollEmpty = "";

$email = $_POST['email'];
$pass = $_POST['pass'];
$md5Pass = md5($pass);

echo $email . $pass  . " ". $md5Pass;

if(!empty($email) && !empty($pass)){

$sql = "SELECT * FROM users WHERE email = '$email' AND newPassword = '$md5Pass' ";
$query = $conn -> query($sql);
if($query-> num_rows > 0){
    $_SESSION['login'] = 'successful';
    header("Location: http://localhost/bookFinder/home.php");
}else{
    echo "Can not login";
}
//if($conn -> query($sql)){
// echo "User inserted in Database ";
//header('location : home.php');
//header("Location: http://localhost/bookFinder/home.php");
//exit();
}
?>