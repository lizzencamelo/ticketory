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
</head>
<body>

    <?php 
        include "include/header.php";   
    ?>
    <!-- Include header file -->
     <?php
            include "include/signup_modal.php";
            include "include/login_modal.php";
            include "include/footer.php"; 
    ?>

    <div>
        <a href="events.php?event_category=concerts">
            Concerts
        </a>
    </div>
    <div>
        <a href="events.php?event_category=sports">
            Sports
        </a>
    </div>

</body>
</html>