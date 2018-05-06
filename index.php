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


        </div>
        <div class="col-sm-7 text-left">
            <h1>Welcome</h1>
            <form name="rawdata" action="MicrosoftNLP/LanMnlp.php" target="results" method="get">
                <textarea name="data" rows="3" cols="70" >

                </textarea>
                <input type="submit">
            </form>
            <iframe src="" name="results" height="500" width="700">

            </iframe>

            <?php
          //include ('NewsExtract/dailyMail.php');
            //include('NewsExtract/bbcnewsapi.php')
            //include ('MicrosoftNLP/SenMnlp.php');
           // include ('MicrosoftNLP/LanMnlp.php');
           // require('NewsExtract/dbconnect.php');

            ?>




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
    document.getElementById("copytweet").addEventListener("click", function() {
        copyToClipboardMsg(document.getElementById("input"), "msg");

        function copyToClipboardMsg(elem, msgElem) {
            var succeed = copyToClipboard(elem);
            var msg;
            if (!succeed) {
                msg = "Copy not supported or blocked.  Press Ctrl+c to copy."
            } else {
                msg = "Text copied to the clipboard."
            }
            if (typeof msgElem === "string") {
                msgElem = document.getElementById(msgElem);
            }
            msgElem.innerHTML = msg;
            setTimeout(function() {
                msgElem.innerHTML = "";
            }, 2000);
        }

        function copyToClipboard(elem) {
            // create hidden text element, if it doesn't already exist
            var targetId = "_hiddenCopyText_";
            var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
            var origSelectionStart, origSelectionEnd;
            if (isInput) {
                // can just use the original source element for the selection and copy
                target = elem;
                origSelectionStart = elem.selectionStart;
                origSelectionEnd = elem.selectionEnd;
            } else {
                // must use a temporary form element for the selection and copy
                target = document.getElementById(targetId);
                if (!target) {
                    var target = document.createElement("textarea");
                    target.style.position = "absolute";
                    target.style.left = "-9999px";
                    target.style.top = "0";
                    target.id = targetId;
                    document.body.appendChild(target);
                }
                target.textContent = elem.textContent;
            }
            // select the content
            var currentFocus = document.activeElement;
            target.focus();
            target.setSelectionRange(0, target.value.length);

            // copy the selection
            var succeed;
            try {
                succeed = document.execCommand("copy");
            } catch(e) {
                succeed = false;
            }
            // restore original focus
            if (currentFocus && typeof currentFocus.focus === "function") {
                currentFocus.focus();
            }

            if (isInput) {
                // restore prior selection
                elem.setSelectionRange(origSelectionStart, origSelectionEnd);
            } else {
                // clear temporary content
                target.textContent = "";
            }
            return succeed;
        }
    });
</script>




<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>
</body>

</html>
