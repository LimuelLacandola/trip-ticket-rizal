<?php
require_once 'config.php';

$conn = new mysqli(
    DB_SERVERNAME,
    DB_USERNAME,
    DB_PASSWORD,
    DB_NAME
);