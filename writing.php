<?php
require_once __DIR__ . '/vendor/autoload.php';

$googleAccountKeyFilePath = __DIR__ . '/sheets-367211-e4d91f770bf4.json';
putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $googleAccountKeyFilePath);

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->addScope('https://www.googleapis.com/auth/spreadsheets');

function updateValues($spreadsheetId, $range, $valueInputOption,$client)
{

    $service = new Google_Service_Sheets($client);
    try{
        $values = [[1],[2],[3],[4],[5],[6],[7],[8],[9],[10]];

        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);
        $params = [
            'valueInputOption' => $valueInputOption
        ];
        //executing the request
        $result = $service->spreadsheets_values->update($spreadsheetId, $range,
            $body, $params);
        printf("%d cells updated.", $result->getUpdatedCells());
        return $result;
    }
    catch(Exception $e) {
        // TODO(developer) - handle error appropriately
        echo 'Message: ' .$e->getMessage();
    }
}


updateValues('1E_Ce5b7EbNaenSF-tc7ITt0UEzgMTI94N6KtkDtRtK8','Sheet1!A1',"USER_ENTERED",$client);