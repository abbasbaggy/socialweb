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
}*

echo "<pre>";
print_r($string);
echo "</pre>";
*/
$i =0;
$in = 1;
foreach($string['statuses'] as $item){
    $i++;
    $in++;
    echo "Time and Date of Tweet: " . $item['created_at'] . "<br />";
    echo "User Description :" . $item['user']['description'] . "<br />";
    echo "name :" . $item['user']['name'] . "<br />";
    echo "Status count :" . $item['user']['statuses_count'] . "<br />";
    echo "Screen name :" . $item['user']['screen_name'] . "<br />";
    echo "favourites count :" . $item['user']['favourites_count'] . "<br />";
    ?>
   <p><a id="<?php echo $i?>" href ="sample">  <?php  echo "TWEETs:  " . $item['text']. "<br/>" ?> </a> </p>
    <button onclick="myFunction(<?php echo $i?>)">Select tweet</button>

    <script>

        function myFunction(<?php echo $i?>) {
            var x = document.getElementById("<?php echo $i?>").text;
            document.getElementById("int").innerHTML = x;
            x = null;
        }

    </script>


    <?php  echo "      " . "<br />";
}

?>

