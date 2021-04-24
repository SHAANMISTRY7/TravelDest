<?php
    require_once 'config.php';

    session_start();

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $chechquery = $con -> query("select * from admin where email = '$email' and password = '$password'");

        if($chechquery -> num_rows > 0) {
            $_SESSION['email'] = $email;
        } else {?>
            <div class="login-error">Invalid Credentials</div>
            <script>
                const loginError = document.querySelector('.login-error');

                setTimeout(() => loginError.style.display = 'none', 3000);
            </script>
        <?php }
    }

    if(isset($_SESSION['email'])) {
        header("Location:dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Montserrat&family=Source+Serif+Pro:wght@600&display=swap" rel="stylesheet">
    <title>TravelDest | Login</title>
    <style>
        .login-error {
            background-color: #d9534f;
            color: white;
            text-align: center;
            padding: 10px 0;
            transition: 0.4s ease-in-out;
        }

        * {
            font-family: 'Montserrat', sans-serif;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            height: 100vh;
        }
        
        header {
            font-family: 'Dancing Script', cursive;
            font-size: 3em;
            background-color: #03a9f4;
            color: white;
            padding: 10px 0;
            text-align: center;
            box-shadow: 0px 4px 10px gray;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }

        .left, .right {
            margin: 25% 0;
            padding: 0 200px;
        }

        .left {
            border-right: 2px solid #03a9f4;
        }

        .right {
            padding-top: 9%;
        }

        h3 {
            text-align: center;
            font-weight: bolder;
            letter-spacing: 1px;
            word-spacing: 2px;
        }

        fieldset {
            margin: 20px 0;
            border-radius: 30px;
            height: 70px;
            border-color: #03a9f4;
        }

        legend {
            margin-left: 30px;
        }

        input {
            border: none;
            margin: 10px 30px;
            padding: 0px 0;
            width: 80%;
            font-size: 15px;
        }

        input:focus {
            outline: none;
        }

        .button {
            background-color: white;
            color: #03a9f4;
            text-decoration: none;
            border-radius: 30px;
            width: auto;
            padding: 10px 20px;
            font-weight: bold;
            display: block;
            margin: auto;
            cursor: pointer;
            transition: 0.4s ease-in-out;
            letter-spacing: 2px;
            border: 2px solid #03a9f4;
        }

        .button:hover {
            color: white;
            background-color: #03a9f4;
        }

        a.button {
            margin-top: 20px;
            width: 40%;
            text-align: center;
        }

        .email-error, .password-error {
            color: red;
            display: none;
        }

        @media(max-width: 500px) {
            .grid {
                display: grid;
                grid-template-columns: repeat(1, 1fr);
            }
            .left, .right {
                margin: 0;
                margin-top: 100px;
                padding: 0 40px;
                border: none;
            }
        }
    </style>
</head>
<body>
    <header>TravelDest</header>
    <div class="grid">
        <div class="left">
            <h3>Administrator Login</h3>
            <form action="" method="POST" autocomplete="off" id="form">
                <fieldset class="fieldset1">
                    <legend>Email</legend>
                    <input type="text" name="email" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninvalid="errorEmail(this)">
                </fieldset>
                <fieldset class="fieldset2">
                    <legend>Password</legend>
                    <input type="password" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninvalid="errorPassword(this)">
                </fieldset>
                <input type="submit" value="Login" class="button" name="submit">
            </form>
        </div>
        <div class="right">
            <h3>Visit the site as a guest</h3>
            <a href="index2.html" class="button">Go to site</a>
        </div>
    </div>

    <script>
        const fieldset1 = document.querySelector('.fieldset1');
        const fieldset2 = document.querySelector('.fieldset2')

        function errorEmail(input) {
            if(input.value === '') {
                input.setCustomValidity('Entering email is must...');
                fieldset1.style.borderColor = 'red';
            }
            else if(input.validity.patternMismatch) {
                input.setCustomValidity('Please enter vaild email address');
                fieldset1.style.borderColor = 'red';
            }
            else {
                input.setCustomValidity('');
                fieldset1.style.borderColor = '#03a9f4';
            }
        }

        function errorPassword(input) {
            if(input.value === '') {
                input.setCustomValidity('Entering password is must...');
                fieldset2.style.borderColor = 'red';
            }
            else if(input.validity.patternMismatch) {
                input.setCustomValidity('Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters');
                fieldset2.style.borderColor = 'red';
            }
            else {
                input.setCustomValidity('');
                fieldset2.style.borderColor = '#03a9f4';
            }
        }
    </script>
</body>
</html>