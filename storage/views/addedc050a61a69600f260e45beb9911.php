<?php
$data = validation([
    'name' => 'required|string',
    'icon' => 'required|image',
    'description' => 'required',
], [
    'name' => trans('category.name'),
    'icon' => trans('category.icon'),
    'description' => trans('category.description'),
]);

$data['icon'] = store_file($data['icon'],'categories/'.file_ext($data['icon'])['hash_name']);

db_create('categories',$data);
session_flash('old');
redirect(aurl('categories'));