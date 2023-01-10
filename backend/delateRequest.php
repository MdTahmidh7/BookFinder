<?php
ob_start();
$var=$_POST['btn1'];
echo $var;

$conn = new mysqli('localhost','root','','bookFinder');
$sql = "DELETE FROM request WHERE `request`.`request_id` = '".$_POST['btn1']."'";

if($conn -> query($sql)){
    echo '<script language="javascript">';
    echo 'alert("Request Deleted");';
    echo 'window.location = "http://localhost/bookFinder/sentRequest.php"';
    echo '</script>';
}else{
echo '<script language="javascript">';
echo 'alert("Can not execute Query");';
echo '</script>';
}

?>
