<?php 
    require("../include/database_connect.php");

    $full_name = $_POST['full_name'];
    $phone = $_POST['phone_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = sha1($password);   
   
    // SQL Select Statement 
    $sql = "SELECT * FROM users WHERE email='$email'";
    // Execute SQL statement 
    $result = mysqli_query($conn, $sql);
    // If query execution fails, output error message.
    if (!$result) {
        echo "Something went wrong!";
        return;
    }

    $row_count = mysqli_num_rows($result);
    if ($row_count != 0) {
        echo "<script>alert('This email is already resgistered.');</script>";
        return;
    }

    // SQL Insert Statement 
    $sql2 = "INSERT INTO users (full_name, phone_number, email, password) VALUES ('$full_name', '$phone', '$email', '$password')";
    $result2 = mysqli_query($conn, $sql2);
    if (!$result2) {
        echo "Something went wrong!";
        return;
    }

    // Success response on sign up
    $response = array("success" => true, "message" => "Account successfully created!");
    echo json_encode($response);
    mysqli_close($conn);
?>