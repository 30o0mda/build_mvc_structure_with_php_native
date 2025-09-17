<?php
$data = validation([
    'news_id' => 'required|integer|exists:news,id',
    'name' => 'required|string',
    'email' => 'required|email',
    'comment' => 'required|string',
], [
    'name' => trans('main.name'),
    'email' => trans('main.email'),
    'comment' => trans('main.comment'),
    'news_id' => trans('main.news_id'),
], 'api');

if (!empty($data)) {
    db_create('comments', $data);
    echo response([
        'status' => true,
        'message' => 'comment added'
    ]);
}
