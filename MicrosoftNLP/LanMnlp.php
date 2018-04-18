<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 15/04/2018
 * Time: 14:34
 */

$array = $_REQUEST['data'];

// NOTE: Be sure to uncomment the following line in your php.ini file.
// ;extension=php_openssl.dll

// **********************************************
// *** Update or verify the following values. ***
// **********************************************

// Replace the accessKey string value with your valid access key.
$accessKey = 'dd0c99e93d534a2c9ad064d00907ca5f';

// Replace or verify the region.

// You must use the same region in your REST API call as you used to obtain your access keys.
// For example, if you obtained your access keys from the westus region, replace
// "westcentralus" in the URI below with "westus".

// NOTE: Free trial access keys are generated in the westcentralus region, so if you are using
// a free trial access key, you should not need to change this region.
$host = 'https://southcentralus.api.cognitive.microsoft.com';
$path = '/text/analytics/v2.0/languages';

function DetectLanguage ($host, $path, $key, $data) {

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
//$array =  'This is a document written in English.';
$data = array (
     'id' => '1', 'text' => $array

);

print "Please wait a moment for the results to appear.";

$result = DetectLanguage ($host, $path, $accessKey, $data);

//echo json_encode (json_decode ($result), JSON_PRETTY_PRINT);
echo $result;

?>

