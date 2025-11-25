<?php
require "db.php";
$msg = "";

if (isset($_POST["register"])) {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    try {
        $q = $db->prepare("INSERT INTO users (username, password) VALUES (?,?)");
        $q->execute([$user, $pass]);
        $msg = "Account created. You can login now.";
    } catch (Exception $e) {
        $msg = "Username already exists!";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Register</h2>

<form method="post">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button name="register">Register</button>
</form>

<p style='color:red;'><?= $msg ?></p>
</body>
</html>
