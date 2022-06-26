<?php

const DB_USER = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'ffv';
const DB_HOST = 'localhost';
const DB_CHARSET = 'utf8';


$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET,DB_USER,DB_PASSWORD);

?>