<?php
if (!function_exists('session')){
    function session(string $key, mixed $value=null):mixed
    {
        if (!is_null($value)) {
            $_SESSION[$key] = encrypt($value);
        }
        return isset($_SESSION[$key])?decrypt($_SESSION[$key]):'';
    }

}

// if (!function_exists('session')) {
//     function session(string $key, mixed $value = null): mixed
//     {
   

//         if (!is_null($value)) {
//             $_SESSION[$key] = encrypt($value);  
//             return true;
//         }

//         if (isset($_SESSION[$key])) {
//             return decrypt($_SESSION[$key]);  
//         }

//         return '';
//     }
// }


if (!function_exists('session_has')){
    function session_has(string $key):mixed
    {
        return isset($_SESSION[$key]);
    }

}

if (!function_exists('session_flash')){
    function session_flash(string $key, mixed $value=null):mixed
    {
        if (!is_null($value)) {
           $_SESSION[$key] = $value;
        }
        $session = isset($_SESSION[$key])?decrypt($_SESSION[$key]):'';
        session_forget($key);
        return $session;
    }

}
// encrypt($_SESSION[$key]);

if (!function_exists('session_forget')){
    function session_forget(string $key)
    {
        if(isset($_SESSION[$key]))
            unset($_SESSION[$key]);
    }

}

if (!function_exists('session_delete_all')){
    function session_delete_all()
    {
        session_destroy();
    }

}