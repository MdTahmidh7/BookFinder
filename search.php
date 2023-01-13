<?php
    session_start();
    if (empty($_SESSION['login'])) {
        header("Location: http://localhost/bookFinder/login.php");
    }
    include './nav1.php';


	$servername = "localhost";
    $username = "root";
    // Create connection
    $conn = new mysqli($servername, $username,"","bookFinder");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Search results</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
    <style>
        .row1 {
            /* background: rgb(239, 107, 107); */
            /* padding: 30px; */
            height: 400px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .col1 {
            margin-left: 15px;
            padding: 3px;
            width: 270px;
            height: 450px;
            border-radius: 5px;
            border: 5px solid rgb(171, 224, 230);
            margin-bottom: 20px;
            box-shadow: 3px 4px 6px grey;
        }
        
        .image {
            background: rgb(247, 247, 166);
            width: 100%;
            height: 200px;
            overflow: hidden;
            display: flex;
            justify-content: center;
        }
        
        .image img {
            width: 320px;
            /* height: 50%; */
        }
        
        h4,
        h3,
        h5,
        p {
            margin: 0px;
        }
        
        .cardBody {
            display: flex;
            height: 100px;
            text-align: justify;
            margin: 3px;
            flex-wrap: wrap;
            overflow: hidden;
        }
        
        .footer {
            margin-top: 8px;
        }
    </style>
</head>
<body>

<div class="row" style="height: 400px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;">    
<?php
	$query = $_GET['query']; 	
	$min_length = 3;	
    if(empty($query)){
        echo '<script language="javascript">';
        echo 'alert("Can not be empty!!");';
        echo 'window.location = "http://localhost/bookFinder/home.php"';
        echo '</script>';
    }else{
        $query = htmlspecialchars($query); 
        $sql = "SELECT * FROM post WHERE (`book_name` LIKE '%".$query."%') OR (`author_name` LIKE '%".$query."%')";
        $result = $conn->query($sql);
        $query = $conn -> query($sql);
        if($query-> num_rows > 0){
            while($row = $result->fetch_assoc()){ 
                $temp = $row['user_id'];
                $query = "SELECT distinct u.roll 
                FROM `users` as u 
                INNER JOIN post as p 
                ON u.id = p.user_id and u.id = '" . $temp . "'";
                $run_query = mysqli_query($conn, $query);
                $ownerRoll = mysqli_fetch_array($run_query);
                ?>
                <div class="col1">
                <div  iv class="card">
                    <div class="image">
                        <img class="card-img-top" src="../BookFinder/backend/uploads/<?php echo $row['img_location'] ?>" alt="no image found">
                    </div>
                    <div class="owner">
                        <h3 class="card-title">Owner : <?php echo $ownerRoll['roll']; ?></h3>
                    </div>
                    <div class="bookInfo">
                        <h5>Book name: <?php echo $row['book_name'] ?></h5>
                        <h5>Writter : <?php echo $row['author_name'] ?></h5>
                        <h5>Edition : <?php echo $row['edition'] ?></h5>
                    </div>
                    <b class="card-text">Description</b>
                    <div class="cardBody">
                        <p>
                            <?php echo $row['details'] . "<br>";
                                            echo $row['img_location'];
                                ?>
                        </p>
                    </div>
                    <div class="footer">
                        <form action="./backend/button.php" method="post">
                                    <?php 
                                        $x = $row['post_id'];
                                        echo "<button style='width:80px;height:30px;font-size:16px;' type='submit' name='btn1' value='$x'>Request</button>"
                                    ?>
                            </form>
                    </div>
                </div>
            </div>    
           <?php }
        }
    }
?>
     </div>
</body>
</html>