<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Montserrat&family=Source+Serif+Pro:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="styles/homepage.css">
    <title>TravelDest | Home</title>
    <style>
         #loader {
            border: 12px solid #f3f3f3;
            border-radius: 50%;
            border-top: 12px solid #444444;
            width: 70px;
            height: 70px;
            animation: spin 1s linear infinite;
        }
          
        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }
          
        .center {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }

        .navbar {
            position: absolute;
            top: 0;
            background-color: rgba(255, 255, 255, 0.5);
            color: black;
        }

        .navbar div {
            margin-right: 29em;
        }

        .navbar a {
            color: black;
        }

        .navbar ul li a:hover {
            border: none;
            letter-spacing: 3px;
        }

        .carousel-item img {
            height: 100vh;
        }

        .destinations {
            margin-top: 70px;
            margin-bottom: 100px;
            text-align: center;
        }

        footer {
            height: 450px;
        }

        @media(max-width: 500px) {
            .carousel-item img {
                height: 70vh;
            }
            .navbar div {
                margin: 0;
            }

            .navbar a h1 {
                margin-top: 10px;
                padding: 0;
            }

            .navbar ul {
                margin: 0;
                padding: 0;
                margin-bottom: 10px;
            }

            .navbar ul li {
                padding: 0 20px;
            }

            .destinations {
                width: 100%;
            }

            footer {
                height: 1300px;
            }
        }
    </style>
</head>
<body>
    <div id="loader" class="center"></div>
    <div class="navbar">
        <div>
            <a href="index.html"><h1 class="title">TravelDest</h1></a>
        </div>
        <nav>
            <ul>
                <li><a href="about.html">About</a></li>
                <li><a href="hotel.html">Hotels</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </div>

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-pause="false">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="5000">
            <img src="images/s1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="5000">
            <img src="images/s2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="5000">
            <img src="images/s3.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="5000">
            <img src="images/s4.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="5000">
            <img src="images/s5.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="5000">
            <img src="images/s6.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="5000">
            <img src="images/s7.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="5000">
            <img src="images/s8.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="5000">
            <img src="images/s9.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="5000">
            <img src="images/s10.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
      </div>

    <section class="destinations container">
        <h2>Popular Destinations</h2>
        <div class="countries">
            <?php
                require_once 'config.php';
                $viewQuery = $con -> query("select * from countries");

                if($viewQuery -> num_rows > 0) {
                while($row = $viewQuery -> fetch_assoc()) {
            ?>
            <div class="places">
                <a href="<?php echo strtolower($row['country']) ?>.php"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['countryImage']); ?>" alt=""></a>
                <h4><?php echo $row['country'] ?></h4>
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
                    <a href="#">4730 Crystal Springs Dr, Rajkot, Gujarat, India 360001</a>
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
        

    <script src="js/bootstrap.bundle.js"></script>

    <script>
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector(
                  "body").style.visibility = "hidden";
                document.querySelector(".navbar").style.visibility = "hidden";
                document.querySelector(
                  "#loader").style.visibility = "visible";
            } else {
                document.querySelector(
                  "#loader").style.display = "none";
                  document.querySelector(".navbar").style.visibility = "visible";
                document.querySelector(
                  "body").style.visibility = "visible";
            }
        };
    </script>
</body>
</html>