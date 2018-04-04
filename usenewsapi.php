<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 04/04/2018
 * Time: 06:24
 */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=5c167ce6600f424281d02fa7891d6ee3');
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$ch_data = curl_exec($ch);
curl_close($ch);

if(!empty($ch_data))
{
    $json_data = json_decode($ch_data, true);
    //print_r($json_data);
    $data_count = count($json_data['blog-posts']) -1;

    echo '<ul>';
    for($i = 0; $i <= $data_count; $i++)
    {
        echo '<li><a href="',$json_data['blog-posts'][$i]['url'],'">',$json_data['blog-posts'][$i]['title'],'</a></li>';
    }
    echo '</ul>';
}
else
{
    echo 'Sorry, but there was a problem connecting to the API.';
}