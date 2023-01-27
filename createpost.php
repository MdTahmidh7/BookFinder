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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .container{
            width: 50%;
            font-size: 20px;
            box-shadow: 5px 5px 8px grey;
            background-color: gainsboro;
            border-radius: 5px;
        }
        .header{
            margin-top: 10px;
            margin-bottom: 50px;
            text-align: center;
            font-size: 25px;
        }
    </style>
</head>
<body>
    <div class="header">
        Create post
    </div>
<div class="container">
    <form class="row g-3" action="./backend/createpost.php" method="post" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label" >Book Name</label>
    <input class="form-control" type="text" name="bookName" required style="height: 30px;font-size: 16px;"><br>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label" >Author Name</label>
      <input class="form-control" type="text" name="authorName" required style="height: 30px;font-size: 16px;"><br>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label" >Edition</label>
    <input class="form-control" type="text" name="edition" required style="height: 30px;font-size: 16px;">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Details</label>
    <textarea class="form-control" name="details" id="" cols="32" rows="5" style="margin-top:10px; padding:5px; border-radius: 5px;
                            font-size:16px;" required></textarea>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Image</label>
    <input class="form-control" type="file" name="img" required>
  </div>
 
  <div class="col-12">
  <button type="submit" name="submit" value="upload" style="width: 70px;font-size: 16px; margin-top:10px;padding:7px; border-radius:7px;cursor:pointer;"> Submit</button>
  </div>
</form>
</div>
</body>
</html>