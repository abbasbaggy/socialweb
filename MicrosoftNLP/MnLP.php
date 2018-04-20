<?php

$accessKey = 'dd0c99e93d534a2c9ad064d00907ca5f';

$host = 'https://southcentralus.api.cognitive.microsoft.com';
$path = '/text/analytics/v2.0/languages';

function DetectLanguage ($host, $path, $key, $data)
{

    $headers = "Content-type: text/json\r\n" .
        "Ocp-Apim-Subscription-Key: $key\r\n";

    $data = json_encode($data);

    $options = array(
        'http' => array(
            'header' => $headers,
            'method' => 'POST',
            'content' => $data
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($host . $path, false, $context);
    return $result;
}
//Language detection
$dataL = array (
    'documents' => array (
        array ( 'id' => '1', 'text' => $array )

    )
);

print "Please wait a moment for the results to appear.";

$result = DetectLanguage ($host, $path, $accessKey, $data);
$LanD = json_decode($result,true);
//language result
$language = $LanD['documents'][0]['detectedLanguages'][0]['name'];

//sentiment detection

function GetSentiment ($host, $path, $key, $data) {

    $headers = "Content-type: text/json\r\n" .
        "Ocp-Apim-Subscription-Key: $key\r\n";

    $data = json_encode ($data);

    // NOTE: Use the key 'http' even if you are making an HTTPS request. See:
    // http://php.net/manual/en/function.stream-context-create.php
    $options = array (
        'http' => array (
            'header' => $headers,
            'method' => 'POST',
            'content' => $data
        )
    );
    $context  = stream_context_create ($options);
    $result = file_get_contents ($host . $path, false, $context);
    return $result;
}

$dataSP = array (
    'documents' => array (
        array ( 'id' => '1', 'language' => $LanD, 'text' => $array )

    )
);

$SenD = GetSentiment ($host, $path, $accessKey, $dataSP);
// sentiment result remember to format
//$Sentiment = $SenD['documents'][0]['detectedLanguages'][0]['name'];


$KeyP = GetKeyPhrases ($host, $path, $accessKey, $dataSP);
//Key phrase result