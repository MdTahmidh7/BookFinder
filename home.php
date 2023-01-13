<?php
session_start();
if (empty($_SESSION['login'])) {
    header("Location: http://localhost/bookFinder/login.php");
}
include './nav1.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
   
    <!-- Main Body  -->

    <div class="container py-5">
        <div class="row mt-4">

            <?php
            // Create a database Connection
            $conn = new mysqli('localhost', 'root', '', 'bookFinder');
            if (!$conn) {
                echo "Can not connect to Database.";
            }
            // for the 
            // This is query part for all post data 
            $query = "SELECT * FROM `post`
            order by post_id DESC";
            $run_query = mysqli_query($conn, $query); //Run the query function
            $check_data = mysqli_num_rows($run_query) > 0;

            if ($check_data) {
                while ($row = mysqli_fetch_array($run_query)) {
                    $temp = $row['user_id'];
                    $query2 = "SELECT distinct u.roll 
                    FROM `users` as u 
                    INNER JOIN post as p 
                    ON u.id = p.user_id and u.id = '" . $temp . "'";
                    $run_query1 = mysqli_query($conn, $query2);
                    $row1 = mysqli_fetch_array($run_query1);
            ?>
                    <div class="col-md-3">
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="image-container">
                                    <img style="width: 295px;height: 200px;" src="./backend/uploads/<?php echo $row['img_location'] ?>" class="card-img-top" alt="">
                                </div>
                                <!-- <h2 class="card-title">Title Here </h2> -->
                                <h2>
                                    Owner : <a href=""> <?php echo $row1['roll']; ?></a>
                                </h2>
                                <h4>Book name : <?php echo $row['book_name'] ?> </h4>
                                <h4>Author: <?php echo $row['author_name'] ?> </h4>
                                <h3>Edition : <?php echo $row['edition'] ?></h3>
                                <p class="card-text">
                                    <?php echo $row['details'] . "<br>";
                                    echo $row['img_location'];
                                    ?>
                                </p>
                                <div>
                                   <!-- <?php  echo $row['post_id'];?> -->
                                    <form action="./backend/button.php" method="post">
                                        <?php 
                                        $x = $row['post_id'];
                                        echo "<button style='width:80px;height:30px;font-size:16px;' type='submit' name='btn1' value='$x'>Request</button>"
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No data found";
            }
            ?>

        </div>

    </div>
</body>

</html>