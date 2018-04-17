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
            <a class="navbar-brand" href="#">FAke News</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">FAke News via Twitter Analysis</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> About</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-left">
    <div class="scrollmenu">
        <div class="col-sm-3 sidenav">

                <?php include ('twitterGet.php'); ?>

            <p><a href="#">tweets</a></p>
        </div>
        <div class="col-sm-7 text-left">
            <h1>Welcome</h1>
            <form action="MicrosoftNLP/LanMnlp.php" method="get">
                <textarea rows="3" cols="70" >

                </textarea>
                <input type="submit">
            </form>
            <?php
           // include ('bbcnewsapi.php');

            include ('MicrosoftNLP/SenMnlp.php');
            include ('MicrosoftNLP/LanMnlp.php');
            ?>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing  t.</p>
            <hr>
            <h3>Test</h3>
            <p>Lorem ipsum...</p>
        </div>
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p>Source Score</p>
            </div>
            <div class="well">
                <p><?php// include ('MicrosoftNLP/SenMnlp.php'); ?> </p>
            </div>
        </div>
    </div>
</div>

<script>
    // When the user scrolls down 20px from the top of the document, slide down the navbar
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-50px";
        }
    }
</script>

<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>
</body>












</html>
