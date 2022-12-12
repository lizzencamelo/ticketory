<?php 
    session_start();

    require "include/database_connect.php";

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
    $event_category = $_GET["event_category"];

    if ($event_category == 'concerts') {
        $sql1 = "SELECT * FROM concerts ORDER BY date";
    } else {
        $sql1 = "SELECT * FROM sports ORDER BY date";
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
    <title>Events | Ticketory</title>
    <?php
        include "include/all_links.php";
    ?>
    <link href="css/events.css" rel="stylesheet" type="text/css" >
</head>
<body>
    <?php 
        include "include/header.php";   
    ?>
    <marquee class="marquee" behavior="scroll" direction="left">&#9734; ticketory &#9734; SHOP MILLIONS OF LIVE EVENTS AND DISCOVER CAN'T MISS CONCERTS, GAMES, THEATRE AND MORE. &#9734; ticketory &#9734;</marquee>

    <?php
            if ($event_category == 'concerts') {
                $event_image = glob("img/event_concert3.jpg");
        ?>
        
    <div class="event-landing-container">
        <h1 class="landing-caption"><span style="letter-spacing:0.4rem;">experience</span> 
                                    <span style="background-color:#E5B8F4;color:#2D033B;padding:0 3rem;"> LIFE. </span> <br/>
                                     Be part of a <i>musical <br/>
                                     history</i>.</h1>
        <div class="event-landing-image">
            <img src="<?= $event_image[0] ?>" alt="" >
        </div>
    </div>
        <?php
            } else {
                $event_image = glob("img/event_sport.jpg");
        ?>
        <div class="event-landing-container">
            <h1 class="landing-caption">for an <i> extraordinary <br />
                                        experience</i>.<br/> 
                                        Live your <span style="font-size:3.5rem;">TRUEST</span><br/>
                                        Fan Moment.</h1>
            <div class="event-landing-image">
                <img src="<?= $event_image[0] ?>" alt="" >
            </div>
            <?php
                }
            ?>
        </div>
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
    
            
        <div class="container my-5">
            <div class="row">

            <?php
                foreach ($events as $event) {
                    if ($event_category == 'concerts') {
                        $event_images = glob("img/concerts/".$event['artist_id']."/*");
                    } else {
                        $event_images = glob("img/sports/".$event['event_id']."/*");
                    }
            ?>
            
                <div class="col-md-4">
                    <div class="content">
                        <div class="image-container">
                            <img src="<?= $event_images[1] ?>" alt="" />
                        </div>                         
                        <div class="content-container">
                            <h1 class="concert-name f9"><?= ($event_category == 'concerts') ? $event['concert_name'] : $event['game_name']. " | ".$event['sport_name'] ?></h1>
                            <p><span  class="date f7"><?= $event['date'] ?>  | </span> <span class="time f7"><?= $event['time'] ?></span></p>
                            <div>
                                <a class="view-button f7" href="event_detail.php?event_category=<?= $event_category ?>&event_id=<?= $event['event_id']?>">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php
                            }
                    ?>  
                </div>
            </div>
    <?php
            include "include/signup_modal.php";
            include "include/login_modal.php";
            include "include/footer.php"; 
    ?>
     
</body>
</html>