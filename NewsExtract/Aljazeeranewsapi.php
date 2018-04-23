<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 04/04/2018
 * Time: 06:24
 */



$response= file_get_contents("https://newsapi.org/v2/everything?sources=al-jazeera-english&apiKey=5c167ce6600f424281d02fa7891d6ee3");
$responsearray= json_decode($response,true);



foreach ($responsearray as $item)

{
    foreach ($item as $row) {
        //$query = "INSERT INTO" for when i set db up

        echo "Published At: " . $row['publishedAt'] . "<br />";
       // echo "Author :" . $row['author'] . "<br />";
        echo "Title :" . $row['title'] . "<br />";
        echo "Description :" . $row['description'] . "<br />";
        echo "URL :" . $row['url'] . "<br />";
    }

}


