<?php
if(!function_exists('trans')){
    function trans($key = null, $default = null){
        $trans = explode('.', $key);
        if (session_has('locale')){
            $default = session('locale');
        }else{
            $default = !empty(config('lang.default'))?config('lang.default'):config('lang.fallback');
        }
        $path = config('lang.path').'/'.$default.'/'.$trans[0].".php";
        
        if(file_exists($path) && count($trans) > 0){
            $result = include $path;    
            return isset($result[$trans[1]]) ? $result[$trans[1]] : $key;

        }
        return '';
    }
    
}   

if(!function_exists('set_locale')){
    function set_locale($lang){
        // var_dump($lang);
        session('locale', $lang);
    }
}

set_locale('ar');
// trans('main.home');

// var_dump( );