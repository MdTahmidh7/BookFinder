<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'bookFinder');
//echo "Temp mail = ". $_SESSION['temp_email'];
$sql_otp = "SELECT otp FROM users where email = '" . $_SESSION['temp_email'] . "'";
$result = mysqli_query($conn, $sql_otp) or die("Query feild");
$row = mysqli_fetch_assoc($result);
//   echo "Otp form database = ". $row['otp'];

$userOtp = $_POST['userOtp'];
if (empty($userOtp)) {
    echo '<script language="javascript">';
    echo 'alert("OTP can not be empty!!");';
    echo 'window.location = "http://localhost/bookFinder/enterOtp.php"';
    echo '</script>';
}

// echo "User otp = " . $userOtp;
if ($userOtp == $row['otp']) { ?>
    <div class="div" style="background: antiquewhite;
    height: 200px;
    padding: 10px;
    width: 400px;
    margin: auto;
    border-radius: 10px;
    box-shadow: 3px 5px 7px grey;
    position: absolute;
    top: 33%;
    left: 40%;
    justify-content: space-around;
    align-items: center;">
        <h1>Step 3/3</h1>
        <form action="./resetPass.php" method="post">
            <div class="div" style="height: 33px;">
                <label for="">Enter new Password</label>
                <input type="password" name="newPass1">
            </div>
            <div class="div">
                <label for="">Confirm Password</label>
                <input type="password" name="newPass2">
            </div>
            <div class="buttion" style="margin-top: 12px;">
                <button>submit</button>
            </div>
        </form>
    </div>

<?php
} else {
    echo "Otp does not match";
}

?>