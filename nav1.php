<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0px;
        font-family: "segoe ui";
    }

    .nav {
        display: flex;
        justify-content: space-between;
        height: 50px;
        width: 100%;
        background-color: #4d4d4d;
        position: relative;
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

    @media (max-width: 866px) {
        .nav-links>a>span {
            font-size: 12px;
        }
    }

    @media (max-width: 682px) {
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
</style>

<div class="nav">
    <input type="checkbox" id="nav-check" />
    <div class="nav-header">
        <div class="nav-title">Book Finder</div>
    </div>
    <div class="nav-btn">
        <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
        </label>
    </div>

    <div class="nav-links">
        <a class="nav-link" href="./home.php" title="Home">
            <span><i class="fas fa-home fa-lg"></i></span>
            <span>Home</span>
        </a>
        <a class="nav-link" href="./createpost.php">
            <span><i class="fa-solid fa-plus fa-lg"></i></span>
            <span>Create post</span>
        </a>
        <a class="nav-link" href="./notification.php">
            <span><i class="fa-solid fa-message fa-lg"></i></span>
            <span>Chat</span>
        </a>
        <a class="nav-link" href="./allPost.php">
            <span><i class="fa-solid fa-credit-card fa-lg"></i></span>
            <span>All Post</span>
        </a>
        <a class="nav-link" href="./sentRequest.php">
            <span><i class="fa-solid fa-arrow-up-right-from-square fa-lg"></i></span>
            <span>Sent Request</span>
        </a>
        <a class="nav-link" href="./receivedRequest.php">
            <span><i class="fa-solid fa-right-to-bracket fa-lg"></i></span>
            <span>Receive Request</span>
        </a>
        <a class="nav-link" href="./archivedPost.php">
            <span><i class="fa-solid fa-file-zipper"></i></span>
            <span>Archive</span>
        </a>
       
    </div>

    <div class="last nav-links">
    <a class="nav-link" href="#">
            <span><i class="fa-solid fa-user"></i></span>
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
        <a class="nav-link" href="./logout.php">
            <span><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
            <span>Logout</span>
        </a>
    </div>
</div>