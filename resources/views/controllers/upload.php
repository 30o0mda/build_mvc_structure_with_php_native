<?php
// C:\xampp\htdocs\PROGECT1\public\storage\images\img.png

// store_file(from: request('image'), to: 'images/img.png'); // uplode photo


$data = validation([
    'email'=>'required|email',
    'mobile'=>'required|numeric',
    'address'=>'required|string',
    
],[
     'email'=>trans('main.email'),
    'mobile'=>trans('main.mobile'),
    'address'=>trans('main.address'),

] );


// echo '<br>';
var_dump($data);
// var_dump(any_error('mobile,email'));

session_flash('old');


