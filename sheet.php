<?php
require_once __DIR__ . '/vendor/autoload.php';

$googleAccountKeyFilePath = __DIR__ . '/sheets-367211-e4d91f770bf4.json';
putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $googleAccountKeyFilePath);


$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->addScope('https://www.googleapis.com/auth/spreadsheets');

function create($title,$client){
    $service = new Google_Service_Sheets($client);
try{

    $spreadsheet = new Google_Service_Sheets_Spreadsheet([
        'properties' => [
            'title' => $title
        ]
    ]);
    $spreadsheet = $service->spreadsheets->create($spreadsheet, [
        'fields' => 'spreadsheetId'
    ]);
    printf("Spreadsheet ID: %s\n", $spreadsheet->spreadsheetId);
    return $spreadsheet->spreadsheetId;
}
catch(Exception $e) {
    // TODO(developer) - handle error appropriately
    echo 'Message: ' .$e->getMessage();
}
}
create('topvisor test task', $client);