<?php


require_once __DIR__ . '/vendor/autoload.php';

$googleAccountKeyFilePath = __DIR__ . '/sheets-367211-e4d91f770bf4.json';
putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $googleAccountKeyFilePath);

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->addScope('https://www.googleapis.com/auth/spreadsheets');

function getValues($client,$spreadsheetId, $range)
{

    $service = new Google_Service_Sheets($client);
    $result = $service->spreadsheets_values->get($spreadsheetId, $range);
    try{
        $numRows = $result->getValues() != null ? count($result->getValues()) : 0;
        printf("%d rows retrieved.", $numRows);
        return $result;
    }
    catch(Exception $e) {
        // TODO(developer) - handle error appropriately
        echo 'Message: ' .$e->getMessage();
    }
}


getValues($client,'1E_Ce5b7EbNaenSF-tc7ITt0UEzgMTI94N6KtkDtRtK8', 'Sheet1!A1:B2');
