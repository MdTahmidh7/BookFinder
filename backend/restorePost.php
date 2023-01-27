<?php
echo "Archive post page";

echo $_POST['btn1'];
$postID = $_POST['btn1'];
echo "<br>".$postID;


 $conn = new mysqli('localhost','root','','bookFinder');
// //$sql = "DELETE FROM post WHERE `post`.`post_id` = '".$_POST['btn1']."'";

 $sql = "UPDATE `post` SET `archive` = '0' WHERE `post`.`post_id` = '$postID';";
if($conn -> query($sql)){
    echo '<script language="javascript">';
    echo 'alert("Post Restored");';
    echo 'window.location = "http://localhost/bookFinder/archivedPost.php"';
    echo '</script>';
}else{
echo '<script language="javascript">';
echo 'alert("Can not execute Query");';
echo '</script>';
}

?>