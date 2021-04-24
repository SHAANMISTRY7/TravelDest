<?php
    session_start();

    if(!$_SESSION['email']) {
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator | Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Montserrat&family=Source+Serif+Pro:wght@600&display=swap" rel="stylesheet">
    <style>
        * {
           box-sizing: border-box;
           margin: 0;
           padding: 0;
           font-family: 'Montserrat', sans-serif;
        }

        header {
           display: flex;
           align-items: center;
           justify-content: space-between;
           background-color: #03a9f4;
           height: 70px;
           box-shadow: 0px 4px 10px gray;
        }

        .title {
           font-size: 15px;
           color: white;
           font-weight: bold;
           margin-left: 140px;
           word-spacing: 10px;
           letter-spacing: 2px;
        }

        .logout-button {
           margin-right: 140px;
        }

        .logout-button a {
            text-decoration: none;
            padding: 10px 30px;
            font-size: 15px;
            background-color: white;
            border: none;
            border: 2px solid white;
            background-color: #03a9f4;
            color: white;
            font-weight: bold;
            transition: 0.4s all;
            border-radius: 5px;
        }

        .logout-button a:hover {
            background-color: white;
            color: #03a9f4;
            cursor: pointer;
        }

        a i {
            padding-left: 10px;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            flex-wrap: wrap;
            margin-top: 200px;
        }

        .container a {
            background-color: #03a9f4;
            width: 200px;
            height: 200px;
            text-align: center;
            color: white;
            border-radius: 10px;
            transition: 0.4s all;
            text-decoration: none;
        }

        .container a i {
            font-size: 2em;
            padding-top: 70px;
            margin-bottom: 10px;
            transition: 0.4s all;
        }

        .container a:hover, .container a:hover i {
            transform: translateY(-10px);
        }

        @media(max-width: 500px) {
            header {
                flex-direction: column;
                justify-content: center;
                height: 150px;
            }

            .title {
                font-size: 10px;
                margin: 0;
                margin-top: 15px;
            }

            .logout-button {
                margin: 0;
                margin-top: 20px;
            }

            .logout-button button{
                margin: 0;
                padding: 5px 15px;
                margin: 10px 0px;
            }

            .container {
                margin-top: 80px;
            }

            .container a {
                margin-bottom: 50px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="title"><h1>TravelDest Administrator Dashboard</h1></div>
        <div class="logout-button">
            <a href="logout.php" id="logout">Logout<i class="fa fa-sign-out-alt" aria-hidden="true"></i></a>
        </div>
    </header>

    <div class="container">
       <a href="addcountry.php">
           <i class="fa fa-plus-circle" aria-hidden="true"></i>
           <br>
           Add country
       </a>
       <a href="deletecountry.php">
           <i class="fa fa-minus-circle" aria-hidden="true"></i>
           <br>
           Remove country
       </a>
       <a href="adddestination.php">
           <i class="fa fa-plus-circle" aria-hidden="true"></i>
           <br>
           Add destination
       </a>
       <a href="deletedestination.php">
           <i class="fa fa-minus-circle" aria-hidden="true"></i>
           <br>
           Remove destination
       </a>
    </div>
</body>
</html>