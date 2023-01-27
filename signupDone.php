<?php
session_start();
// if (empty($_SESSION['login'])) {
//     header("Location: http://localhost/bookFinder/login.php");
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp SuccessFull</title>
    <style>
        body{
            background-image: url('./book.jpg');
        }
        .div{
            position: absolute;
            background: #c6c8bc;
            opacity: .95;
            width: 54%;
            margin: auto;
            padding: 10px;
            text-align: center;
            border-radius: 10px;
            top: 33%;
            left: 23%;
        }
        .div h4 a{
            font-size: 23px;
        }
        .div h3 b{
            font-size: 25px;
            color: #14811b;
        }
    </style>
</head>
<body>
    <div class="div">
        <h1>Welcome to BookFinder.</h1>
        <h3>Congratullation!!! Your sign up is <b>Successfull.</b></h3>
        <h4>Now you can <a href="./login.php">Login</a></h4>
    </div>
</body>
</html>