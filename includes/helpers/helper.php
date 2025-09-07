<?php
if(!function_exists('config')) {
    function config(string $key,)
    {
        $config = explode('.', $key);
        if(count($config) > 0){
            $result = include base_path('config/' . $config[0].".php");
            return $result[$config[1]];

        }
        return null;
    }
}

if(!function_exists('base_path')) {
    function base_path(string $path )
    {
        // return getcwd()."/../".$path;
        $base = realpath(getcwd() . '/..'); // يطلع من public وينظّف /../
        if ($base === false) {
            throw new Exception("Base path not found");
        }
        return rtrim($base, '/\\') . DIRECTORY_SEPARATOR . ltrim($path, '/\\');
    }
}


if(!function_exists('public_path')) {
    function public_path(string $path )
    {
        return getcwd()."/".$path;
    }
}

if(!function_exists('public_')) {
    function public_()
    {
        return 'public';
    }
}

