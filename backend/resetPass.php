<?php
session_start();
$conn = new mysqli('localhost','root','','bookFinder');
echo $_POST['newPass1'];
echo $_POST['newPass2'];

if($_POST['newPass1'] == $_POST['newPass2']){
    $md5Pass = md5($_POST['newPass1']);
    $sql = "UPDATE `users` SET `newPassword` = '".$md5Pass."' WHERE `users`.`email` = '".$_SESSION['temp_email']."';";
    if($conn -> query($sql)){
            echo '<script language="javascript">';
            echo 'alert("Passward reset successful.");';
            echo 'window.location = "http://localhost/bookFinder/login.php"';
            echo '</script>';
       }

}else{
            echo '<script language="javascript">';
            echo 'alert("Passward does not matches !!");';
            echo 'window.location = "http://localhost/bookFinder/enterOtp.php"';
            echo '</script>';
}
