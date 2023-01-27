<?php

echo "<pre>";
print_r($_SERVER);
echo "</pre>";
exit;

$DB_SERVER = $_SERVER['SERVER_NAME'] === 'localhost' ? "localhost:8889" : '127.0.0.1';
$DB_DATABASE = $_SERVER['SERVER_NAME'] === 'localhost' ? "school_project_mvc" : 'base_ecv_ndubocage';
$DB_USER = $_SERVER['SERVER_NAME'] === 'localhost' ? 'root' : 'sql_ecv_ndubocage';
$DB_PASSWORD = $_SERVER['SERVER_NAME'] === 'localhost' ? 'root' : 'yN8Qc8PaZq';
$DEBUG = $_SERVER['SERVER_NAME'] === 'localhost' ? true : false;

return array(
    "DB_USER" => $DB_USER,
    "DB_PASSWORD" => $DB_PASSWORD,
    "DB_DSN" => "mysql:host=$DB_SERVER;dbname=$DB_DATABASE;charset=utf8",
    "DEBUG" => $DEBUG
);
