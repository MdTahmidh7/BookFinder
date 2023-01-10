<?php
$var=$_POST['btn1'];
echo "Con" . $var;

$conn = new mysqli('localhost','root','','bookFinder');
$slq_UpadteConfirmStatus = "UPDATE `request` SET `request_status` = 'Confirm' WHERE `request`.`request_id` = '".$_POST['btn1']."'";

if($conn -> query($slq_UpadteConfirmStatus)){
    echo '<script language="javascript">';
    echo 'alert("Request Confirmed");';
    echo 'window.location = "http://localhost/bookFinder/receivedRequest.php"';
    echo '</script>';
}else{
echo '<script language="javascript">';
echo 'alert("Can not execute Query");';
echo '</script>';
}

?>