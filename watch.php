<?php
session_start();
if (!isset($_SESSION["user"])) { header("Location:index.php"); exit; }

$tiktok = isset($_GET["v"]) ? $_GET["v"] : "";
?>
<!DOCTYPE html>
<html>
<body>

<h2>TikTok Viewer</h2>

<form method="get">
    <input type="text" name="v" placeholder="Paste TikTok video URL" style="width:300px;">
    <button>Open</button>
</form>

<?php if ($tiktok): ?>
    <h3>Video:</h3>
    <iframe width="300" height="500" src="<?= $tiktok ?>"></iframe>

    <br><br>

    <form action="chat_room.php" method="post">
        <input type="hidden" name="tiktok_url" value="<?= $tiktok ?>">
        <input type="text" name="receiver" placeholder="Send to username">
        <button>Send to Chat</button>
    </form>
<?php endif; ?>

</body>
</html>
