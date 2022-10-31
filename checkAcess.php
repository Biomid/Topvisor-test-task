<?php

require_once __DIR__ . '/vendor/autoload.php';

$googleAccountKeyFilePath = __DIR__ . '/sheets-367211-e4d91f770bf4.json';
putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $googleAccountKeyFilePath);

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->addScope(['https://www.googleapis.com/auth/drive', 'https://www.googleapis.com/auth/spreadsheets']);

$spreadsheetId = '1E_Ce5b7EbNaenSF-tc7ITt0UEzgMTI94N6KtkDtRtK8';
$Drive = new Google_Service_Drive($client);
$DrivePermissions = $Drive->permissions->listPermissions($spreadsheetId);

foreach ($DrivePermissions as $key => $value) {
    $role = $value->role;

    var_dump($role);
}