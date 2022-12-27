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
    <title>Received Request</title>
</head>
<body>
<h1 style="text-align:center;">Received Request</h1>
<?php
$conn = new mysqli('localhost', 'root', '', 'bookFinder');
if (!$conn) {
    echo "Can not connect to Database.";
}
// Fetching Profile name form the database
$temp = $_COOKIE["email"];
$sql1 = "SELECT id FROM users where email = '" . $temp . "'";
$result = mysqli_query($conn, $sql1) or die("Query feild");
$row = mysqli_fetch_assoc($result);
$user_id =  $row['id'];


?>

<div class="container" style="display:flex;flex-wrap:wrap;">
        <?php
            // Create a database Connection
            $conn = new mysqli('localhost', 'root', '', 'bookFinder');
            if (!$conn) {
                echo "Can not connect to Database.";
            }
            $query = "SELECT * FROM `request` WHERE request_to = '".$user_id."'";
            $run_query = mysqli_query($conn, $query); //Run the query function
            $check_data = mysqli_num_rows($run_query) > 0;

            if ($check_data) {
                while ($row = mysqli_fetch_array($run_query)) {

        ?>
        <div class="col-md-3 px-2" >
            <div class="card mt-5">
                <div class="card-body">
                    <h2></h2>
                    <h4>Request from : <?php echo $row['request_from'] ?> </h4>
                            <?php
                            $temp = $row['post_id'];
                            $conn = new mysqli('localhost', 'root', '', 'bookFinder');

                            $sql1 = "SELECT book_name FROM `post` WHERE post_id = '".$temp."'";
                            $result1 = mysqli_query($conn,$sql1) or die ("Query feild");
                            $row1 = mysqli_fetch_assoc($result1);
                            echo "<br> Post_id = ". $row1['book_name'] ;
                            ?>
                            <h3>Request for :  <?php echo $row1['book_name']  ?></h3>
                            <p class="card-text"> Normal Text MSG.</p>
                                <div>
                                    <form action="./backend/button.php" method="post">
                                        <?php 
                                        $x = $row['post_id'];
                                        echo "<button style='width:80px;height:30px;font-size:16px;' type='submit' name='btn1'>Confirm</button>";
                                        echo "<button style='width:80px;height:30px;font-size:16px;margin-left:5px;' type='submit' name='btn1'>Decline</button>"
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