<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://web-credit-api.azurewebsites.net/v1/Amortization',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
    "amortization": {
        "agentCommission": {
            "amount": 0,
            "type": "Percentage",
            "baseValue": "InitialValue"
        },
        "apr": 0.0204,
        "termInMonths": 10,
        "startDate": "2023-11-21T03:00:00.000Z",
        "requestedAmount": 0,
        "amortizationType": "fgts"
    },
    "registrationNumber": "00805349960",
    "legalPerson": false,
    "productId": "a3770bf5-fc8b-4668-ba54-4bfecd089b69"
}',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
