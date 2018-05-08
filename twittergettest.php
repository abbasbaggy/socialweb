<!DOCTYPE html>
<html lang="en">

<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 20/03/2018
 * Time: 23:42
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('twitter-apiExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "215707565-rh94TVNw7TNXIeB2B4kyxvOgFQ5eM8YknXAE0ABQ",
    'oauth_access_token_secret' => "P19TlmNljztIPZCKmwfkQEtoZ5pTh0bRzCvKOaZK3XNlz",
    'consumer_key' => "cqFfY5QkugFCHJnwc7smCunFu",
    'consumer_secret' => "HRcVSeaKQvGlF1BUCi74feI68y4vrfZxtopbWiEx18nSZBvPWo",

);

//$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$url = "https://api.twitter.com/1.1/search/tweets.json";
//$url = "https://api.twitter.com/1.1/tweets/search/fullachive/newstat.json";

$requestMethod = "GET";
//if (isset($_GET['user']))  {$user = $_GET['user'];}

if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 15;}
//$getfield = "?screen_name=$user&count=$count";
//$getfield = "?q=%23news&result_type&count=$count";;
//$getfield = "?q=%23news&src=typd&count=$count" - "Authorization: 215707565-rh94TVNw7TNXIeB2B4kyxvOgFQ5eM8YknXAE0ABQ";
$getfield = "?f=news&vertical=news&q=news&src=typd";


$twitter = new TwitterAPIExchange($settings);

$string = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
//if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p>
//<p><em>".$string[errors][0]["message"]."</em></p>";exit();}
echo "<pre>";
print_r($string);
echo "</pre>";

?>
