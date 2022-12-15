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
    $user_profile = glob("img/user/".$user['user_id']."/*");
    
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

    $sql3 = "SELECT * FROM tickets t 
            INNER JOIN sports s
            ON t.event_id = s.event_id
            INNER JOIN venues v
            ON s.venue_id = v.venue_id
            WHERE ticket_holder_id = '$user_id' AND event_category='sports'";
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
    <?php
        include "include/all_links.php";
    ?>
    <link href="css/dashboard.css" rel="stylesheet" type="text/css" >
</head>
<body>
    <div class="user-profile">
        <div class="row user-details">
            <div class="col-4">
                <div class="user-profile-pic"><img src="<?= $user_profile[0] ?>"></div>
            </div>
            <div class="col-8">
                <div class="user-name"><?= $user['full_name'] ?></div>
                <div class="user-email"><?= $user['email'] ?></div>
                <div class="user-phone"><?= $user['phone_number'] ?></div>
            </div>
        </div> 
    </div> 
    <div class="concert-tickets container">
        <h1 class="container-title" >My Concert Tickets</h1>
        <?php
            if(count($concert_tickets) > 0)
            {
                foreach ($concert_tickets as $concert_ticket) {
                    $concert_images = glob("img/concerts/" .$concert_ticket['artist_id'] . "/*");
        ?>  
                <div class="row ticket">
                    <div class="col-md-4 ticket-image">
                        <img src="<?= $concert_images[1] ?>" alt="">
                    </div>

                    <div class="col-md-8 ticket-details">
                        <div class="event-name"><?= $concert_ticket['concert_name'] ?></div>   
                        <div class="row mb-4">                                  
                            <div class="col-6">                                
                                <div class="ticket-id d-flex flex-column"><span class="ticket-tag">Ticket ID:</span><span><?= $concert_ticket['ticket_id'] ?></span></div>
                            </div>
                            <div class="col-6">
                                <div class="venue-details d-flex flex-column"><span class="ticket-tag">Venue:</span><span><?= $concert_ticket['venue_name'] ?></span><span><?= $concert_ticket['location'] ?></span></div>
                            </div>
                        </div>
                        <div class="row">                                  
                            <div class="col-6">
                                <div class="event-date"><?= $concert_ticket['date'] ?></div>
                                <div class="event-time"><?= $concert_ticket['time'] ?></div>
                            </div>
                                
                            <div class="col-6">                                
                                <div class="ticket-barcode">Ticket</div>
                            </div>
                        </div>
                    </div>

                    <form id="delete-form" action="" method="POST" >
                        <input type="hidden" name="del_ticket" value="<?= $concert_ticket['ticket_id'] ?>" />
                        <input class="delete-ticket" type="submit" name="delete" value="" ><span aria-hidden="true">&times;</span>
                    </form>
                </div>
                    
        <?php
                }
            } else {
        ?>
        <div class="row no-ticket">
            <a class='butn butn__new' href="events.php?event_category=concerts">Go book some tickets.</a>
        </div>
        <?php
            }
        ?>
    </div>

    <div class="sport-tickets container">
        <h1 class="container-title" >My Sport Tickets</h1>
        <?php
            if(count($sport_tickets) > 0)
            {
                foreach ($sport_tickets as $sport_ticket) {
                    $sport_images = glob("img/sports/" .$sport_ticket['event_id'] . "/*");
        ?>  
                <div class="row ticket">
                    <div class="col-md-4 ticket-image">
                        <img src="<?= $sport_images[1] ?>" alt="">
                    </div>

                    <div class="col-md-8 ticket-details">
                        <div class="event-name"><?= $sport_ticket['sport_name'] ?></div>   
                        <div class="row mb-4">                                  
                            <div class="col-6">                                
                                <div class="ticket-id d-flex flex-column"><span class="ticket-tag">Ticket ID:</span><span><?= $sport_ticket['ticket_id'] ?></span></div>
                            </div>
                            <div class="col-6">
                                <div class="venue-details d-flex flex-column"><span class="ticket-tag">Venue:</span><span><?= $sport_ticket['venue_name'] ?></span><span><?= $sport_ticket['location'] ?></span></div>
                            </div>
                        </div>
                        <div class="row">                                  
                            <div class="col-6">
                                <div class="event-date"><?= $sport_ticket['date'] ?></div>
                                <div class="event-time"><?= $sport_ticket['time'] ?></div>
                            </div>
                                
                            <div class="col-6 vertical">                                
                                <div class="ticket-barcode">Ticket</div>
                            </div>
                        </div>
                    </div>

                    <form id="delete-form" action="api/book_ticket.php" method="POST" >
                        <input class="delete-ticket" type="submit" name="delete" value="<?= $sport_ticket['ticket_id'] ?>" ><span aria-hidden="true">&times;</span>
                    </form>

                </div>
                    
        <?php
                }
            } else {
        ?>

        <div class="row no-ticket">
            <a class='butn butn__new' href="events.php?event_category=sports">Go book some tickets.</a>
        </div>
        
        <?php
            }
        ?>
    </div>
    
        <script type="text/javascript" src="js/dashboard.js" ></script>
</body>
</html>