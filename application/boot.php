<?php

// Alles was für den grundsätzlichen Ablauf benötigt wird, wird hier initiiert.

include_once('error_log/error_log_handler.php');
require_once('database/Database_Handler.php');

// holt die Config und speichert sie in die Variable $config
$config = parse_ini_file("/srv/www/htdocs/wiz03103/html/application.ini", TRUE);
// erstellt ein Database_Handler Objekt um die Datenbank ansprechen und
// übergibt ihm die Config um die nötigen Einstellungen vorzunehmen
$dbH = new Database_Handler($config);
$dbH->setConnectionData($config);