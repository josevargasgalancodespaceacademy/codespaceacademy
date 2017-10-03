<?php

require_once '../classes/mailer.php';
require_once '../classes/mysql.php';
require_once '../config.php';

$mailer = new Mailer();
$mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);

$subscribers = $mysql->getSelectedDataWithParameters("newsletter_subscriptions","email",array("subscribed" => 1));
$mailer->sendBulkMail($subscribers,"Codespace Newsletter","<h4>Example of the codespace newsletter</h4>Codespace latest news","Example of the codespace newsletter\n\nCodespace latest news");


?>