<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Index</title>
    <meta charset ="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>

        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=".">FAke News</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href=".">FAke News via Twitter Analysis using Sentiments</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="About.html"><span class="glyphicon glyphicon-log-in"></span> About</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-left">
    <div class="scrollmenu">
        <div class="col-sm-3 sidenav">

            <div class="well">
                <h3>News Tweets</h3>
            </div>



                <?php  include ('twittergettest.php')
                 ?>


        </div>
        <div class="col-sm-7 text-left">
            <h1>Welcome</h1>
            <form name="rawdata" action="MicrosoftNLP/LanMnlp.php" target="results" method="get">
                <textarea id="int" name="data" rows="3" cols="70" >

                </textarea>
                <input type="submit">
            </form>

            <hr>
            <h3>Test Analysis</h3>

            <iframe src="" name="results" height="500" width="700">

            </iframe>

            <?php
          //include ('NewsExtract/dailyMail.php');
          //include('NewsExtract/bbcnewsapi.php')
            //include ('MicrosoftNLP/SenMnlp.php');
           // include ('MicrosoftNLP/LanMnlp.php');
           // require('NewsExtract/dbconnect.php');

            ?>





        </div>
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p>Sentiment Score Range</p>
                <p>"0" Extremely Negative and "1" Extremely Positive  </p>
            </div>
            <?php //include ('twitterGet.php');?>

            <form name="rawdata" action="twitterGet.php" target="tweets" method="get">
                <textarea id="int2" name="user" rows="1" cols="20" >

                </textarea>
                <input type="submit">
            </form>
            <iframe src="" name="tweets" height="700" width="300">

            </iframe>



        </div>
    </div>
</div>







<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>
</body>

</html>
