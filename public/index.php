<?php

require_once __DIR__ . "/../includes/app.php";

// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
///////////////// insert data in database///////////
  // db_create('users', [
  //     'name'     => 'user1',
  //     'email'   => 'user3@user3.com',
  //     'password' => 'password_hash(123456, PASSWORD_DEFAULT)',
  //     'mobile'   => '123456789'
  // ]);
///////////////// update data in database///////////
// $updated = db_update('users', [
//     'name'     => 'yousef',
//     'email'   => 'yousef@php.net',
//     'password' => '3333',
//     'mobile'   => '123456789'
// ], 1);
///////////////// delete data in database///////////
// db_delete('users', 2);
///////////////// fetch or find data in database///////////
// db_find('users', 7);
///////////////// search or find data in database///////////
//تعمل مع متغير فقط
// $search = db_first('users', "WHERE  email = 'Ahmed1h1@php.net'");
// var_dump($search);
///////////////// search or find multiple data in database///////////
// $users = db_get('users', "");
// if($users['num'] > 0){
//     while($row = mysqli_fetch_assoc($GLOBALS['query'])) {
//         echo $row['email']."<br>";
//     }
// }
///////////////// search or find multiple pagination data in database///////////
// $users = db_paginate('users', "", 1);
// while($row = mysqli_fetch_assoc($users['query'])) {
//     echo $row['email']. "<br>";
// }
// echo $users['render'];
//////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////session///////////////////////////////////////
///////////////// set session data ///////////
// session('test','test date from function');
// echo session('test');
///////////////// GET session data ///////////
// echo session('test');
///////////////// destroy session by key name ///////////
// session_forget('test');
///////////////// destroy all ///////////
// session_delete_all();
///////////////// send mail ///////////
// var_dump(send_mail(['ahmed@php.net'], 'Test Subject', '<h1>welcome to php email</h1>'));
///////////////////////////////////////////////////////////////////////////////
// symlink(base_path('storage/files'), public_path('storage'));

// $password = '123456';
// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// echo $hashedPassword;

// delete_file('storage/images/img.png');
if(config('database.strict') === true){
  db_setting_strict();
}

route_init();

if(config('database.strict') === true){
  db_setting_strict();
}

if (!empty($GLOBALS['query'])) {
    mysqli_free_result($GLOBALS['query']);
}

mysqli_close($connection);
// ob_end_clean();
ob_end_flush();

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// echo "Hello from index.php ✅";
