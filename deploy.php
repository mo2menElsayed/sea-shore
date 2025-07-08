<?php

$payload = json_decode(file_get_contents('php://input'), true);
$branch = str_replace('refs/heads/', '', $payload['ref'] ?? '');

if ($branch !== 'staging') {
    http_response_code(200);
    echo "Ignored branch: $branch";
    exit;
}

file_put_contents(__DIR__ . '/deploy.log', "[" . date('Y-m-d H:i:s') . "] Deploying $branch\n", FILE_APPEND);

$cmd = <<<BASH
cd /home/clustev3/seashore
git fetch origin
git reset --hard origin/staging
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
BASH;

$output = shell_exec($cmd);
file_put_contents(__DIR__ . '/deploy.log', $output . "\n", FILE_APPEND);

echo "✅ Deployment finished.";
