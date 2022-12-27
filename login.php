<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Finder</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        font-family: 'Jost', sans-serif;
        /* background: linear-gradient(to bottom, #1e1249, #5b69e2, #24243e); */
        background-image: url('./img/book.jpg');
    }

    .main {
        width: 350px;
        height: 500px;
        background: #10335ced;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 5px 20px 50px #000;
    }

    #chk {
        display: none;
    }

    .signup {
        position: relative;
        width: 100%;
        height: 100%;
    }

    label {
        color: #fff;
        font-size: 2.3em;
        justify-content: center;
        display: flex;
        margin: 60px;
        font-weight: bold;
        cursor: pointer;
        transition: .5s ease-in-out;
    }

    input {
        width: 60%;
        height: 20px;
        background: #e0dede;
        justify-content: center;
        display: flex;
        margin: 20px auto;
        padding: 10px;
        border: none;
        outline: none;
        border-radius: 5px;
    }

    button {
        width: 60%;
        height: 40px;
        margin: 10px auto;
        justify-content: center;
        display: block;
        color: #fff;
        background: #098102;
        font-size: 1em;
        font-weight: bold;
        margin-top: 20px;
        outline: none;
        border: none;
        border-radius: 5px;
        transition: .2s ease-in;
        cursor: pointer;
    }

    button:hover {
        background: #03580e;
    }

    .login {
        height: 460px;
        background: #eee;
        border-radius: 60% / 10%;
        transform: translateY(-180px);
        transition: .8s ease-in-out;
    }

    .login label {
        color: #573b8a;
        transform: scale(.6);
    }

    #chk:checked~.login {
        transform: translateY(-500px);
    }

    #chk:checked~.login label {
        transform: scale(1);
    }

    #chk:checked~.signup label {
        transform: scale(.6);
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">
            <div class="signup">
                <form action="./backend/signup.php" method="post">
                    <!-- <h2 style="text-align:center; color:white;">Book Finder</h2> -->
                    <label style="text-align:center; color:white;" for="chk" aria-hidden="true">Book Finder Sign up</label>
                    <input type="text" name="roll" placeholder="Student ID" required="">
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="pass1" placeholder="Password" required="">
                    <input type="password" name="pass2" placeholder="Password Again" required="">
                    <button name="submit">Sign up</button>
                </form>
            </div>

            <div class="login">
                <form action="./backend/login.php" method="post">
                    <label for="chk" aria-hidden="true">Login</label>
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="pass" placeholder="Password" required="">
                    <button name="submit">Login</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>