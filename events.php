<?php 
    session_start();

    require "include/database_connect.php";

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
    $event_category = $_GET["event_category"];

    if ($event_category == 'concerts') {
        $sql1 = "SELECT * FROM concerts";
    } else {
        $sql1 = "SELECT * FROM sports";
    }

    $result1 = mysqli_query($conn, $sql1);
    if(!$result1) {
        echo "Something went wrong!";
        return;
    }

    $events = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    if(!$events) {
        echo "Sorry! We do not have any events listed currently.";
        return;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <?php
        include "include/all_links.php";
    ?>
    <link href="css/events.css" rel="stylesheet" type="text/css" >
</head>
<body>
    <?php 
        include "include/header.php";   
    ?>
    
    
    <div class="main"> 
        <ul class="cards">

        <?php
            foreach ($events as $event) {
                if ($event_category == 'concerts') {
                    $event_images = glob("img/concerts/".$event['artist_id']."/*");
                } else {
                    $event_images = glob("img/sports/".$event['event_id']."/*");
                }
        ?>

        <li class="cards_item">
            <div class="card">
                <div class="card_image"><img src="<?= $event_images[1] ?>"></div>
                <div class="card_content">
                    <h2 class="card_title"><?= ($event_category == 'concerts') ? $event['concert_name'] : $event['game_name']. " | ".$event['sport_name'] ?></h2>
                    <p class="card_text event-date"><?= $event['date'] ?></p>
                    <p class="card_text event-time"><?= $event['time'] ?></p>
                    
                    <?php
                        $venue_id = $event['venue_id'];
                        $sql2 = "SELECT * FROM venues WHERE venue_id = $venue_id";
                        $result2 = mysqli_query($conn, $sql2);
                        if(!$result2) {
                            echo "Something went wrong";
                            return;
                        }
                        $venue = mysqli_fetch_assoc($result2);
                    ?>
                    <p class="venue-name"><?= $venue['venue_name'] ?></p>
                    <p class="venue-location"><?= $venue['location'] ?></p>
                <div>
                    <button class="btn card_btn"><a href="event_detail.php?event_category=<?= $event_category ?>&event_id=<?= $event['event_id']?>">Read More</a></button>
            </div>
        </li>
        <?php
                }
        ?>

        </ul>
    </div>

        <?php
            if (count($events) == 0) 
            {
        ?>
        <div>
            <p>No events hanppening.</p>
        </div>
        <?php
            }
        ?>

    <?php
            include "include/signup_modal.php";
            include "include/login_modal.php";
            include "include/footer.php"; 
    ?>
     
     <?php
        // foreach ($events as $event) {
        //     if ($event_category == 'concerts') {
        //         $event_images = glob("img/events/concerts/".$event['artist_id']."/*");
        //     } else {
        //         $event_images = glob("img/events/sports/".$event['event_id']."/*");
        //     }
    ?>

    <!-- <div class="event-id-<?= $event['event_id'] ?>"> 
        <img src="<?= '$event_image[0]' ?>" />
        <div>
            <div class="event-name"><?= ($event_category == 'concerts') ? $event['concert_name'] : $event['game_name']. " | ".$event['sport_name'] ?></div>
            <div class="event-date"><?= $event['date'] ?></div>
            <div class="event-time"><?= $event['time'] ?></div>

            <?php
                $venue_id = $event['venue_id'];
                $sql2 = "SELECT * FROM venues WHERE venue_id = $venue_id";
                $result2 = mysqli_query($conn, $sql2);
                if(!$result2) {
                    echo "Something went wrong";
                    return;
                }
                $venue = mysqli_fetch_assoc($result2);
            ?>

            <div class="venue-name"><?= $venue['venue_name'] ?></div>
            <div class="venue-location"><?= $venue['location'] ?></div>
            <div>
                <a href="event_detail.php?event_category=<?= $event_category ?>&event_id=<?= $event['event_id']?>">View</a>
            </div>
        </div>
    </div> -->
    <?php
        // }
        // if (count($events) == 0) 
        // {
    ?>
        <!-- <div>
            <p>No events hanppening.</p>
        </div> -->
    <?php
      //  }
    ?> 
</body>
</html>