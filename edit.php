<?php
include 'db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    $sql = "UPDATE users SET first_name='$first_name', middle_name='$middle_name', last_name='$last_name', 
            age='$age', address='$address', course_section='$course_section' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Edit User</h1>
        <form method="POST" action="edit.php?id=<?php echo $row['id']; ?>">
            <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required>
            <input type="text" name="middle_name" value="<?php echo $row['middle_name']; ?>">
            <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required>
            <input type="number" name="age" value="<?php echo $row['age']; ?>" required>
            <textarea name="address" required><?php echo $row['address']; ?></textarea>
            <input type="text" name="course_section" value="<?php echo $row['course_section']; ?>" required>
            <button type="submit" class="submit-btn">Update</button>
        </form>
    </div>

</body>
</html>
