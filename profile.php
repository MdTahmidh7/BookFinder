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
    <title>Document</title>
    <style>
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>This page is Under Construction</h1>
</body>
</html>