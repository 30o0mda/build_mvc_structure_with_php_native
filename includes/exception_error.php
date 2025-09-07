<?php
/**
 * 
 * EXCEPTION HANDLING URL PAGES
 */
$GET_ROUTES = isset($routes['GET']) ? $routes['GET'] : [];

if(!isset($_POST['_method']) && !is_null(segment()) && !in_array(segment(), array_column($GET_ROUTES, 'segment'))){
    // $storage_segment = str_replace('/'.public_().'/','',segment());
    // if(preg_match('/^storage/i', $storage_segment)){
    //     storage($storage_segment);
    // }else{
        view('404');
        exit();
    // }

}

// $POST_ROUTES = isset($routes['POST']) ? $routes['POST'] : [];
