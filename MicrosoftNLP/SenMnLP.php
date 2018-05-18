<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 11/04/2018
 * Time: 14:55
 */

//$lan = require_once 'LanMnlp.php';

$array = $_REQUEST['data'];
$lan = $_SESSION['language'];
$accessKey = '19d10e679abe47d58b67e286c8617776';


$host = 'https://southcentralus.api.cognitive.microsoft.com';
$path = '/text/analytics/v2.0/sentiment';

function GetSentiment ($host, $path, $key, $data) {

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

$data = array (
    'documents' => array (
        array ( 'id' => '1', 'language' => $lan, 'text' =>  $array ),
    )
);

print "Please wait a moment for sentiments score to appear  = ";

$result = GetSentiment ($host, $path, $accessKey, $data);

//echo json_encode (json_decode ($result), JSON_PRETTY_PRINT) ."<br/>";
$sen =  json_decode($result, true);
/*
echo "<pre>";
print_r($sen);
echo "</pre>";
*/

$senti = $sen['documents'][0]['score'];
echo $senti ."<br/>";
echo "Sentiment is ";

switch ($senti){
    case ($senti <= 0.20):
        echo "extremely Negative Sentiment \"<br/>\"";
        break;
    case ($senti <= 0.40):
        echo "very Negative Sentiment \"<br/>\"";
        break;
    case ($senti <= 0.49):
        echo "a little negative Sentiment\"<br/>\"";
        break;
    case ($sent = 0.5):
        echo "Neutral Sentiment\"<br/>\"";
        break;
    case ($senti <= 0.59):
        echo "a little positive Sentiment\"<br/>\"";
        break;
    case ($senti <= 0.80):
        echo "very positive Sentiment\"<br/>\"";
        break;
    case ($senti <= 1.0):
        echo "extremely positive Sentiment\"<br/>\"";
        break;
}