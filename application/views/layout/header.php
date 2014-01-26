<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <script type="text/javascript" src="http://www.country-quiz.wizmo.de/public/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="http://www.country-quiz.wizmo.de/public/js/jquery-1.10.2.min.map"></script>
        <script type="text/javascript" src="http://www.country-quiz.wizmo.de/public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="/public/js/country-quiz.js"></script>

        <link rel="stylesheet" type="text/css" href="http://www.country-quiz.wizmo.de/public/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="http://www.country-quiz.wizmo.de/public/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="http://www.country-quiz.wizmo.de/public/css/style.css">
        <title>Country-Quiz</title>
    </head>
    <body onload="initialize();">
        <div class="header">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/" class="navbar-brand visible-xs">Country Quiz</a>
                    <a href="/">
                        <img class="imgA hidden-xs" src="public/img/site.png" alt="Coutry-Quiz">
                    </a>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="question.php">Fragen einsenden</a>
                        </li>
                        <li>
                            <a href="verify.php">Fragenverifizierung</a>
                        </li>
                        <li>
                            <a href="impressum.php">Impressum</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>