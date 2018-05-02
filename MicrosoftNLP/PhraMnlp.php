<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 15/04/2018
 * Time: 14:40
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

$array = $_REQUEST['data'];
$lan = $_SESSION['language'];


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
$path = '/text/analytics/v2.0/keyPhrases';

function GetKeyPhrases ($host, $path, $key, $data) {

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

$data = array (
    'documents' => array (
        array ( 'id' => '1', 'language' => $lan, 'text' => $array )
     )
);

print "Please wait a moment for the language phrase to appear. <br/>";

$result = GetKeyPhrases ($host, $path, $accessKey, $data);

//echo json_encode (json_decode ($result), JSON_PRETTY_PRINT);
$pass = json_decode($result,true);

/*
echo "<pre>";
print_r($pass);
echo "</pre>";
*/
foreach ($pass['documents'][0]['keyPhrases'] as $phrase){
    echo $phrase ."<br/>";
}


//echo $pass['documents'][0]['keyPhrases'][0];
 $phrase1 = array();
 $search = "";




foreach ($pass['documents'][0]['keyPhrases'] as $phrase){
    $phrase_arr[] =$phrase;
}
//print_r($phrase_arr);
$strP = implode(" ",$phrase_arr);
//echo $strP;
require ('../MicrosoftNLP/dbconnect.php');

//mysqli_select_db($con,`bbcnewstop`) or die(mysqli_error($con));

$datas = "SELECT * FROM `bbcnewstop` WHERE (`Title` LIKE '%".$strP."%')";

$query = mysqli_query($con,$datas);

if(mysqli_num_rows($query)> 0){
    while ($result1 = mysqli_fetch_array($query) ){
       // print_r( $result1);
        $result1_arr[] = $result1;
    }
} else{
    echo  "Error" . mysqli_error($con);
}
/*
echo "<pre>";
print_r($result1_arr);
echo "</pre>";


/*
foreach ($result1_arr as $new){
   // $bbcsen= $new['Description'];
    //echo $bbcsen. "<br/>";

    //
    //echo $resultBbc;

}*
function GetSentiment ($host, $path, $key, $data2) {

    $headers = "Content-type: text/json\r\n" .
        "Ocp-Apim-Subscription-Key: $key\r\n";

    $data = json_encode ($data2);

    // NOTE: Use the key 'http' even if you are making an HTTPS request. See:
    // http://php.net/manual/en/function.stream-context-create.php
    $options = array (
        'http' => array (
            'header' => $headers,
            'method' => 'POST',
            'content' => $data2
        )
    );
    $context  = stream_context_create ($options);
    $result = file_get_contents ($host . $path, false, $context);
    return $result;
}

*/
for($renum= 0;count($result1_arr) >= $renum;$renum++){
   $bbcarr=  $result1_arr[$renum]['Description'];

    $databbc = array (
        'documents' => array (
            array ( 'id' => $renum, 'language' => $lan, 'text' => $bbcarr )
        )
    );

    //print_r($databbc);
}
echo "data bbc";
echo "<pre>";
print_r($databbc);
echo "</pre>";


/*
$bbcfinal = GetSentiment($host, $path, $accessKey, $data2);
echo " please wait";
echo "<pre>";
print_r($bbcfinal);
echo "</pre>";
*/
