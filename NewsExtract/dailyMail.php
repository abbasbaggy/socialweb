<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 23/04/2018
 * Time: 12:05
 */

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

        echo "Published At: " . $row['publishedAt'] . "<br />";
        // echo "Author :" . $row['author'] . "<br />";
        echo "Title :" . $row['title'] . "<br />";
        echo "Description :" . $row['description'] . "<br />";
        echo "URL :" . $row['url'] . "<br />";
        echo "time " .$inTime. "<br/>";
    }

}
echo "Error".   mysqli_error($con);

