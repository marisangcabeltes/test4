<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    $sql = "INSERT INTO users (first_name, middle_name, last_name, age, address, course_section)
            VALUES ('$first_name', '$middle_name', '$last_name', '$age', '$address', '$course_section')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Create New User</h1>
        <form method="POST" action="create.php">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="middle_name" placeholder="Middle Name">
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="number" name="age" placeholder="Age" required>
            <textarea name="address" placeholder="Address" required></textarea>
            <input type="text" name="course_section" placeholder="Course Section" required>
            <button type="submit" class="submit-btn">Create</button>
        </form>
    </div>

</body>
</html>
