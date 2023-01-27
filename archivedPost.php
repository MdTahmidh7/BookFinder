<?php
session_start();
if (empty($_SESSION['login'])) {
    header("Location: http://localhost/bookFinder/login.php");
}

include './nav1.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>All Post</title>
    <style>
        .headerDiv {
            width: 60%;
            margin: auto;
            display: flex;
            justify-content: center;
            padding: 10px;
        }

        .headerDiv .right {
            background: #bdc6c3;
            border-radius: 5px;
            margin-left: 5px;
        }

        .headerDiv .left {
            background: #bdc6c3;
            border-radius: 5px;
            margin-right: 5px;
        }

        /* Create a hover effect on a div */
        .headerDiv .left:hover {
            background-color: #d3c6eb;
            cursor: pointer;
        }

        .headerDiv .right:hover {
            background-color: #d3c6eb;
            cursor: pointer;
        }


        .headerDiv .left,
        .headerDiv .right {
            font-size: 16px;
            font-weight: 600;
            padding: 5px;
        }

        .headerDiv .left a,
        .headerDiv .right a {
            color: black;
        }

        .titleDiv {
            width: 90%;
            margin: auto;
            background: #d3c6eb;
        }

        .titleDiv h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="headerDiv">
        <div class="left">
            <!-- <h1 style="text-align:center;" class="mt-3">All posts</h1> -->
            <a href="./allPost.php" style="text-decoration: none;">All Post</a>
        </div>
        <div class="right">
            <!-- <h1 style="text-align:center;" class="mt-3">Archived posts</h1> -->
            <a href="./archivedPost.php" style="text-decoration: none;">Archived Post</a>
        </div>
    </div>
    <div class="titleDiv">
        <hr>
        <h1 style="font-size: 30px;">Archived Post</h1>
        <hr>
    </div>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'bookFinder');
    if (!$conn) {
        echo "Can not connect to Database.";
    }
    //Fetching User_id name form the database
    $temp = $_COOKIE["email"];
    $sql1 = "SELECT id FROM users where email = '" . $temp . "'";
    $result = mysqli_query($conn, $sql1) or die("Query feild");
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
    // echo "user id is = " . $user_id;
    ?>
    <div class="container" style="display:flex;flex-wrap:wrap;">
        <?php
        // Create a database Connection
        $conn = new mysqli('localhost', 'root', '', 'bookFinder');
        if (!$conn) {
            echo "Can not connect to Database.";
        }

        // $query = "SELECT * FROM `post` WHERE user_id = '" . $user_id . "'";
        $query = "SELECT * FROM `post` WHERE `user_id` = '" . $user_id . "' AND `archive`=1";
        $run_query = mysqli_query($conn, $query);
        $check_data = mysqli_num_rows($run_query) > 0;

        if ($check_data) {
            while ($row = mysqli_fetch_array($run_query)) {

        ?>
                <div class="col-md-3 px-2">
                    <div class="card mt-5">
                        <div class="card-body" style="background: gainsboro;box-shadow: 5px 5px 8px darkgrey;">

                            <?php
                            $temp = $row['post_id'];
                            //  $status = $row['request_status'];

                            $conn = new mysqli('localhost', 'root', '', 'bookFinder');

                            $sql1 = "SELECT book_name FROM `post` WHERE post_id = '" . $temp . "'";
                            $result1 = mysqli_query($conn, $sql1) or die("Query feild");
                            $row1 = mysqli_fetch_assoc($result1);
                            $book_name = $row1['book_name'];


                            $sql2 = "SELECT * from request";
                            $result2 = mysqli_query($conn, $sql2) or die("Query feild");
                            $row2 = mysqli_fetch_assoc($result2);
                            $request_status = $row2['request_status'];


                            $sql3 = "SELECT u.roll FROM `users` as u 
                            INNER JOIN post as p 
                            where p.user_id = u.id and p.book_name = '" . $book_name . "'";
                            $result3 = mysqli_query($conn, $sql3) or die("Query feild");
                            $row3 = mysqli_fetch_assoc($result3);


                            $sql4 = "SELECT u.email FROM `users` as u 
                            INNER JOIN post as p 
                            where p.user_id = u.id and p.book_name = '" . $book_name . "'";
                            $result4 = mysqli_query($conn, $sql4) or die("Query feild");
                            $row4 = mysqli_fetch_assoc($result4);
                            // echo "<h2>Request to  : ". $row3['roll'] ."</h2>" ;

                            ?>
                            <!-- <h4>Request for :  <?php echo $row1['book_name']  ?></h4> -->
                            <!-- <h4>Request status <?php echo  $row['request_status'] ?></h4> -->
                            <b>
                                <h3 style="font-size: 19px;">Book Name : <?php echo  $row['book_name'] ?></h3>
                            </b>
                            <h4 style="font-size: 16px;">Author Name: <?php echo  $row['author_name'] ?></h4>
                            <h4>Edition : <?php echo  $row['edition'] ?></h4>
                            <h4>Archive : <?php echo  $row['archive'] ?></h4>
                            <!-- <h5>post Id: <?php echo  $row['post_id'] ?></h5> -->

                            <div class="buttion-div" style="display:flex;justify-content:space-between;
                                padding:5px;">
                                <div>
                                    <form action="./backend/delatePost.php" method="post">
                                        <?php
                                        $x = $row['post_id'];
                                        echo "<button style= 'width: 80px;
                                        font-size: 16px;
                                        font-weight: 500'
                                        onclick = 'myFunction()'
                                        name='btn1' value = '$x'>Delete</button>"
                                        ?>
                                    </form>
                                </div>
                                <div>
                                    <form action="./backend/restorePost.php" method="post">
                                        <?php
                                        $x = $row['post_id'];
                                        echo "<button style= 'width: 80px;
                                        font-size: 16px;
                                        font-weight: 500'
                                        onclick = 'myFunction()'
                                        name='btn1' value = '$x'>Restore</button>"
                                        ?>
                                    </form>
                                </div>
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