<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 27/03/2018
 * Time: 11:40
 */

//$response = file_get_contents("https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=5c167ce6600f424281d02fa7891d6ee3");
$response= file_get_contents("https://newsapi.org/v2/everything?sources=bbc-news&apiKey=5c167ce6600f424281d02fa7891d6ee3");
$responsearray= json_decode($response,true);
//die("{$responsearray}");
/*
echo "<pre>";
        print_r($responsearray);
        echo "</pre>";
*/




foreach ($responsearray as $item)

{
    foreach ($item as $row) {
        //$query = "INSERT INTO" for when i set db up

        echo "Published At: " . $row['publishedAt'] . "<br />";
        echo "Author :" . $row['author'] . "<br />";
        echo "Title :" . $row['title'] . "<br />";
        echo "Description :" . $row['description'] . "<br />";
    }

}
