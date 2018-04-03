<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 27/03/2018
 * Time: 11:06
 */

class newsapi
{


    public function getbbc_news_api()
    {
        $response = $this->get_web_page("https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=5c167ce6600f424281d02fa7891d6ee3");
       // $resArr = array();
        $resArr = json_decode($response);
        echo "<pre>";
        print_r($resArr);
        echo "</pre>";

        return json_decode($resArr);

    }

}