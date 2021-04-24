<?php
    session_start();

    if(!$_SESSION['email']) {
        header("Location:login.php");
    }
?>

<?php
    require_once 'config.php';

    $status = $statusMessage = "";

    if(isset($_POST['submit'])) {
        $status = "error";
        if(!empty($_FILES['destinationimage']['name'])) {
        $fileName = basename($_FILES['destinationimage']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if(in_array($fileType, $allowTypes)) {
            $country = $_POST['country'];
            $destination = $_POST['destination'];
            $image = $_FILES['destinationimage']['tmp_name'];
            $about = mysqli_real_escape_string($con, $_POST['about']);
            $visitor = $_POST['visitor'];
            $hotel = $_POST['hotel'];
            $flight = $_POST['flight'];
            $imageContent = addslashes(file_get_contents($image));

            $insertQuery = $con->query("insert into destinations values('$country', '$imageContent', '$destination', '$about', '$visitor', '$hotel', '$flight')");

            if($insertQuery) {
                $status = 'success';
                $statusMessage = 'Data uploaded successfuly';
            } else {
                $statusMessage = "Failed to upload. Try again.";
            }
        } else {
            $statusMessage = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
        } else {
            $statusMessage = 'Please select an image file to upload.';
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
    <title>TravelDest | Add Destinations</title>
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
            width: 60%;
        }

        form .country input {
            width: 45%;
        }

        form input[type="text"] {
            border-bottom: 1px solid #03a9f4;
            padding-bottom: 5px;
        }

        form input:focus {
            outline: none;
        }

        form input[type="file"]::-webkit-file-upload-button {
            background-color: white;
            border: 1px solid #03a9f4;
            font-family: 'Montserrat', sans-serif;
            border-radius: 5px;
            font-size: 20px;
            cursor: pointer;
            margin-left: 20px;
        }

        form textarea {
            min-width: 100%;
            max-width: 100%;
            min-height: 200px;
            padding: 10px;
            border-radius: 5px;
            margin: 20px 0;
            font-size: 15px;
            border-color: #03a9f4;
        }

        form textarea:focus {
            outline: none;
        }

        form div {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        form div input {
            padding: 5px 10px;
            width: 30%;
            border: 1px solid #03a9f4;
            border-radius: 5px;
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
            position: fixed;
            top: 30%;
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
                margin: 90px auto;
                width: 90%;
                padding: 50px;
            }

            form h4 {
                font-size: 25px;
                margin-bottom: 50px;
            }

            form .country input { 
                width: 100%;
            }

            form label {
                font-size: 15px;
            }


            form input[type="text"] {
                margin-top: 10px;
                margin-bottom: 50px;
            }
            
            form input, form input[type="file"]::-webkit-file-upload-button {
                font-size: 15px;
                width: 100%;
                margin-top: 10px;
                margin-bottom: 20px;
            }

            form input[type="file"]::-webkit-file-upload-button {
                margin: 10px 0;
                width: 50%;
                padding: 5px;
            }

            form input[type="submit"] {
                font-weight: bold;
                width: 100%;
            }

            .success, .error {
                width: 90%;
                margin-bottom: 100px;
            }

            form div {
                flex-direction: column;
            }

            form div input{
                width: 100%;
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

    <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
        <h4>Add destinations</h4>
        <div class="country">
            <input type="text" name="country" required pattern="^[A-Z]+[a-zA-Z ]*" title="Start with capital letter" placeholder="Country">
            <input type="text" name="destination" required placeholder="Destination">
        </div>
        <br>
        <label>Destination Image</label>
        <input type="file" accept="image/*" name="destinationimage" required>
        <textarea name="about" id="about" cols="89" rows="10" placeholder="Description of destination"></textarea>
        <br>
        <div class="numbers">
            <input type="number" name="visitor" placeholder="No. of Visitor" id="visitor" min="0">
            <input type="number" name="hotel" placeholder="No. of Hotels" id="hotel" min="0">
            <input type="number" name="flight" placeholder="No. of Flights" id="flight" min="0">
        </div>
        <input type="submit" value="UPLOAD" name="submit">
    </form>
</body>
</html>