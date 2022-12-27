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
//$img = $_POST["my_image"];

echo $bookName . " " . $authorName . " " . $edition  . " "  . $details . "<br> " ;
echo "cookie value " . $_COOKIE["email"] . "<br> <br>" ;
$temp = $_COOKIE["email"];
//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>'; 

$sql1 = "SELECT id FROM users where email = '".$temp."'";
$result = mysqli_query($conn,$sql1) or die ("Query feild");
$row = mysqli_fetch_assoc($result);

echo "<br> id = ". $row['id'] ;
$user_id =  $row['id'];

// _________________________________________________________________________________
// Image Work
// _________________________________________________________________________________


	$img_name = $_FILES['img']['name'];
	$img_size = $_FILES['img']['size'];
	$tmp_name = $_FILES['img']['tmp_name'];
	$error = $_FILES['img']['error'];

    if ($error === 0) {
		if ($img_size > 600000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
                echo "<br> Image uploaded in the folder";
				// Insert into Database
				// $sql = "INSERT INTO images(image_url) 
				//         VALUES('$new_img_name')";
				// mysqli_query($conn, $sql);
				// header("Location: view.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: index.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		//header("Location: index.php?error=$em");
	}


// _________________________________________________________________________________________
if(!empty($bookName) && !empty($authorName) && !empty($edition) && !empty($details) && !empty($img_name)){
    
       $sql = "INSERT INTO post (user_id,book_name, author_name, edition, details, img_location) VALUES ('$user_id','$bookName','$authorName','$edition', '$details', '$new_img_name')";
      if($conn -> query($sql)){
            echo '<script language="javascript">';
            echo 'alert("Post Uploaded.");';
            echo 'window.location = "http://localhost/bookFinder/home.php"';
            echo '</script>';
    }else{
    echo '<script language="javascript">';
    echo 'alert("Can not execute Query");';
    echo '</script>';
   }
}else{
    echo "Please fill all informationa.";
}
?>