<?php

// Include database connection
include('connect.php');

// Fetch data from POST
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$age = $_POST['age'];
$state = $_POST['state'];
$gender = $_POST['gender'];
$psw = $_POST['psw'];
$pswrepeat = $_POST['pswrepeat'];

// Validate passwords match
if ($psw !== $pswrepeat) {
    die("Passwords do not match. Please try again.");
}

// Hash the password for secure storage
$hashed_password = password_hash($psw, PASSWORD_DEFAULT);

try {
    // Check if the user already exists
    $check_sql = "SELECT email FROM signup WHERE email = ?";
    $check_stmt = $con->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        die("User with this email already exists. Please try a different email.");
    }
    $check_stmt->close();

    // Prepare SQL query for inserting new user
    $sql = "INSERT INTO signup (name, email, contact, age, state, gender, psw, pswrepeat) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssiissss", $name, $email, $contact, $age, $state, $gender, $psw, $pswrepeat);

    // Execute query
    if ($stmt->execute()) {
        echo "Registration successful!";
        header("Location: login.html");
        exit();
    } else {
        echo "Registration failed: " . $stmt->error;
    }

    $stmt->close();
} catch (Exception $e) {
    echo "Something went wrong: " . $e->getMessage();
}

// Close the connection
$con->close();

?>
