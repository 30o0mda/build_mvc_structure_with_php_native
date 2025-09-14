<?php
$data = validation([
    'name' => 'required|string',
    'icon' => '',
    'description' => 'required',
], [
    'name' => trans('category.name'),
    'icon' => trans('category.icon'),
    'description' => trans('category.description'),
]);

if (!empty($data['icon']['tmp_name'])) {
$category = db_find('categories', request('id'));
redirect_if(empty($category), aurl('categories'));
delete_file($category['icon']);
$data['icon'] = store_file($data['icon'], 'categories/' . file_ext($data['icon'])['hash_name']);
} else {
    unset($data['icon']);
}
// var_dump($data);

db_update('categories', $data, request('id'));
session('success', trans('admin.edited'));
redirect(aurl('categories' . '?id=' . request('id')));
