<?php
   session_start();
   require("../include/database_connect.php");

   // Check if user is logged in
   $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

   // Only allow user to book tickets if he is logged in
   if (!$user_id) {
       // If user is not logged in display alert and take to home page
      echo '<script>
         alert("Please log in to book!")
         window.location.href= "../home.php";
         </script>';
   }

   if(isset($_GET['ticket-quantity'])) {
   // Cookie created to store the category and id of event to book
   // Created when user accesses the event_detail page
   $event_category = $_COOKIE["event_category"];
   $event_id = $_COOKIE['event_id'];
   // Quantity of tickets booked as a for get parameter
   $quantity = $_GET['ticket-quantity'];
   
   // SQL query to get event details
   $sql1 = "SELECT * FROM ".$event_category." WHERE event_id='$event_id'";
   $result1 = mysqli_query($conn, $sql1);
   if(!$result1) {
      echo "Something went wrong!";
      return;
   }
   // fetch_assoc returns only one row at a time
   $event = mysqli_fetch_assoc($result1);
     
   // SQL query to get venue details
   $venue_id = $event['venue_id'];
   $sql2 = "SELECT * FROM venues WHERE venue_id = $venue_id";
   $result2 = mysqli_query($conn, $sql2);
   if(!$result2) {
      echo "Something went wrong";
      return;
   }
   $venue = mysqli_fetch_assoc($result2);
   
   // SQL query to get user details
   $sql3 =  "SELECT * FROM users WHERE user_id = '$user_id'";
   $result3 = mysqli_query($conn, $sql3);
   if(!$result3) {
      echo "Something went wrong";
      return;
   }
   $user = mysqli_fetch_assoc($result3);
   
   $event_capacity = $event['event_capacity'];
   // Check if there is sufficient capacity
   if ($event_capacity - $quantity < 0) {
      echo '<script>
               alert("Tickets sold out!")
               window.location.href= "../home.php";
            </script>';
      return;
   }

   // Create ticket for each quantity item
   for ($i = 0; $i < $quantity; $i++) {

      // Update event capacity as a ticket gets booked
      $sql4 = "UPDATE ".$event_category." SET event_capacity = event_capacity - 1 WHERE event_id = $event_id";
      $result4 = mysqli_query($conn, $sql4);
      if (!$result4) {
         echo "Something went wrong!";
         return;
      }
      // Insert ticket into database table
      $sql5 = "INSERT INTO tickets(ticket_holder_id, event_category, event_id) VALUES ('$user_id','$event_category', $event_id)";
      $result5 = mysqli_query($conn, $sql5);
      if (!$result5) {
         echo "Something went wrong!";
         return;
         }
      }

      header("location: ../dashboard.php");
   }

   mysqli_close($conn);                  
   ?>


