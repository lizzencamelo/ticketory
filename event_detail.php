<?php 
    session_start();
    require "include/database_connect.php";

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
    $event_category = $_GET["event_category"];
    $event_id = $_GET['event_id'];
    
    // Using cookies to save event info so it is accessible to book_ticket page
    setcookie("event_category",  $event_category, time()+3600);
    setcookie("event_id",  $event_id, time()+3600);

    $sql1 = "SELECT * FROM $event_category";
    $result1 = mysqli_query($conn, $sql1);
    if(!$result1) {
        echo "Something went wrong!";
        return;
    }


    $sql2 = "SELECT * FROM $event_category WHERE event_id='$event_id'";
    $result2 = mysqli_query($conn, $sql2);
    if(!$result1) {
        echo "Something went wrong!";
        return;
    }

    $event_details = mysqli_fetch_assoc($result2);
    if(!$event_details) {
        echo "Something went wrong!";
        return;
    }

    if ($event_category == 'concerts') {
        $event_images = glob("img/concerts/".$event_details['artist_id']."/*");
    } else {
        $event_images = glob("img/sports/".$event_details['event_id']."/*");
    }

    // Select all tickets for particular event
    $sql4 = "SELECT * FROM tickets WHERE event_id ='$event_id' AND event_category = '$event_category'";
    $result4 = mysqli_query($conn, $sql4);
    if(!$result4) {
        echo "Something went wrong!";
        return;
    }
    //Retrieve all tickets
    $bookings = mysqli_fetch_all($result4, MYSQLI_ASSOC);
    $booking_count = mysqli_num_rows($result4);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($event_category == 'concerts') ? $event_details['concert_name'] : $event_details['game_name']; ?></title>
    
    <?php
        include "include/all_links.php";
    ?>

    <link href="css/event_detail.css" rel="stylesheet">
</head>
<body>

    <div class="event-detail-container">
        <div class="container">
            <div class="event-details">
                <div class="event-name"><?= ($event_category == 'concerts') ? $event_details['concert_name'] : $event_details['game_name'] ?></div>
                <div class="my-3">
                    <div class="event-date"><?= $event_details['date'] ?></div>
                    <div class="event-time"><?= $event_details['time'] ?></div>
                </div>
                <?php
                    $venue_id = $event_details['venue_id'];
                    $sql3 = "SELECT * FROM venues WHERE venue_id = '$venue_id'";
                    $result3 = mysqli_query($conn, $sql3);
                    if(!$result3) {
                        echo "Something went wrong";
                        return;
                    }
                    $venue = mysqli_fetch_assoc($result3);
                ?>
                <div class="venue-name"><?= $venue['venue_name'] ?></div>
                <div class="venue-location"><?= $venue['location'] ?></div>
            
                <?php 
                    $booked = false;
                    foreach ($bookings as $booking) {
                        if($booking['ticket_holder_id'] == $user_id) {
                            $booked = true;
                        }
                    }
                    if($booked) {
                ?>
                    <a href="dashboard.php" >View Your Tickets</a>
                <?php 
                    }
                ?>
                <form method="get" action="api/book_ticket.php">
                    <div class="event-price">Ticket Price:<?= $event_details['event_price'] ?></div>
                    Quantity: <input type="number" min="1" id="ticket-quantity" name="ticket-quantity" value="1" oninput="calculateTotalTicketPrice(<?= $event_details['event_price'] ?>)">
                    <br>
                    Total Price:<span id="total-price"><?= $event_details['event_price'] ?></span>
                    <br>
                    <?php
                        $event_capacity = $event_details['event_capacity'];
                        if($event_capacity == 0) {
                    ?>
                        <input type="submit" value="Sold Out" disabled>
                    <?php
                        } else { 
                    ?>
                        <input class="submit-button" type="submit" value="Book Tickets" id="book-my-ticket">
                    <?php
                        }
                    ?>
                </form>
            </div>            
            <div class="event-image" >
                <img src="<?= $event_images[0] ?>" alt=""/>
            </div>
        </div>
    </div>

    <script src="js/event_detail.js" type="text/javascript"></script>
</body>
</html>