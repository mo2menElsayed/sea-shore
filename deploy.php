<?php

$payload = json_decode(file_get_contents('php://input'), true);

// Extract branch name
$ref = $payload['ref'] ?? '';
$branch = str_replace('refs/heads/', '', $ref);

// Only deploy if branch is staging
if ($branch !== 'staging') {
    http_response_code(200);
    echo "Push to branch '$branch' ignored.";
    exit;
}

// Log activity
file_put_contents(__DIR__ . '/deploy.log', date('Y-m-d H:i:s') . " Deploying $branch\n", FILE_APPEND);

// Run deployment commands
$cmd = <<<BASH
cd /home/clustev3/seashore
git pull origin staging
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
BASH;

$output = shell_exec($cmd);

file_put_contents(__DIR__ . '/deploy.log', $output . "\n", FILE_APPEND);
echo "✅ Deployed $branch";
// End of deploy.php
?>
<!-- // This script is used to automate the deployment process for the staging branch of a Laravel application.
// It listens for incoming webhook requests, checks if the branch is 'staging', and then     -->