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
] , 'api');

if(!empty($data)){
    db_create('comments',$data);
header('content-type: application/json; charset=utf-8');
http_response_code(200);
echo json_encode([
    'status' => true,
    'message' => 'Comment added successfully'
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}




