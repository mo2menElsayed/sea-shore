<?php
// deploy.php

// Only deploy if it's the main branch
$input = json_decode(file_get_contents('php://input'), true);
$branch = basename($input['ref'] ?? '');

if ($branch !== 'main') {
    http_response_code(200);
    echo "Push to branch '$branch' ignored.";
    exit;
}

// Run deployment
$output = shell_exec('cd /home/youruser/public_html && git pull origin main 2>&1 && composer install --no-dev --optimize-autoloader && php artisan migrate --force && php artisan config:cache && php artisan route:cache && php artisan view:cache');

echo "<pre>$output</pre>";
