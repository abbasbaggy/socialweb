<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 27/03/2018
 * Time: 11:40
 */

require('dbconnect.php');

//$response = file_get_contents("https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=5c167ce6600f424281d02fa7891d6ee3");
$response= file_get_contents("https://newsapi.org/v2/everything?sources=bbc-news&apiKey=5c167ce6600f424281d02fa7891d6ee3");
$responsearray= json_decode($response,true);
//die("{$responsearray}");

/*echo "<pre>";
        print_r($responsearray);
        echo "</pre>";

*/

//use select statement to get last store created date in db
$query='';
foreach ($responsearray as $item)

{
    foreach ($item as $row) {
        // use if statement to check date of last data b4 insering if(){

       // $pub = mysqli_real_escape_string($link,$row['publishedAt']);
        //$tit = mysqli_real_escape_string($link,$row['title']);
        //$des = mysqli_real_escape_string($link,$row['description']);

       // $query = "INSERT INTO `bbcnewstop`(`‘Published’`, `‘Title’`, `‘Description’`) VALUES
          //     (\'".$row['publishedAt']."\','".$row['title']."','".$row["description"]."');";

        $query .= "INSERT INTO `bbcnewstop`(`‘Published’`, `‘Title’`, `‘Description’`) VALUES (\'2018-04-24T00:05:38Z\',\'Parents facing unfair child abuse claims over bruising\',\'Chloes son was taken away for a year, until his bruising was found to be down to a medical condition.\');";

        mysqli_mutli_query($link, $query);


      /*  echo "Published At: " . $row['publishedAt'] . "<br />";
        //echo "Author :" . $row['author'] . "<br />";
        echo "Title :" . $row['title'] . "<br />";
        echo "Description :" . $row['description'] . "<br />";
        echo "URL :" . $row['url'] . "<br />";

       */
        echo $query;
    }


}echo" success";
