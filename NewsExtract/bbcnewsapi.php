<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 27/03/2018
 * Time: 11:40
 */


require_once ('../dbconnect.php');
$response = file_get_contents("https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=5c167ce6600f424281d02fa7891d6ee3");
//$response= file_get_contents("https://newsapi.org/v2/everything?sources=bbc-news&apiKey=5c167ce6600f424281d02fa7891d6ee3");
$responsearray= json_decode($response,true);
//die("{$responsearray}");

/*echo "<pre>";
        print_r($responsearray);
        echo "</pre>";

*/

//use select statement to get last store created date in db

foreach ($responsearray as $item)

{
    foreach ($item as $row) {
        // use if statement to check date of last data b4 insering if(){


        $query = "INSERT INTO bbcnewstop(Published, Title, Description) VALUES
                (`".$row['publishedAt']."`,`".$row['title']."`,`".$row['description']."`);";

        mysqli_multi_query($con, $query) or mysqli_query(die);

        echo "Published At: " . $row['publishedAt'] . "<br />";
        //echo "Author :" . $row['author'] . "<br />";
        echo "Title :" . $row['title'] . "<br />";
        echo "Description :" . $row['description'] . "<br />";
        echo "URL :" . $row['url'] . "<br />";
    }

}

