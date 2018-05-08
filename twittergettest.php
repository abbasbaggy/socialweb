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
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p>
<p><em>".$string[errors][0]["message"]."</em></p>";exit();}

?>
<script>
$(document).ready(function() {
loadLatestTweet();
});

//Twitter Parsers
String.prototype.parseURL = function() {
return this.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&~\?\/.=]+/g, function(url) {
return url.link(url);
});
};
String.prototype.parseUsername = function() {
return this.replace(/[@]+[A-Za-z0-9-_]+/g, function(u) {
var username = u.replace("@","")
return u.link("http://twitter.com/"+username);
});
};
String.prototype.parseHashtag = function() {
return this.replace(/[#]+[A-Za-z0-9-_]+/g, function(t) {
var tag = t.replace("#","%23")
return t.link("http://search.twitter.com/search?q="+tag);
});
};
function parseDate(str) {
var v=str.split(' ');
return new Date(Date.parse(v[1]+" "+v[2]+", "+v[5]+" "+v[3]+" UTC"));
}

function loadLatestTweet(){
var numTweets = 1;
var _url = <?php $string ?>;
$.getJSON(_url,function(data){
for(var i = 0; i< data.length; i++){
var tweet = data[i].text;
var created = parseDate(data[i].created_at);
var createdDate = created.getDate()+'-'+(created.getMonth()+1)+'-'+created.getFullYear()+' at '+created.getHours()+':'+created.getMinutes();
tweet = tweet.parseURL().parseUsername().parseHashtag();
tweet += '<div class="tweeter-info"><div class="uppercase bold"><a href="https://twitter.com/#!/CypressNorth" target="_blank" class="black">@CypressNorth</a></div><div class="right"><a href="https://twitter.com/#!/CypressNorth/status/'+data[i].id_str+'">'+createdDate+'</a></div></div>'
$("#twitter-feed").append('<p>'+tweet+'</p>');
}
});
}
</script>