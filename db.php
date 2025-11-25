<?php
$db = new PDO("sqlite:database.db");

// ساخت جدول کاربران
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE,
    password TEXT
)");

// ساخت جدول پیام‌ها
$db->exec("CREATE TABLE IF NOT EXISTS messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    sender TEXT,
    receiver TEXT,
    message TEXT,
    tiktok_url TEXT,
    time TEXT
)");
?>
