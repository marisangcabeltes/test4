<?php
include 'db.php';

$sql = "SELECT * FROM users"; // Assuming your table is named 'users'
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Manage Users</h1>
        <a href="create.php" class="btn-create">Create New User</a>
        
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Course Section</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        // Check if the 'id' exists to avoid warnings
                        $user_id = isset($row['id']) ? $row['id'] : ''; // Safely get the ID value

                        echo "<tr>
                                <td>" . $row['first_name'] . "</td>
                                <td>" . $row['middle_name'] . "</td>
                                <td>" . $row['last_name'] . "</td>
                                <td>" . $row['age'] . "</td>
                                <td>" . $row['address'] . "</td>
                                <td>" . $row['course_section'] . "</td>
                                <td>";

                        if ($user_id) {
                            echo "<a href='edit.php?id=" . $user_id . "' class='action-btn'>Edit</a>
                                  <a href='delete.php?id=" . $user_id . "' class='action-btn'>Delete</a>";
                        }

                        echo "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
