<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketory</title>
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
    ?>

    <div class="landing-container">
        <div class="container-item concert-container">
            <p class="title">CONCERTS</p>
            <div class="overlay">
                <p class="container-text">Dance with the rhythm, immersed in the melody. Check out upcoming concerts of your favourite artist on Ticketory.</p>
            </div>
            <div class="glass-button-container"><a class="glass-button" href="events.php?event_category=concerts"> Explore Concerts </a></div>
        </div>
        
        <div class="container-item sport-container"> 
            <p class="title">SPORTS</p>
            <div class="overlay">
                <p class="container-text">Feel the adrenaline as you cheer your dream team live in the arena! Find tickets for your dream match.</p>
            </div>
            <div class="glass-button-container"><a class="glass-button"  href="events.php?event_category=sports"> Explore Games </a></div>
        </div> 
    </div>
    
    <?php
            include "include/footer.php"; 
    ?>
</body>
</html>