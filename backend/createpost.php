<?php
session_start();
$conn = new mysqli('localhost','root','','bookFinder');
if(!$conn){
echo "Can not connect to Database.";
}
echo "<pre>";
    print_r($_POST);
    echo "</pre>";

$bookName = $_POST['bookName'];
$authorName = $_POST['authorName'];
$edition = $_POST['edition'];
$details = $_POST['details'];

echo $bookName . " " . $authorName . " " . $edition  . " "  . $details . "<br> " ;
echo "cookie value " . $_COOKIE["email"] . "<br> <br>";
$temp = $_COOKIE["email"];
//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>'; 

$sql1 = "SELECT id FROM users where email = '".$temp."'";
$result = mysqli_query($conn,$sql1) or die ("Query feild");
$row = mysqli_fetch_assoc($result);

echo "<br> id = ". $row['id'] ;
$user_id =  $row['id'];

if(!empty($bookName) && !empty($authorName) && !empty($edition) && !empty($details) ){
    
       $sql = "INSERT INTO post (user_id,book_name, author_name, edition, details ) VALUES ('$user_id','$bookName','$authorName','$edition', '$details')";
      if($conn -> query($sql)){
           //echo "Post information inserted in Database Successfully";
            echo '<script language="javascript">';
            echo 'alert("Post Uploaded.");';
            echo 'window.location = "http://localhost/bookFinder/home.php"';
            echo '</script>';
    }else{
    echo '<script language="javascript">';
    echo 'alert("Can not execute Query");';
    //echo 'window.location = "http://localhost/bookFinder/home.php"';
    echo '</script>';
   }
}
?>