<?php
session_start();
$conn = new mysqli('localhost','root','','bookFinder');
if(!$conn){
    echo "Can not connect to Database.";
}
//if(isset($_POST('submit'))){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
//}
$rollEmpty = ""; 
$roll = $_POST['roll'];
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$md5Pass = md5($pass1);

echo $roll . $email . $pass1 . $pass2 . " ". $md5Pass;

if(!empty($roll) && !empty($email) && !empty($pass1) && !empty($pass2) ){
    if($pass1 === $pass2){
        echo " Passs Match";
        $cookieName = "email";
        setcookie($cookieName,$email, time()+(8600*30),"/");
        $sql = "INSERT INTO users (roll, email, newPassword) VALUES ('$roll','$email','$md5Pass')";
        if($conn -> query($sql)){
          //  echo "User inserted in Database ";
           //header('location : home.php');
           $_SESSION['login'] = 'successful';
           header("Location: http://localhost/bookFinder/home.php");
exit();
        }
        else{
            echo '<script language="javascript">';
             echo 'alert("Email not valid");';
             echo 'window.location = "http://localhost/bookFinder/home.php"';
             echo '</script>';
           // echo "Can not insert user in Database ";
        }
    }else{
    echo '<script language="javascript">';
    echo 'alert("Password not matched.");';
    echo 'window.location = "http://localhost/bookFinder/home.php"';
    echo '</script>';
    }
}

?>