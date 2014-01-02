<?php

// Alles was für den grundsätzlichen Ablauf benötigt wird, wird hier initiiert.

include_once('error_log/error_log_handler.php');
require_once('database/Database_Handler.php');

$config = parse_ini_file("/srv/www/htdocs/wiz03103/html/application.ini", TRUE);
$dbH = new Database_Handler($config);
$dbH->setConnectionData($config);