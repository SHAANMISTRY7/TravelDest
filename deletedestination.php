<?php
    session_start();

    if(!$_SESSION['email']) {
        header("Location:login.php");
    }
?>

<?php
    require_once 'config.php';

    $status = 'error';
    $statusMessage = '';

    if(isset($_POST['submit'])) {
        $destination = $_POST['destination'];

        $checkquery = $con -> query("select destination from destinations where destination = '$destination'");

        if($checkquery -> num_rows > 0) {
            $deletequery = $con -> query("delete from destinations where destination = '$destination'");
            if($deletequery) {
                $status = 'success';
                $statusMessage = 'Successfully deleted ' . $destination;
            }
        } else {
            $statusMessage = $destination . " doesn't exist.";
        }

        if($status == 'success') { ?>
            <div class="success"><?php echo $statusMessage ?></div>
            <script>
                const success = document.querySelector('.success');
                setTimeout(() => success.style.display = 'none', 3000);
            </script>
        <?php } else {?>
            <div class="error"><?php echo $statusMessage ?></div>
            <script>
                const error = document.querySelector('.error');
                setTimeout(() => error.style.display = 'none', 3000);
            </script>
        <?php }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelDest | Add Country</title>
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

        .logout-button a {
            margin-right: 20px;
        }

        .logout-button a i {
            padding-right: 10px;
        }

        .logout-button a:hover {
            background-color: white;
            color: #03a9f4;
            cursor: pointer;
        }

        a i {
            padding-left: 10px;
        }

        form {
            box-shadow: 0px 0px 20px #03a9f4;
            border-radius: 10px;
            width: 50%;
            margin: auto;
            margin-top: 150px;
            padding: 50px;
        }

        form h4 {
            font-size: 25px;
            text-align: center;
            margin: 20px 0;
        }

        form label {
            font-size: 20px;
        }

        form input {
            margin: 20px 0;
            border: none;
            font-size: 20px;
            width: 65%;
        }

        form input:focus {
            outline: none;
        }

        form input[type="text"] {
            margin-left: 20px;
        }

        form input[type="text"] {
            border-bottom: 1px solid black;
            padding-bottom: 5px;
        }

        form input[type="submit"] {
            background-color: #03a9f4;
            color: white;
            padding: 8px 25px;
            transition: 0.4s all;
            cursor: pointer;
            border-radius: 5px;
            width: auto;
        }

        form input[type="submit"]:hover {
            transform: scale(0.9);
        }

        .success, .error {
            margin: auto;
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding: 15px 0;
            color: white;
            transition: 0.4s all;
        }

        .success {
            background-color: #5cb85c;
        }

        .error {
            background-color: #d9534f;
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

            .logout-button a{
                margin: 0;
                padding: 5px 15px;
                margin: 10px 0px;
            }

            .logout-button a {
                margin-right: 10px;
            }

            form {
                margin: auto;
                margin-top: 90px;
                width: 90%;
                padding: 50px;
            }

            form h4 {
                font-size: 25px;
                margin-bottom: 50px;
            }

            form label {
                font-size: 15px;
            }

            form input {
                margin: 0;
            }

            form input[type="text"] {
                margin-top: 10px;
                margin-bottom: 50px;
            }

            form input[type="text"]:after {
                background-color: white;
            }

            form input[type="text"] {
                margin-left: 0px;
            }

            form input[type="submit"] {
                font-weight: bold;
            }

            .success, .error {
                width: 90%;
            }

        }
    </style>
</head>
<body>
    <header>
        <div class="title"><h1>TravelDest Administrator Dashboard</h1></div>
        <div class="logout-button">
            <a href="dashboard.php">
                <i class="fa fa-bars" aria-hidden="true"></i>
                <span>Dashboard</span>
            </a>
            <a id="logout" href="logout.php">Logout<i class="fa fa-sign-out-alt" aria-hidden="true"></i></a>
        </div>
    </header>

    <form action="" method="POST" autocomplete="off">
        <h4>Delete Destination</h4>
        <label>Destination Name</label>
        <input type="text" name="destination" required pattern="^[a-zA-Z]+[a-zA-Z- ]*" title="Field can't be empty">
        <input type="submit" value="DELETE" name="submit">
    </form>
</body>
</html>