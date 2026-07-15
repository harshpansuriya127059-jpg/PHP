<?php

// Database Connection
$conn = mysqli_connect("localhost", "root", "", "signup");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Signup Code
if (isset($_POST['signup'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {

        $sql = "INSERT INTO signup(name, email, phone, password)
                VALUES('$name', '$email', '$phone', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Signup Successful');</script>";
        } else {
            echo "<script>alert('Error : " . mysqli_error($conn) . "');</script>";
        }

    } else {
        echo "<script>alert('Password does not match!');</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Form</title>
</head>
<body>

<h2>Signup Form</h2>

<form method="POST">

    <label>Name :</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email :</label><br>
    <input type="email" name="email" required><br><br>

    <label>Phone :</label><br>
    <input type="text" name="phone" required><br><br>

    <label>Password :</label><br>
    <input type="password" name="password" required><br><br>

    <label>Confirm Password :</label><br>
    <input type="password" name="confirm_password" required><br><br>

    <input type="submit" name="signup" value="Sign Up">

</form>

</body>
</html>