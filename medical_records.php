<?php
include('connect.php');

// Save Record
if (isset($_POST['save_record'])) {
    $patient_name = trim($_POST['patient_name']);
    $age = trim($_POST['age']);
    $medical_condition = trim($_POST['medical_condition']);

    // Validate input fields
    if (empty($patient_name) || empty($age) || empty($medical_condition)) {
        echo "<p style='color:red;'>All fields are required.</p>";
    } else {
        // Prepare SQL query to save the record
        $stmt = $con->prepare("INSERT INTO medical_records (patient_name, age, medical_condition) VALUES (?, ?, ?)");

        if ($stmt === false) {
            // Output error if SQL query preparation fails
            echo "Error preparing query: " . $con->error;
        } else {
            $stmt->bind_param("sis", $patient_name, $age, $medical_condition);

            if ($stmt->execute()) {
                echo "<p style='color:green;'>Record saved successfully!</p>";
            } else {
                echo "<p style='color:red;'>Error executing query: " . $stmt->error . "</p>";
            }

            $stmt->close();
        }
    }
}

// Close database connection
$con->close();
?>


