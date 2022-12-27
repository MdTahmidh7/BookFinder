<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0px;
            font-family: "segoe ui";
            color: black;
        }

        .nav {
            height: 60px;
            width: 100%;
            background-color: #4d4d4d;
            position: relative;
            padding-left: 40px;
            padding-right: 40px;
        }

        .nav>.nav-header {
            display: inline;
        }

        .nav>.nav-header>.nav-title {
            display: inline-block;
            font-size: 22px;
            color: #fff;
            padding: 10px 10px 10px 10px;
        }

        .nav>.nav-btn {
            display: none;
        }

        .nav>.nav-links {
            display: inline;
            float: right;
            font-size: 18px;
        }

        .nav>.nav-links>a {
            display: inline-block;
            padding: 13px 10px 13px 10px;
            text-decoration: none;
            color: #efefef;
        }

        .nav>.nav-links>a:hover {
            background-color: rgba(0, 0, 0, 0.3);
        }

        .nav>#nav-check {
            display: none;
        }

        @media (max-width: 600px) {
            .nav>.nav-btn {
                display: inline-block;
                position: absolute;
                right: 0px;
                top: 0px;
            }

            .nav>.nav-btn>label {
                display: inline-block;
                width: 50px;
                height: 50px;
                padding: 13px;
            }

            .nav>.nav-btn>label:hover,
            .nav #nav-check:checked~.nav-btn>label {
                background-color: rgba(0, 0, 0, 0.3);
            }

            .nav>.nav-btn>label>span {
                display: block;
                width: 25px;
                height: 10px;
                border-top: 2px solid #eee;
            }

            .nav>.nav-links {
                position: absolute;
                display: block;
                width: 100%;
                background-color: #333;
                height: 0px;
                transition: all 0.3s ease-in;
                overflow-y: hidden;
                top: 50px;
                left: 0px;
            }

            .nav>.nav-links>a {
                display: block;
                width: 100%;
            }

            .nav>#nav-check:not(:checked)~.nav-links {
                height: 0px;
            }

            .nav>#nav-check:checked~.nav-links {
                height: calc(100vh - 50px);
                overflow-y: auto;
            }
        }



        /* Modal styling */
        /* __________________________________________________*/
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 62.5%;
        }

        body {
            /* --light: hsl(220, 50%, 90%); */
            /* --primary: hsl(255, 30%, 55%); */
            /* --focus: hsl(210, 90%, 50%); */
            /* --global-background: hsl(220, 3%, 39%); */
            /* --background: linear-gradient(to right, hsl(210, 30%, 20%), hsl(255, 30%, 25%));
            --shadow-1: hsla(236, 50%, 50%, .3);
            --shadow-2: hsla(236, 50%, 50%, .4); */
            /* font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Open Sans', sans-serif; */
            /* color: var(--light); */
            /* background: var(--global-background); */
        }

        a,
        a:link {
            font-family: inherit;
            text-decoration: none;
        }

        a:focus {
            outline: none;
        }

        button::-moz-focus-inner {
            border: 0;
        }

        /* box */

        .box {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 0 4rem 2rem;
        }

        .box:not(:first-child) {
            height: 45rem;
        }

        .box__title {
            /* font-size: 10rem; */
            font-weight: normal;
            letter-spacing: .8rem;
            margin-bottom: 2.6rem;
        }

        .box__title::first-letter {
            color: var(--primary);
        }

        .box__p,
        .box__info,
        .box__note {
            /* font-size: 1.6rem; */
        }

        .box__info {
            margin-top: 6rem;
        }

        .box__note {
            line-height: 2;
        }

        /* modal */

        .modal-container {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
            display: none;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            /* --m-background is set as inline style */
            background: var(--m-background);
        }

        .modal-container:target {
            display: flex;
        }

        .modal {

            /* width: 60rem; */
            width: 700px;
            padding: 4rem 2rem;
            border-radius: .8rem;
            color: var(--light);
            background: var(--background);
            box-shadow: var(--m-shadow, .4rem .4rem 10.2rem .2rem) var(--shadow-1);
            position: relative;
            overflow: hidden;
        }

        .modal__title {
            /* font-size: 3.2rem; */
        }

        .modal__text {
            padding: 0 4rem;
            margin-top: 4rem;
            font-size: 1.6rem;
            line-height: 2;
        }


        .modal__btn1 {
            margin-right: 1rem;
            padding: 10px;
            border-radius: 10px;
            width: 80px;
        }

        .modal__btn2 {
            margin-right: 1rem;
            padding: 10px;
            border-radius: 10px;
            width: 80px;
        }

        .modal__btn1:hover {
            background-color: #cf0431;
            color: white;
            transform: translateY(-.2rem);
        }

        .modal__btn2:hover {
            background-color: #039e22;
            color: white;
            transform: translateY(-.2rem);
        }




        .link-1:hover,
        .link-1:focus {
            transform: translateY(-.2rem);
            box-shadow: 0 0 4.4rem .2rem var(--shadow-2);
        }

        .link-1:focus {
            box-shadow: 0 0 4.4rem .2rem var(--shadow-2), 0 0 0 .4rem var(--global-background), 0 0 0 .5rem var(--focus);
        }

        .link-2 {
            width: 4rem;
            height: 4rem;
            border: 1px solid var(--border-color);
            border-radius: 100rem;
            color: inherit;
            /* font-size: 2.2rem; */
            position: absolute;
            top: 2rem;
            right: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: .2s;
        }

        .link-2::before {
            content: '×';
            transform: translateY(-.1rem);
        }

        .link-2:hover,
        .link-2:focus {
            background: var(--focus);
            border-color: var(--focus);
            transform: translateY(-.2rem);
        }

        .abs-site-link {
            position: fixed;
            bottom: 20px;
            left: 20px;
            color: hsla(0, 0%, 1000%, .6);
            /* font-size: 1.6rem; */
        }

        .modal-body {
            display: flex;
            justify-content: center;

        }

        .modal-body .left {
            padding: 10px;
        }

        .modal-body .left p {
            margin-top: 15px;
            /* font-size: 20px; */
            width: 200px;
        }

        .modal-body .right {
            padding: 10px;
        }

        .modal-body .right input {
            margin-top: 10px;
            /* font-size: 20px; */
            border-radius: 9px;
            height: 35px;
            padding-left: 4px;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
        }
    </style>
</head>
<body>
<div class="nav">
        <div class="nav-header">
            <div class="nav-title">
                Book Finder
            </div>
        </div>
        <form class="d-flex">
        <input style="height: 30px;
    margin-top: 15px;" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button style="height: 30px;
    margin-top: 15px;" class="btn btn-outline-success" type="submit">Search</button>
      </form>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>

        <div class="nav-links">
            <a href="./home.php">Home</a>
            <a href="./profile.php">Profile</a>
            <a href="./createpost.php">Creat Post</a>
            <a href="./logout.php">Log Out</a>
            <a href="">
                <?php
                $conn = new mysqli('localhost', 'root', '', 'bookFinder');
                if (!$conn) {
                    echo "Can not connect to Database.";
                }
                // Fetching Profile name form the database
                $temp = $_COOKIE["email"];
                $sql1 = "SELECT roll FROM users where email = '" . $temp . "'";
                $result = mysqli_query($conn, $sql1) or die("Query feild");
                $row = mysqli_fetch_assoc($result);
                echo  $row['roll'];
                
                ?>
            </a>
            <a href="./receivedRequest.php">Received Request</a>
            <a href="./sentRequest.php">Sent Request</a>
        </div>
    </div>
</body>
</html>