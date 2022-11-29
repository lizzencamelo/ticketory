<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketmaster</title>
    <?php
        include "include/all_links.php";
    ?>
    <link href="css/home.css" rel="stylesheet" type="text/css" >
</head>
<body>
    <?php 
        include "include/header.php";   
    ?>

    <?php
            include "include/signup_modal.php";
            include "include/login_modal.php";
            include "include/footer.php"; 
    ?>

    <div class="landing-container">
        <div class="container-item concert-container">
            <p class="title">card title</p>
            <div class="overlay">
                <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eget diam mauris adipiscing vitae auctor purus.</p>
            </div>
            <div class="button"><a href="events.php?event_category=concerts"> Explore Concerts </a></div>
        </div>
        
        <div class="container-item sport-container"> 
            <p class="title">card title</p>
            <div class="overlay">
                <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eget diam mauris adipiscing vitae auctor purus.</p>
            </div>
            <div class="button"><a href="events.php?event_category=sports"> Explore Games </a></div>
        </div> 

    </div>

</body>
</html>