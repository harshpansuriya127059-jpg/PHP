<!DOCTYPE html>
<html>
<head>
    <title>Signup Form</title>
</head>
<body>

<center><h2>Signup Form</h2>

<form action="signup.php" method="post">

    Name :
    <input type="text" name="name" required><br><br>

    Email :
    <input type="email" name="email" required><br><br>

    Phone :
    <input type="text" name="phone" required><br><br>

    Password :
    <input type="password" name="password" required><br><br>

    Confirm Password :
    <input type="password" name="confirm_password" required><br><br>

    <input type="submit" name="signup" value="Sign Up">

</form>
</center>
<?php

if(isset($_POST['signup']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if($password == $confirm)
    {
        echo "<h3> welcome!</h3>";
        echo "Name: $name <br>";
        echo "Email: $email <br>";
        echo "Phone: $phone";
    }
    else
    {
        echo "<h3>Password does not match.</h3>";
    }
}

?>

</body>
</html>