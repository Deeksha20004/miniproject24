<?php
include('connect.php'); // Ensure you have a connect.php file for database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $hospital_name = $_POST['hospitalName'];
    $hospital_address = $_POST['hospitalAddress'];
    $total_rooms = $_POST['totalRooms'];
    $occupied_rooms = $_POST['occupiedRooms'];
    $available_rooms = $_POST['availableRooms'];
    $emergency_rooms = $_POST['emergencyRooms'];
    $department_name = $_POST['departmentName'];
    $physician_name = $_POST['physicianName'];

    // Prepare SQL statement
    $stmt = $con->prepare("INSERT INTO hospital_admin (hospital_name, hospital_address, total_rooms, occupied_rooms, available_rooms, emergency_rooms, department_name, physician_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiiiiss", $hospital_name, $hospital_address, $total_rooms, $occupied_rooms, $available_rooms, $emergency_rooms, $department_name, $physician_name);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Data stored successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $con->close();
}
?>
