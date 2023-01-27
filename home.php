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
    <style>
        @media (min-width: 768px) {
            .col-md-3 {
                width: 42%;
            }
        }
    </style>
</head>

<body>
    <!-- Main Body  -->
    <div class="container py-5 " style="margin-top: 7px; width:90%;margin:auto">
        <div class="row mt-4" style="display: flex;justify-content: center;flex-wrap:wrap;">

            <?php
            // Create a database Connection
            $conn = new mysqli('localhost', 'root', '', 'bookFinder');
            if (!$conn) {
                echo "Can not connect to Database.";
            }
            // for the 
            // This is query part for all post data 
            $query = "SELECT * FROM `post` WHERE `archive` =0
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
                    <div class="col-md-3" style="max-width:300px; margin-top: 25px;margin-left: 10px;margin-bottom:20px">
                        <div class="card mt-5" style="background: #eee5fdb3;box-shadow: 2px 3px 6px #e6d7ff;
                        margin-left: 10px;">
                            <div class="card-body">
                                <div class="image-container" style="display: flex;justify-content: center;height:250px;padding:10px;">
                                    <img style="width: 100%;" src="./backend/uploads/<?php echo $row['img_location'] ?>" class="card-img-top" alt="">
                                </div>
                                <div class="cardContext" style="padding: 7px;">
                                <div class="owner" style="height: 50px;">
                                <h3 style="font-size: 22px;">Owner : <a href=""> <?php echo $row1['roll']; ?></a></h3>
                                </div>
                                <div class="bookName" style="width: 270px; display:flex; flex-wrap:wrap;">
                                <h4>Book name : <?php echo $row['book_name'] ?> </h4>
                                </div>
                                <div class="bookInfo" style="height: 60px;">
                                <h4>Author: <?php echo $row['author_name'] ?> </h4>
                                <h4>Edition : <?php echo $row['edition'] ?></h4>
                                </div>
                                <div class="detailsInfo" style="padding: 7px; height: 30px;">
                                <p class="card-text"><?php echo $row['details'] . "<br>";?></p>
                                </div>
                                </div>
                                <div style="padding:10px">
                                    <!-- <?php echo $row['post_id']; ?> -->
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