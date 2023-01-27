<?php
  session_start();
  error_reporting(0);
  if (empty($_SESSION['login'])) {
      header("Location: http://localhost/bookFinder/login.php");
  }
 include './nav1.php';

//  echo "pp = " . $_SESSION["to_email"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }
        
        body {
            background-color: #abd9e9;
            font-family: Arial;
        }
        
        #container {
            height: 565px;
            background: #eff3f7;
            margin: 0 auto;
            font-size: 0;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 90px;
            width: 750px;
        }
        
        aside {
            width: 260px;
            height: 600px;
            background-color: #3b3e49;
            display: inline-block;
            font-size: 15px;
            vertical-align: top;
        }
        
        main {
            width: 490px;
            height: 600px;
            display: inline-block;
            font-size: 15px;
            vertical-align: top;
        }
        
        aside header {
            padding: 30px 20px;
        }
        
        aside ul {
            padding-left: 0;
            margin: 0;
            list-style-type: none;
            overflow-y: scroll;
            height: 690px;
        }
        
        aside li {
            padding: 10px 0;
        }
        
        aside li:hover {
            background-color: #5e616a;
        }
        
        h2,
        h3 {
            margin: 0;
        }
        
        aside li div {
            display: inline-block;
            vertical-align: top;
            margin-top: 12px;
        }
        
        aside li h2 {
            font-size: 14px;
            color: #fff;
            font-weight: normal;
            margin-bottom: 5px;
        }
        
        aside li h3 {
            font-size: 12px;
            color: #7e818a;
            font-weight: normal;
        }
        
        .status {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 7px;
        }
        
        .green {
            background-color: #58b666;
        }
        
        .orange {
            background-color: #ff725d;
        }
        
        .blue {
            background-color: #6fbced;
            margin-right: 0;
            margin-left: 7px;
        }
        
        main header {
            height: 30px;
            padding: 30px 20px 30px 40px;
        }
        
        main header>* {
            display: inline-block;
            vertical-align: top;
        }
        
        main header img:first-child {
            border-radius: 50%;
        }
        
        main header img:last-child {
            width: 24px;
            margin-top: 8px;
        }
        
        main header div {
            margin-left: 10px;
            margin-right: 145px;
        }
        
        main header h2 {
            font-size: 16px;
            margin-bottom: 5px;
        }
        
        main header h3 {
            font-size: 14px;
            font-weight: normal;
            color: #7e818a;
        }
        
        #chat {
            padding-left: 0;
            margin: 0;
            list-style-type: none;
            overflow-y: scroll;
            height: 435px;
            border-top: 2px solid #fff;
            border-bottom: 2px solid #fff;
        }
        
        #chat li {
            padding: 10px 30px;
        }
        
        #chat h2,
        #chat h3 {
            display: inline-block;
            font-size: 13px;
            font-weight: normal;
        }
        
        #chat h3 {
            color: #bbb;
        }
        
        #chat .message {
            padding: 8px;
            color: #fff;
            line-height: 22px;
            max-width: 87%;
            display: inline-block;
            text-align: left;
            border-radius: 5px;
        }
        
        #chat .me {
            text-align: right;
        }
        
        #chat .you .message {
            background-color: #58b666;
        }
        
        #chat .me .message {
            background-color: #6fbced;
        }
        
        #chat .triangle {
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 10px 10px 10px;
        }
        
        #chat .you .triangle {
            border-color: transparent transparent #58b666 transparent;
            margin-left: 15px;
        }
        
        #chat .me .triangle {
            border-color: transparent transparent #6fbced transparent;
            margin-left: 385px;
        }
        
        main footer {
            height: 70px;
            /* background-color: #60dd85; */
        }
        
        main footer textarea {
            resize: none;
            border: none;
            display: block;
            width: 100%;
            height: 40px;
            border-radius: 12px;
            padding: 12px;
            font-size: 14px;
            margin-bottom: 8px;
            background-color: #f4ddd9;
        }
        
        main footer textarea::placeholder {
            color: rgb(43, 40, 40);
        }
        
        main footer img {
            height: 30px;
            cursor: pointer;
        }
        
        main footer a {
            text-decoration: none;
            text-transform: uppercase;
            font-weight: bold;
            color: #121212;
            vertical-align: top;
            margin-left: 418px;
            margin-top: -5px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div id="container">
        <aside>
            <ul>
                <?php
               // $sql = "SELECT DISTINCT m_from AS ID FROM message UNION SELECT DISTINCT m_to as ID FROM message";
               $to_email = $_SESSION["to_email"];
               $form_email  = $_COOKIE["email"]; 
               $sss = "SELECT DISTINCT m_to AS ID FROM message 
               where m_from = '".$form_email."'
               UNION 
               SELECT DISTINCT m_from AS ID FROM message 
               where m_to = '".$form_email."'
               ";
               $sql = "SELECT DISTINCT m_from AS ID FROM message UNION SELECT DISTINCT m_to as ID FROM message";
                $result = $conn->query($sss);
                $query = $conn -> query($sss);
                if($query-> num_rows > 0){
                    while($row = $result->fetch_assoc()){?>
                    <li>
                        <div>
                            <form action="./backend/sessionChange.php" method="get">
                            <button style= "width: 242px;
                            height: 55px;
                            background: #747a90;
                            margin-left: 1px;
                            border-radius: 4px;
                            color: #fdf5f5;
                            border: 1px solid;" name="forSessionChange" 
                            value = "<?php echo $row['ID']?>"
                            ><?php echo $row['ID']?></button>
                            </form>
                        </div>
                    </li>
                   <?php }
                }
                ?>
            </ul>
        </aside>
        <main style="overflow:scroll;">
            <header>

                <div>
                    <h2>Messigin to : <?php
                    echo $to_email;
                    ?></h2>
                </div>

            </header>
            <footer>
                <form action="./backend/chat.php" method="get">
                <textarea style="position: absolute; width: 474px;
                margin-top: 22px;" placeholder="Type your message" name="text"></textarea>
                <?php     
                echo "<button style='margin-top: 22px; z-index: 10;position: absolute; margin-left: 388px;
                height:40px;
                border-radius:5px;
                border:1.5px solid green;
                width:70px;'>Send</button>";
                ?>
                <!-- <a href="#">Send</a> -->
                </form>
            </footer>
            <div class="chat-body" style="overflow:scroll;overflow: scroll;background: #9ce5e5;height: 415px;border-radius: 10px;padding: 15px;">
                                            <?php

                                $servername = "localhost";
                                $username = "root";
                                // Create connection
                                $conn = new mysqli($servername, $username,"","bookFinder");
                                // Check connection
                                if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                                }

                                $to_email = $_SESSION["to_email"];
                                $form_email  = $_COOKIE["email"]; 

                                // echo "To mail = " . $to_email;
                                // echo "  From emal = " . $form_email;

                                $sss = "SELECT * FROM `message` WHERE `m_from`= '".$form_email."' and `m_to`='".$to_email."'
                                OR
                                `m_to`= '".$form_email."' and `m_from`='".$to_email."' order by message_id desc";

                                //  $sql = "SELECT * FROM `message` WHERE `m_from`= $form_email  or `m_to`=$to_email";
                                $result = $conn->query($sss);
                                $query = $conn -> query($sss);

                                if($query-> num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                //echo "message = " . $row['message'] . "<br>";
                                if($row['m_from']==$form_email ){    
                                        echo "<li class='me' style='background: #cbfaea;
                                        border-radius: 8px;margin-top: 15px;    margin-right: 100px;'> You"
                                    ."<div class='message' style='
                                    55px;font-size:12px;margin-left: 20px;padding: 7px;'>".$row['message']."</div>"
                                        ."</li>";
                                }
                                else if($row['m_from']==$to_email ){    
                                    echo "<li class='me'style='background: #f4ffe7;
                                    border-radius: 8px;margin-top: 15px;text-align:right; margin-left: 100px;' > Other"
                                ."<div class='message' style='text-align: right;
                                margin-right: 22px;font-size:12px;padding: 7px;'>".$row['message']."</div>"
                                ."</li>";
                                }
                                }
                                }
                                ?> 

            </div>
        </main>
    </div>
</body>
</html>