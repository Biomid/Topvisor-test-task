<?php

require_once __DIR__ . '/vendor/autoload.php';

$googleAccountKeyFilePath = __DIR__ . '/sheets-367211-e4d91f770bf4.json';
putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $googleAccountKeyFilePath);

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->addScope(['https://www.googleapis.com/auth/drive', 'https://www.googleapis.com/auth/spreadsheets']);

$service = new Google_Service_Sheets($client);

$Drive = new Google_Service_Drive($client);

$DrivePermisson = new Google_Service_Drive_Permission();
$DrivePermisson->setType('user');
$DrivePermisson->setEmailAddress('Biomid22@gmail.com');
$DrivePermisson->setRole('writer');
$response = $Drive->permissions->create('1E_Ce5b7EbNaenSF-tc7ITt0UEzgMTI94N6KtkDtRtK8', $DrivePermisson);

