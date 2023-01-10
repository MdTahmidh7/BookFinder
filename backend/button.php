<?php
echo "Button is clicked";
echo $_POST['btn1'];

$temp = $_POST['btn1'];
echo "Temp = " . $temp;
$conn = new mysqli('localhost', 'root', '', 'bookFinder');

$sql1 = "SELECT * FROM `post` WHERE post_id = '".$temp."'";
$result = mysqli_query($conn,$sql1) or die ("Query feild");
$row = mysqli_fetch_assoc($result);


// echo "<br> Post_id = ". $row['post_id'] ;
// echo "<br> user_id = ". $row['user_id'] ;
// echo "<br> book_name = ". $row['book_name'] ;
// echo "<br> author_name = ". $row['author_name'] ;
// echo "<br> edition = ". $row['edition'] ;
// echo "<br> details = ". $row['details'] ;


$temp = $_COOKIE["email"];
                $sql2 = "SELECT roll FROM users where email = '" . $temp . "'";
                $result = mysqli_query($conn, $sql2) or die("Query feild");
                $row1 = mysqli_fetch_assoc($result);
                echo "<br> Request Form = " . $row1['roll'];



$post_id = $row['post_id'];
$request_form = $row1['roll'];
$request_to = $row['user_id'];
$request_status = 'Pending';

        $sql_checkDuplicate = "SELECT * FROM request 
        WHERE post_id = '".$post_id."' AND request_from='".$request_form."';";
        $run_query = mysqli_query($conn, $sql_checkDuplicate); //Run the query function
        $check_data = mysqli_num_rows($run_query) > 0;
        if($check_data){
                echo '<script language="javascript">';
                echo 'alert("You have already requested for this book.");';
                echo 'window.location = "http://localhost/bookFinder/home.php"';
                echo '</script>';
        }else{
                $sql = "INSERT INTO request (post_id, request_from, request_to, request_status)
                VALUES ('".$post_id."','".$request_form."','".$request_to."', '".$request_status."')";
               if($conn -> query($sql)){
                echo '<script language="javascript">';
                echo 'alert("Request sent successfully.");';
                echo 'window.location = "http://localhost/bookFinder/home.php"';
                echo '</script>';
        }
      
        }



        //Inserting value into request table

        // $sql = "INSERT INTO request (post_id, request_from, request_to, request_status)
        //  VALUES ('".$post_id."','".$request_form."','".$request_to."', '".$request_status."')";
        // if($conn -> query($sql)){
        // echo "Data inserted into database Successfully.";
        
?>