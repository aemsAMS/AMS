<?php
session_start();
require "db.php";
if (!isset($_SESSION["user"])) { header("Location:index.php"); exit; }

$user = $_SESSION["user"];

$q = $db->query("SELECT DISTINCT sender, receiver FROM messages WHERE sender='$user' OR receiver='$user'");
$users = [];

foreach ($q as $row) {
    if ($row["sender"] != $user) $users[] = $row["sender"];
    if ($row["receiver"] != $user) $users[] = $row["receiver"];
}
$users = array_unique($users);
?>
<!DOCTYPE html>
<html>
<body>

<h2>Your Chats</h2>

<?php if (count($users) == 0): ?>
    <p>No chats yet.</p>
<?php else: ?>
    <?php foreach ($users as $u): ?>
        <p><a href="chat_room.php?user=<?= $u ?>"><?= $u ?></a></p>
    <?php endforeach; ?>
<?php endif; ?>

<br><hr><br>

<h3>Start New Chat</h3>
<form method="get" action="chat_room.php">
    <input type="text" name="user" placeholder="Username">
    <button>Start</button>
</form>

</body>
</html>
