<?php
session_start();
if (!isset($_SESSION["user"])) { header("Location: index.php"); exit; }
?>
<!DOCTYPE html>
<html>
<body>

<h2>Welcome <?= $_SESSION["user"] ?></h2>

<a href="watch.php">📺 Watch TikTok Videos</a><br><br>
<a href="chat.php">💬 Chat</a><br><br>

<a href="logout.php">Logout</a>

</body>
</html> 
