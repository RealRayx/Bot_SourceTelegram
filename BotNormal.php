<?php

require 'vendor/autoload.php'; // لود کردن کتابخانه‌ها

use TelegramBot\Api\BotApi;
use TelegramBot\Api\Types\Update;

$botToken = 'YOUR_BOT_TOKEN'; // توکن بات خود را اینجا قرار دهید
$bot = new BotApi($botToken);

// گرفتن اطلاعات از تلگرام
$updates = json_decode(file_get_contents('php://input'), true);
$update = Update::fromResponse($updates);

$message = $update->getMessage();
$chatId = $message->getChat()->getId();
$text = $message->getText();

// پردازش پیام
if ($text === "/start") {
    $bot->sendMessage($chatId, "سلام! به بات من خوش آمدید.");
} else if ($text === "/help") {
    $bot->sendMessage($chatId, "دستورات موجود:\n/start - شروع بات\n/help - دریافت کمک");
} else {
    $bot->sendMessage($chatId, "دستوری که وارد کردید معتبر نیست.");
}
?>
