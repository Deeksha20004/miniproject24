<?php
// Include the database connection file
include('connect.php');

// Check if POST data exists for email and password
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Get email and password from POST data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Protect against SQL injection
    $email = stripcslashes($email);
    $password = stripcslashes($password);
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    // SQL query to select user based on email and password
    $sql = "SELECT * FROM signup WHERE email='$email' AND psw='$password';";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if query execution was successful and user exists
    // if ($result) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  // Fetch the result row
        $count = mysqli_num_rows($result);  // Get the number of rows

        // If a row is returned, login is successful
        if ($count == 1) {
            echo "Login successful";
            header("location:admin.html"); // 
        } else {
            // Login failed if no matching user is found
            echo "Invalid email or password!";
        }
    // } else {
    //     echo "Error executing the query!";
    // }

    // Close the database connection
    $con->close();
// } else {
//     echo "Please enter both email and password.";
}
?>









