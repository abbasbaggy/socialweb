<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 08/04/2018
 * Time: 20:25
 */

require('NewsExtract/dbconnect.php');
$response= file_get_contents("https://newsapi.org/v2/everything?sources=cnn&apiKey=5c167ce6600f424281d02fa7891d6ee3");
$responsearray= json_decode($response,true);


$query='';
foreach ($responsearray as $item)

{
    foreach ($item as $row) {
        //$query = "INSERT INTO" for when i set db up
        $pub = mysqli_real_escape_string($con,$row['publishedAt']);
        $tit = mysqli_real_escape_string($con,$row['title']);
        $des = mysqli_real_escape_string($con,$row['description']);

        $query = "INSERT INTO `cnnn`(`Published`,`Title`,`Description`) VALUES
                  ('$pub',' $tit ',' .$des ');";
        mysqli_query($con, $query);

       // echo "Published At: " . $row['publishedAt'] . "<br />";
       // echo "Author :" . $row['author'] . "<br />";
        //echo "Title :" . $row['title'] . "<br />";
        //echo "Description :" . $row['description'] . "<br />";
        //echo "URL :" . $row['url'] . "<br />";
    }

}
