<?php

function ask($question, $default = '') {
    echo "$question" . ($default ? " [$default]" : "") . ": ";
    $input = trim(fgets(STDIN));
    return $input !== '' ? $input : $default;
}

echo "\n🔧 Drupal Site Installation\n\n";

$siteName = ask("Enter site name", "My Site");
$adminUser = ask("Enter admin username", "admin");
$adminPass = ask("Enter admin password", "admin123");

echo "\n⚙️  Running Drush site install...\n";

$cmd = "./vendor/bin/drush site:install stingo_kit --yes"
     . " --site-name=\"" . escapeshellarg($siteName) . "\""
     . " --account-name=" . escapeshellarg($adminUser)
     . " --account-pass=" . escapeshellarg($adminPass)

passthru($cmd);
