<?php

if (!function_exists('storage')) {
    function storage(string $path)
    {
        if (file_exists($path)) {

            header('content-description: file from server');
            header('content-type: attachment; filename="' . basename($path));
            header('expires: 0');
            header('cache-control: must-revalidate');
            header('pragma: public');
            header('content-length: ' . filesize($path));
            readfile($path);
        }
        exit();
    }
}

if (!function_exists('storage_url')) {
    function storage_url(string $path = null):String
    {
        return !empty($path) ? url('storage/' . $path) : '';
    }
}

if (!function_exists('delete_file')) {
    function delete_file($to_path)
    {
        $path = rtrim(config('files.storage_file_path'), '/').'/'.ltrim($to_path, '/');
        if (file_exists($path)) {
             unlink($path);
            return true;
        }
        return false;
    }
}

if (!function_exists('remove_folder')) {
    function remove_folder(string $path)
    {
        if (is_dir($path)) {
            return rmdir($path);
        }
        return false;
    }
}



if (!function_exists('storageToPath')) {   // to path
    function storageToPath(string $path = ''): string
    {
        $base = rtrim(config('files.storage_file_path'), '/\\');
        return $base . '/' . ltrim($path, '/\\');
    }
}



if (!function_exists('store_file')) {
    function store_file(array $from,string $to):bool|string
    {
     
        if (isset($from['tmp_name'])) {
            $to_path = '/'.ltrim($to,'/');
         
            $path = config('files.storage_file_path').$to_path;
        
            $ex_path = explode('/' , $path);
            
            $end_file = end($ex_path);
       
            $check_path = str_replace($end_file,'',$path);
            
            if (!is_dir($check_path)) {
                mkdir($check_path, 0777, true);
            }
            move_uploaded_file($from['tmp_name'], $path);
            return $to;
        }
        return false;
    }
// function store_file(array $from, string $to): bool|string
// {
//     if (!isset($from['tmp_name']) || !is_uploaded_file($from['tmp_name'])) {
//         return false;
//     }

//     // نخزن في public/uploads
//   $public_root = __DIR__ . '/../../storage/files';

//     $to_path = '/' . ltrim($to, '/');
//     $path = $public_root . $to_path;

//     // إنشاء الفولدرات لو مش موجودة
//     $dir = dirname($path);
//     if (!is_dir($dir)) {
//         mkdir($dir, 0777, true);
//     }

//     if (move_uploaded_file($from['tmp_name'], $path)) {
//         // نخزن المسار النسبي اللي يبدأ من /uploads
//        return '/PROGECT1/storage/files' . $to_path;
//     }

//     return false;
// }


}

if (!function_exists('file_ext')) {
    function file_ext(array $file_name):array
    {
        if (!empty($file_name['name'])) {
            $fext = explode('.', $file_name['name']);
            $file_ext = end($fext);
            $hash_name = md5(10) .rand(000,999). '.' . $file_ext;
            return [
                'name' => $file_name['name'],
                'hash_name' => $hash_name,
                'ext' => $file_ext,
            ];
        } else {
            return [
                'name' => '',
                'hash_name' => '',
                'ext' => '',
            ];
        }
    }
}
