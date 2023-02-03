<?php
$DB_SERVER = "localhost:3306";
$DB_DATABASE = "school_project_mvc";
$DB_USER = 'root';
$DB_PASSWORD = 'root';
$DEBUG = true;

return array(
    "DB_USER" => $DB_USER,
    "DB_PASSWORD" => $DB_PASSWORD,
    "DB_DSN" => "mysql:host=$DB_SERVER;dbname=$DB_DATABASE;charset=utf8",
    "DEBUG" => $DEBUG
);