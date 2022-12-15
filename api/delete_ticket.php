<?php
   session_start();
   require("../include/database_connect.php");
   
   $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
   if (!$user_id) {
    // If user is not logged in display alert and take to home page
   echo '<script>
      alert("Please log in to book!")
      window.location.href= "../home.php";
      </script>';
    }
    // function delete_confirm () {
   //    echo "<script>
   //    var ans = confirm('Are you sure you want to cancel booking?');
   //    console.log(ans);</script>";
   //    return "<script>document.write(ans);</script>";
   // }
   
   // Delete ticket from dashboard
   if(isset($_POST['del_ticket'])) {
    $ticket_id = $_POST['del_ticket'];

    $sql6 = "SELECT * FROM tickets WHERE ticket_id='$ticket_id'";   
    $result6 = mysqli_query($conn, $sql6);
    if(!$result6) {
       echo "Something went wrong!";
       return;
    }   
    $ticket = mysqli_fetch_assoc($result6); 

    $event_category = $ticket['event_category'];
    $event_id = $ticket['event_id'];
    $sql7 = "UPDATE ".$event_category." SET event_capacity = event_capacity + 1 WHERE event_id = '$event_id'";
    $result7 = mysqli_query($conn, $sql7);
    if(!$result7) {
       echo "Something went wrong!";
       return;
    } 

    $sql8 = "DELETE FROM tickets WHERE ticket_id='$ticket_id'";
    $result8 = mysqli_query($conn, $sql8);
    if(!$result8) {
       echo "Something went wrong!";
       return;
    }   
    
    $response = array("success" => true, "message" => "Delete successful!");
    echo json_encode($response);
}
 

?>