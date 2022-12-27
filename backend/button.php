<?php
echo "Button is clicked";
echo $_POST['btn1'];

$temp = $_POST['btn1'];
echo "Temp = " . $temp;
$conn = new mysqli('localhost', 'root', '', 'bookFinder');
// $query = "SELECT * FROM `post`
// WHERE post_id = '".$temp."'";
// $run_query = mysqli_query($conn, $query); //Run the query function
// $check_data = mysqli_num_rows($run_query) > 0;



$sql1 = "SELECT * FROM `post` WHERE post_id = '".$temp."'";
$result = mysqli_query($conn,$sql1) or die ("Query feild");
$row = mysqli_fetch_assoc($result);

echo "<br> Post_id = ". $row['post_id'] ;
echo "<br> user_id = ". $row['user_id'] ;
echo "<br> book_name = ". $row['book_name'] ;
echo "<br> author_name = ". $row['author_name'] ;
echo "<br> edition = ". $row['edition'] ;
echo "<br> details = ". $row['details'] ;




$temp = $_COOKIE["email"];
                $sql2 = "SELECT roll FROM users where email = '" . $temp . "'";
                $result = mysqli_query($conn, $sql2) or die("Query feild");
                $row1 = mysqli_fetch_assoc($result);
                echo "<br> Request Form = " . $row1['roll'];
?>