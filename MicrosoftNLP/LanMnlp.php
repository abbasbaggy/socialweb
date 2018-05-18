<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 15/04/2018
 * Time: 14:34
 */

$array = $_REQUEST['data'];



// Replace the accessKey string value with your valid access key.
$accessKey = '19d10e679abe47d58b67e286c8617776';




$host = 'https://southcentralus.api.cognitive.microsoft.com';
$path = '/text/analytics/v2.0/languages';

function DetectLanguage ($host, $path, $key, $data) {

    $headers = "Content-type: text/json\r\n" .
        "Ocp-Apim-Subscription-Key: $key\r\n";

    $data = json_encode ($data);


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
//$array =  'This is a document written in English.';
$data = array (
    'documents' => array (
        array ( 'id' => '1', 'text' => $array)

    )
);

print "Please wait a moment for the Language to appear ---";

$result = DetectLanguage ($host, $path, $accessKey, $data);

//echo json_encode (json_decode ($result), JSON_PRETTY_PRINT);
//echo $result;


$lan = json_decode($result, true);

/*
echo "<pre>";
print_r($lan);
echo "</pre>";
/
foreach ($lan as $lans){
    echo $lans['documents'][0]['detectedLanguages'][0]['name'] ."<br/>";
}
*/
$language = $lan['documents'][0]['detectedLanguages'][0]['name'];
$lans = $lan['documents'][0]['detectedLanguages'][0]['iso6391Name'];
echo  $language . "<br/>";
session_start();
$lans = $_SESSION['language'];
//$errorlan= $lan['errors'][0]['message'];

include_once ('SenMnLP.php');
include_once ('PhraMnlp.php');




