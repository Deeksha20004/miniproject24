<?php
include('connect.php'); // Ensure you have a connect.php file for database connection

// Fetch all data from the hospital_admin table
$sql = "SELECT * FROM hospital_admin";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Hospital Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Hospital Data</h1>
    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hospital Name</th>
                    <th>Address</th>
                    <th>Total Rooms</th>
                    <th>Occupied Rooms</th>
                    <th>Available Rooms</th>
                    <th>Emergency Rooms</th>
                    <th>Department Name</th>
                    <th>Physician Name</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['hospital_name']; ?></td>
                        <td><?php echo $row['hospital_address']; ?></td>
                        <td><?php echo $row['total_rooms']; ?></td>
                        <td><?php echo $row['occupied_rooms']; ?></td>
                        <td><?php echo $row['available_rooms']; ?></td>
                        <td><?php echo $row['emergency_rooms']; ?></td>
                        <td><?php echo $row['department_name']; ?></td>
                        <td><?php echo $row['physician_name']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No data found.</p>
    <?php endif; ?>
</body>
</html>

<?php $con->close(); ?>
