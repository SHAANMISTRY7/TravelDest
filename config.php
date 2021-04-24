<?php
    $con = new mysqli("localhost", "wt", "wt", "traveldest");

    if($con->connect_error) {
        die("Connection failed : " . $con->connect_error);
    }
?>