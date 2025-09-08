<?php
ob_start();
$helpers = ["bcrypt","request","routing","helper","AES","db","session","auth","mail","translation","validation","storage","view","media",];


foreach($helpers as $helper) {
    require __DIR__ . "/helpers/".$helper.".php";
}

session_save_path(config('session.session_save_path'));
ini_set('session.gc_probability', 1);
session_start(['cookie_lifetime' => config('session.expiration_timeout')]);


$connection = mysqli_connect(
    config('database.servername'),
    config('database.username'),
    config('database.password'),
    config('database.database'),
    config('database.port')
);

// $database_info = include __DIR__ . "/../config/database.php";
// $connection = mysqli_connect(
//     $database_info['servername'],
//     $database_info['username'],      نفس اللي فوقها بالظبط
//     $database_info['password'],
//     $database_info['database'],
//     $database_info['port']
// );

if(!$connection) {
    die("Connection failed: ".mysqli_connect_error());
}



require_once base_path("/routes/web.php");
require_once base_path("/includes/exception_error.php");


// echo "Database created successfully";


mysqli_query($connection, "CREATE DATABASE IF NOT EXISTS " .'project_one');

