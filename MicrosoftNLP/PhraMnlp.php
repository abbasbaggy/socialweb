<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 15/04/2018
 * Time: 14:40
 * code part from microsoft and also adapted to meet project specification
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

$array = $_REQUEST['data'];
$lan = $_SESSION['language'];



$accessKey = '19d10e679abe47d58b67e286c8617776';


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


require ('../MicrosoftNLP/dbconnect.php');


foreach ($pass['documents'][0]['keyPhrases'] as $phrase){
    $TStrps = mysqli_real_escape_string($con,$phrase);
    $datasen = "SELECT * FROM `bbcnewstop` WHERE `Title` LIKE '%".$TStrps."%' ";
    $datasen2 = "SELECT * FROM `bbcnewstop` WHERE `Title` LIKE '%".$TStrps."%' `LIMIT 2`  ";
    $query = mysqli_query($con,$datasen);
    $query2 = mysqli_query($con,$datasen2);

    if(mysqli_num_rows($query)> 0){

        while ($result1 = mysqli_query($con,$datasen)  ){
            // print_r( $result1);
            $result1_arr[] = $result1;
        }
    } else {
        echo  "Error" . mysqli_error($con);
        echo "no match found";

    }

}


echo "<pre>";
print_r($result1_arr);
echo "</pre>";

//print_r($phrase_arr);

/*8888888888888888888888888888888
//$strP = implode(" ",$phrase_arr);
//echo $strP;
//require ('../MicrosoftNLP/dbconnect.php');

//mysqli_select_db($con,`bbcnewstop`) or die(mysqli_error($con));

//$TStrp = mysqli_real_escape_string($con,$strP);
//$datas = "SELECT * FROM `bbcnewstop` WHERE (`Title` LIKE '%.$TStrp.%' limit 10) ";

//$query = mysqli_query($con,$datas);

/*if(mysqli_num_rows($query)> 0){
    while ($result1 = mysqli_fetch_array($query) ){
       // print_r( $result1);
        $result1_arr[] = $result1;
    }
} else{
    echo  "Error" . mysqli_error($con);
    echo "no match found";
}
/
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
*****************************************************
$accessKey1 = '19d10e679abe47d58b67e286c8617776';
$host1 = 'https://southcentralus.api.cognitive.microsoft.com';
$path1 = '/text/analytics/v2.0/sentiment';
function GetSentiment1 ($host1, $path1, $key1, $data2) {

    $headers1 = "Content-type: text/json\r\n" .
        "Ocp-Apim-Subscription-Key: $key1\r\n";

    $data2 = json_encode ($data2);

    // NOTE: Use the key 'http' even if you are making an HTTPS request. See:

    $options1 = array (
        'http' => array (
            'header' => $headers1,
            'method' => 'POST',
            'content' => $data2
        )
    );
    $context1  = stream_context_create ($options1);
    $resultse1 = file_get_contents ($host1 . $path1, false, $context1);
    return $resultse1;
}

if($result1_arr > 1) {
    for ($renum = 0; count($result1_arr) >= $renum; $renum++) {
        $bbcarr = $result1_arr[$renum]['Description'];

        $data2 = array(
            'documents' => array(
                array('id' => $renum, 'language' => $lan, 'text' => $bbcarr)
            )
        );
        $resultse1 = GetSentiment1($host1, $path1, $accessKey1, $data2);
        // echo json_encode (json_decode ($resultse1), JSON_PRETTY_PRINT);
        $resultse1_arr[] = $resultse1;
    }
    echo "<pre>";
    print_r($resultse1_arr);
    echo "</pre>";
    $num = 0.50000;
//for ($frenum = 0; count($resultse1_arr) >= $frenum; $frenum++){
    //  print_r( $resultse1_arr[$frenum]['documents'][0]['score']) ;

//}
//echo $num;

    foreach ($resultse1_arr as $newfre) {
        $newscore = json_decode($newfre, true);
        $num += $newscore['documents'][0]['score'];
    }

    $sentfre = $num / count($resultse1_arr);
    echo "Comparative Sentiment Freqency of Topic above against BBC News";
    echo $sentfre;
} elseif ($result1_arr < 1){
    Echo "Sorry no match found";
}*/