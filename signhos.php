<?php
// Include database connection
include('connect.php');

// Fetch data from POST
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];

$state = $_POST['state'];

$psw = $_POST['psw'];
$pswrepeat = $_POST['pswrepeat'];

// Check if passwords match
if ($psw !== $pswrepeat) {
    die("Passwords do not match. Please try again.");
}

// Hash the password for security
$hashed_password = password_hash($psw, PASSWORD_DEFAULT);

try {
    // Check if the user already exists
    $check_sql = "SELECT email FROM signhos WHERE email = ?";
    $check_stmt = $con->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();
    if ($check_stmt->num_rows > 0) {
        die("User with this email already exists. Please try a different email.");
    }
    $check_stmt->close();

    // Prepare SQL Query to insert new user
    $sql = "INSERT INTO signhos (name, email, contact, state, psw, pswrepeat) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare statement
    $stmt = $con->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("ssisss", $name, $email, $contact, $state, $psw, $pswrepeat);

    // Execute query
    if ($stmt->execute()) {
        echo "Register successful!";
        header("location: loginhos.html");
        exit();
    } else {
        echo "Registration failed: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} catch (Exception $e) {
    echo "Something went wrong: " . $e->getMessage();
}

// Close the connection
$con->close();
?>
