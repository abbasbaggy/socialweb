<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 23/04/2018
 * Time: 12:05
 */


$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';

foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }

    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

$con = mysqli_connect($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword, $connectstr_dbname);

if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}







//$response=file_get_contents("https://newsapi.org/v2/top-headlines?sources=daily-mail&apiKey=5c167ce6600f424281d02fa7891d6ee3");
$response= file_get_contents("https://newsapi.org/v2/everything?sources=daily-mail&apiKey=5c167ce6600f424281d02fa7891d6ee3");
$responsearray= json_decode($response,true);


$query='';
$inTime = date('m/d/y h:i:s', time());

foreach ($responsearray as $item)

{
    foreach ($item as $row) {

        //$query = "INSERT INTO" for when i set db up
        $pub = mysqli_real_escape_string($con,$row['publishedAt']);
        $tit = mysqli_real_escape_string($con,$row['title']);
        $des = mysqli_real_escape_string($con,$row['description']);
        //$inTime = mysqli_real_escape_string($con,$inTim);

        $query = "INSERT INTO `dailymail`(`Published`,`Title`,`Description`,`inTime`) VALUES
                  ('$pub',' $tit ',' $des' ,'$inTime');";
        mysqli_query($con, $query);

      /*  echo "Published At: " . $row['publishedAt'] . "<br />";
        // echo "Author :" . $row['author'] . "<br />";
        echo "Title :" . $row['title'] . "<br />";
        echo "Description :" . $row['description'] . "<br />";
        echo "URL :" . $row['url'] . "<br />";
        echo "time " .$inTime. "<br/>";
      */
    }

}
//echo "Errors".   mysqli_error($con);

