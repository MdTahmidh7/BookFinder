<?php
echo "Archive post page";

echo $_POST['btn1'];


$conn = new mysqli('localhost','root','','bookFinder');
//$sql = "DELETE FROM post WHERE `post`.`post_id` = '".$_POST['btn1']."'";
$sql = "UPDATE `post` SET `archive` = '1' WHERE `post`.`post_id` ='".$_POST['btn1']."'";

if($conn -> query($sql)){
    echo '<script language="javascript">';
    echo 'alert("Post Archived");';
    echo 'window.location = "http://localhost/bookFinder/allPost.php"';
    echo '</script>';
}else{
echo '<script language="javascript">';
echo 'alert("Can not execute Query");';
echo '</script>';
}

?>