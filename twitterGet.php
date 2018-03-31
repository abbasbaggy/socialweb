<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 20/03/2018
 * Time: 23:42
 */


require_once('twitter-apiExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "215707565-hWZf8wu2u3gs5g6pLDr5BFOSSwiqR67FexvM37FK",
    'oauth_access_token_secret' => "ULaMd5FfPewZSxzhtdMINme4PZDQboTmdkKHe8ovLHuv4",
    'consumer_key' => "S9EgClegmEbWUOkuZd7TtUClC",
    'consumer_secret' => "c87nNbExVMMMzO0gVALSPD9pTyz6IQZZKsP5p2B6VkikQwP6Lp"
);

//$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
//$url = "https://api.twitter.com/1.1/search/tweets.json";
$url = "https://api.twitter.com/1.1/tweets/search/fullachive/Newscred.json";

$requestMethod = "GET";
//if (isset($_GET['user']))  {$user = $_GET['user'];}
//else {$user  = "iagdotme";}
if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 20;}
//$getfield = "?screen_name=$user&count=$count";
//$getfield = "?q=%23news&result_type=popular&count=$count";
//$getfield = "?q=%23news&src=typd&count=$count";
$getfield = "?q=%23news&src=typd";
$twitter = new TwitterAPIExchange($settings);

$string = json_decode($twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p>
<p><em>".$string[errors][0]["message"]."</em></p>";exit();}

/*
foreach($string as $items)
{
    echo "Time and Date of Tweet: ". $items['created_at']."<br />";
    echo "Tweet: ". $items['text']."<br />";
    echo "Tweeted by: ". $items['user']['name']."<br />";
    echo "Screen name: ". $items['user']['screen_name']."<br />";
    echo "Followers: ". $items['user']['followers_count']."<br />";
    echo "Friends: ". $items['user']['friends_count']."<br />";
    echo "Listed: ". $items['user']['listed_count']."<br /><hr />";
}*/
/*
foreach($string as $items)
{
    foreach ($items as $item) {

        echo "Time and Date of Tweet: " . $item['created_at'] . "<br />";
        echo "1" . $item['screen_name'] . "<br />";
        echo "2" . $item['name'] . "<br />";
        echo "3" . $item['statuses_count'] . "<br />";
        echo "4" . $item['favourites_count'] . "<br />";
        echo "5" . $item['created_at'] . "<br />";
        echo "6" . $item['user']['screen_name'] . "<br />";
        echo "7" . $item['user']['favourites_count'] . "<br />";
        echo "TWEETs: " . $item['text'] . "<br />";
    }

}*/
echo "<pre>";
print_r($string);
echo "</pre>";

?>