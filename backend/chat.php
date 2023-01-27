<?php
session_start();
error_reporting(0);

//echo "Backend page";

$chatMessage = $_GET['text'];
//echo $chatMessage;

$to_email = $_SESSION["to_email"];
 $form_email  = $_COOKIE["email"]; 


$sql = "INSERT INTO `message` (`m_from`, `m_to`, `message`) VALUES ('".$form_email."', '".$to_email."', '".$chatMessage."');";

$conn = new mysqli('localhost','root','','bookFinder');
if(!$conn){
echo "Can not connect to Database.";
}
if($conn -> query($sql)){
 // echo "message inserted into database";
   }

   echo '<script language="javascript">';
//    echo 'alert("Message Sent");';
   echo 'window.location = "http://localhost/bookFinder/chat.php"';
   echo '</script>';

?>