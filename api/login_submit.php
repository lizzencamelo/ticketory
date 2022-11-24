<?php
   session_start();
   require("../include/database_connect.php");

   $email = $_POST['email'];
   $password = $_POST['password'];
   $password = sha1($password);

   // SQL Select Statement 
   $sql = "SELECT * FROM users WHERE email = '$email' AND password='$password'";

   // Execute SQL statement 
   $result = mysqli_query($conn, $sql);

   // Get number of rows returned 
   $row_count = mysqli_num_rows($result);
   if (!$row_count) {
      echo "<script>alert('Invalid password or email.');</script>";
      return;
   }
  
   // Fetches one row of data from the result as an associative array
   $row = mysqli_fetch_assoc($result);
   $_SESSION['user_id'] = $row['user_id'];
   $_SESSION['full_name'] = $row['full_name'];
   $_SESSION['email'] = $row['email'];

   mysqli_close($conn);
?>