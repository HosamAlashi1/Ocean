<?php

// أمان: تأكد من التوكن عبر GET أو HEADER
$secret = "h5sam1234"; // غيّر هذا إلى كلمة سر قوية

if (!isset($_GET['token']) || $_GET['token'] !== $secret) {
    http_response_code(403);
    die("Unauthorized");
}

// تنفيذ أوامر التحديث
$output = shell_exec('cd /home/oceanit/dashboard.ocean-it.net/Ocean && git pull origin main && php artisan migrate --force && php artisan 
config:cache && php artisan route:cache');

echo "✅ Deployed:\n" . $output;

