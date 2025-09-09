<?php
$data = validation([
    'name' => 'required|string',
    'email' => 'required|email',
    'password' => '',
    'mobile' => 'required|',
    'user_type' => 'required|string',
], [
    'name' => trans('user.name'),
    'email' => trans('user.email'),
    'password' => trans('user.password'),
    'mobile' => trans('user.mobile'),
    'user_type' => trans('user.user_type'),
]);

if (!empty($data['password'])) {

$data['password'] = bcrypt($data['password']);
} else {
    unset($data['password']);
}
// var_dump($data);

db_update('users', $data, request('id'));

redirect(aurl('users' . '?id=' . request('id')));
