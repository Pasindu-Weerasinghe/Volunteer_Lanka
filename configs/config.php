<?php

// base url
const BASE_URL = 'http://localhost/Volunteer_Lanka/';

// database
const DB_HOST = 'localhost';
const DB_TYPE = 'mysql';
const DB_NAME = 'volunteer_lanka';
const DB_USER = 'root';
const DB_PASSWORD = '';

$env = parse_ini_file('.env');
$_ENV = array_merge($_ENV, $env);