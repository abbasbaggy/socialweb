<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 27/03/2018
 * Time: 11:06
 */

class newsapi
{


    public function __call($bbc)
    {
        $response = file_get_contents("https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=5c167ce6600f424281d02fa7891d6ee3");
        $responsearray= json_decode($response,true);
        //die("{$response}");
       /* echo "<pre>";
        print_r($responsearray);
        echo "</pre>";
        */
        return $this->$responsearray;

    }

}