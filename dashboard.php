<?php
    session_start();
    require("include/database_connect.php");

    if(!isset($_SESSION['user_id'])){
        header("location: home.php");
        die();
    }
    
    $user_id = $_SESSION['user_id'];
    $sql1 = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result1 = mysqli_query($conn, $sql1);
    if(!$result1){
        echo "Something went wrong!";
        return;
    }

    $user = mysqli_fetch_assoc($result1);
    if(!$user) {
        echo "Something went wrong!";
        return;
    }
    
    $sql2 = "SELECT * FROM tickets WHERE ticket_holder_id = $user_id AND event_category='concerts'";
    $result2 = mysqli_query($conn, $sql2);
    if(!$result2) {
        echo "Something went wrong!";
        return;
    }

    $concert_tickets = mysqli_fetch_all($result2, MYSQLI_ASSOC);

    $sql3 = "SELECT * FROM tickets WHERE ticket_holder_id = $user_id AND event_category='sports'";
    $result3 = mysqli_query($conn, $sql3);
    if(!$result3) {
        echo "Something went wrong!";
        return;
    }

    $sport_tickets = mysqli_fetch_all($result3, MYSQLI_ASSOC);
    echo "count: ".count($concert_tickets);
    
    // $sql3 = "SELECT * FROM tickets t
    //             INNER JOIN sports e 
    //             ON t.event_id = e.event_id
    //             WHERE t.ticket_holder_id = $user_id";
    // $result3 = mysqli_query($conn,$sql3);
    // $sport_tickets = mysqli_fetch_all($result3, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div class="user-profile">
        <h1>My Profile</h1>
        <div class="user-name"><?= $user['full_name'] ?></div>
        <div class="user-email"><?= $user['email'] ?></div>
        <div class="user-phone"><?= $user['phone_number'] ?></div>
    </div>
    <div class="concert-tickets">
        <h1>My Concert Tickets</h1>
        <?php
            if(count($concert_tickets) > 0)
            {
                foreach ($concert_tickets as $concert_ticket) {
                    $concert_images = glob("img/concerts/" .$concert_ticket['event_id'] . "/*");
        ?>
                <div class="event-ticket">
                    <img src="<?= $concert_images[0] ?>" alt="">
                    <div class="ticket-id">Ticket ID: <?= $concert_ticket['ticket_id'] ?></div>
                    <?php   
                        $event_id = $concert_ticket['event_id'];
                        //  $sql4 = "SELECT * FROM concerts WHERE event_id = $event_id";
                        //  $result4 = mysqli_query($conn, $sql4);
                        //  if(!$result4) {
                        //      echo "Something went wrong";
                        //      return;
                        //  }
                        //  $concert = mysqli_fetch_assoc($result4);
                    ?>                     
                    <!-- <div class="event-name">></div>
                    <div class="event-date"></div>
                    <div class="event-time"></div>
                    <div class="event-price"></div> -->
                </div>
        <?php
                }
            } else {
        ?>

        Go book some tickets.
        
        <?php
            }
        ?>
    </div>
    <div class="sport-tickets">
        <h1>My Sport Tickets</h1>
        <?php
            if(count($sport_tickets) > 0)
            {
                foreach ($sport_tickets as $sport_ticket) {
                    $sport_images = glob("img/concerts/" .$concert_ticket['event_id'] . "/*");
        ?>
                <div class="event-ticket">
                    <img src="<?= $sport_images[0] ?>" alt="">
                    <div class="ticket-id">Ticket ID: <?= $sport_ticket['ticket_id'] ?></div>
                             
                    <!-- <div class="event-name">></div>
                    <div class="event-date"></div>
                    <div class="event-time"></div>
                    <div class="event-price"></div> -->
                </div>
        <?php
                }
            } else {
        ?>

        Go book some tickets.
        
        <?php
            }
        ?>
    </div>

</body>
</html>