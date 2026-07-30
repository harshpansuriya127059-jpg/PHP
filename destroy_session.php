<?php
session_start();
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Destroy Session</title>
</head>
<body>
    <h1>Destroy Session</h1>
    <p>Session destroyed.</p>
    <p><a href="create_session.php">Create a new session</a></p>
</body>
</html>
