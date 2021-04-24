<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Montserrat&family=Source+Serif+Pro:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles/homepage.css">
    <style>
        .navbar h1 {
            margin-right: 9em;
        }
    </style>
    <title>TravelDest | Switzerland</title>
</head>
<body>
    <div class="navbar">
        <a href="index.html"><h1 class="title">TravelDest</h1></a>
        <nav>
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="hotel.html">Hotels</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </div>

    <section class="jumbotrone">
        <p style="font-style: normal;">Destinations in Switzerland</p>
    </section>

    <section class="destinations container">
        <div class="countries">
        <?php
                require_once 'config.php';
                $viewQuery = $con -> query("select * from destinations where country = 'Switzerland'");

                if($viewQuery && $viewQuery -> num_rows > 0) {
                while($row = $viewQuery -> fetch_assoc()) {
            ?>
            <div class="places">
                <a href="#"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['destinationImage']); ?>" alt=""></a>
                <h4><?php echo $row['destination'] ?></h4>
                <p><b>About</b> - <?php echo $row['about']?></p>
                <div>
                    <b>Visitors</b> - <?php echo $row['visitors']?>
                </div>
                <div>
                    <abbr title="Hotels"><i class="fa fa-bed"></i></abbr>
                    <span> - <?php echo $row['hotels'] ?></span>
                </div>
                <div>
                    <abbr title="Filghts"><i class="fa fa-plane" aria-hidden="true"></i></abbr></i>
                    <span> - <?php echo $row['flights'] ?></span>
                </div>
            </div>
            <?php } } ?>
        </div>
    </section>

    <footer>
        <div class="units">
            <div class="unit1">
                <h6>Contact Us</h6>
                <div>
                    <span class="left"><i class="fa fa-phone"></i></span>
                    <a href="tel:#">8160819688</a>
                </div>
                <div>
                    <span><i class="fa fa-envelope"></i></span>
                    <a href="mailto:#">customercare@traveldest.com</a>
                </div>
                <div>
                    <span><i class="fa fa-location-arrow"></i></span>
                    <a href="#">4730 Crystal Springs Dr, Los Angeles, CA 90027</a>
                </div>
            </div>
            <div class="unit2">
                <h6>POPULAR NEWS</h6>
                <div>
                    <a href="#">Your Personal Guide to 5 Best Places to Visit on Earth</a>
                </div>
                <time datetime="2021-01-01">Jan 01, 2021</time>
                <br>
                <div>
                    <a href="#">Top 10 Hotels: Rating by Wonder Tour Travel Experts</a>
                </div>
                <time datetime="2021-01-01">Jan 01, 2021</time>
            </div>
            <div class="unit3">
                <h6>QUICK LINKS</h6>
                <ul>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="hotel.html">Hotels</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="blog.html">Blog</a></li>
                </ul>
                <div><button>Get In Touch</button></div>
            </div>
        </div>
        
       <div class="last">
        <ul class="social">
            <li><a href="#"><i class="fab fa-facebook fa-3x"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter fa-3x"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram fa-3x"></i></a></li>
            <li><a href="#"><i class="fab fa-github fa-3x"></i></a></li>
            <li><a href="#"><i class="fab fa-youtube fa-3x"></i></a></li>
            <li><a href="#"><i class="fab fa-pinterest fa-3x"></i></a></li>
        </ul>
        <h5>Copyright &copy; 2021 All rights reserved | Made by Shaan&nbsp;Mistry</h5>
       </div>
    </footer>
</body>
</html>