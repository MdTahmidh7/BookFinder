<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="background: antiquewhite;
    height:200px;
    padding: 10px;
    width: 300px;
    margin: auto;
    border-radius: 10px;
    box-shadow: 3px 5px 7px grey;
    position: absolute;
    top: 33%;
    left: 40%;" class="div">
        <h1>Step 2/3</h1>
        <form action="./backend/matchOtp.php" method="post">
            <div class="div">
                <label for="" style="position: absolute;
    margin-top: 38px;">Enter your OTP </label>
                <input type="text" name="userOtp" style="position: absolute;
    margin-top: 64px;">
                <button style="position: absolute;
    margin-top: 64px; margin-left: 187px;">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>