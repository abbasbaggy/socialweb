<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 11/04/2018
 * Time: 14:13
 */
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://southcentralus.api.cognitive.microsoft.com/text/analytics/v2.0/sentiment');
$url = $request->getUrl();

$headers = array(
    // Request headers
    'Content-Type' => 'json',
    'Ocp-Apim-Subscription-Key' => '{dd0c99e93d534a2c9ad064d00907ca5f}',
);

$request->setHeader($headers);

$parameters = array(
    // Request parameters
  //  'numberOfLanguagesToDetect' => '{integer}',
);

$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_POST);

// Request body
$request->setBody("{T @VaticanNews: #PopeFrancis focused his catechesis at the Wednesday General Audience on the Sacrament of Baptism. https://t.co/J4uGz7jkno}");

try
{
    $response = $request->send();
    echo $response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}
