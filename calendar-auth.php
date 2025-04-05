<?php

require __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName('Laravel Todo App');
$client->setScopes(Google_Service_Calendar::CALENDAR);
$client->setAuthConfig(__DIR__ . '/storage/app/google-calendar/credentials.json');
$client->setAccessType('offline');
$client->setPrompt('select_account consent');
$client->setRedirectUri('http://localhost'); // ← konieczne dla klienta web

$authUrl = $client->createAuthUrl();

echo "Otwórz ten link w przeglądarce:\n$authUrl\n";
echo "Wklej tutaj kod autoryzacji:\n";
$authCode = trim(fgets(STDIN));

$accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
file_put_contents(__DIR__ . '/storage/app/google-calendar/token.json', json_encode($accessToken));

echo "Token zapisany!\n";
