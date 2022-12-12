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
    
    $sql2 = "SELECT * FROM tickets t
            INNER JOIN concerts c
            ON t.event_id = c.event_id
            INNER JOIN venues v
            ON c.venue_id = v.venue_id
            WHERE t.ticket_holder_id = '$user_id' AND t.event_category='concerts'";
    $result2 = mysqli_query($conn, $sql2);
    if(!$result2) {
        echo "Something went wrong!";
        return;
    }

    $concert_tickets = mysqli_fetch_all($result2, MYSQLI_ASSOC);

    $sql3 = "SELECT * FROM tickets WHERE ticket_holder_id = '$user_id' AND event_category='sports'";
    $result3 = mysqli_query($conn, $sql3);
    if(!$result3) {
        echo "Something went wrong!";
        return;
    }

    $sport_tickets = mysqli_fetch_all($result3, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Dashboard | Ticketory</title>
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
                    $concert_images = glob("img/concerts/" .$concert_ticket['artist_id'] . "/*");
        ?>  
                    <div><img height="100px" width="100px" src="<?= $concert_images[0] ?>" alt=""></div>
                    <div class="ticket-id">Ticket ID: <?= $concert_ticket['ticket_id'] ?></div>
                    <div class="event-name">Concert name: <?= $concert_ticket['concert_name'] ?></div>
                    <div class="event-date">Date: <?= $concert_ticket['date'] ?></div>
                    <div class="event-time">Time: <?= $concert_ticket['time'] ?></div>
                    <div class="ticket-price">Ticket Price: <?= $concert_ticket['event_price'] ?></div>
                    <div class="venue-name">Venue: <?= $concert_ticket['venue_name'] ?></div>
                    <div class="venue-location">Venue location: <?= $concert_ticket['location'] ?></div>
                    <a class="" href="api/book_ticket.php?delete=<?= $concert_ticket['ticket_id'] ?>" >delete</a>
            
                    
        <?php
                }
            } else {
        ?>

        <a href="events.php?event_category=concerts">Go book some tickets.</a>
        
        <?php
            }
        ?>
    </div>
    

</body>
</html>