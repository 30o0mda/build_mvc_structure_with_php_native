<?php


if (!function_exists('validation')) {
    function validation(array $attributes, array $trans = null, $http_header = 'redirect', $back = null)
    {
        $validation = [];
        $values = [];
        foreach ($attributes as $attribute => $rules) {
            $value = request($attribute);
            $values[$attribute] = $value;
            // if ($attribute == 'icon') {
            // }
            // global $validation;
            $attribute_validate = [];
            $final_attribute = isset($trans[$attribute]) ? $trans[$attribute] : $attribute;
            foreach (explode('|', $rules) as $rule) {
                if ($rule == 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $attribute_validate[] = str_replace(':attribute', $final_attribute, trans('validation.email'));
                } elseif ($rule == 'required' && (is_null($value) || empty($value) || (isset($value['tmp_name']) && empty($value['tmp_name'])))) {
                    $attribute_validate[] = str_replace(':attribute', $final_attribute, trans('validation.required'));
                } elseif ($rule == 'nullable' && (is_null($value) || empty($value) || (isset($value['tmp_name']) && empty($value['tmp_name'])))) {
                    // do nothing
                } elseif ($rule == 'integer' && !filter_var((int) $value, FILTER_VALIDATE_INT)) {
                    $attribute_validate[] = str_replace(':attribute', $final_attribute, trans('validation.integer'));
                } elseif ($rule == 'string' && !is_string($value)) {
                    $attribute_validate[] = str_replace(':attribute', $final_attribute, trans('validation.string'));
                } elseif ($rule == 'numeric' && !is_numeric($value)) {
                    $attribute_validate[] = str_replace(':attribute', $final_attribute, trans('validation.numeric'));
                } elseif ($rule == 'image' && (!isset($value['tmp_name']) || empty($value['tmp_name']) || getimagesize($value['tmp_name']) === false)) {
                    $attribute_validate[] = str_replace(':attribute', $final_attribute, trans('validation.image'));
                } elseif (preg_match('/^unique:/i', $rule)) {
                    $ex_rule = explode(':', $rule);
                    if (count($ex_rule) > 1 && isset($ex_rule[1])) {
                        $get_unique_info = explode(',', $ex_rule[1]);
                        $table = $get_unique_info[0];
                        $column = isset($get_unique_info[1]) ? $get_unique_info[1] : $attribute;
                        if (isset($get_unique_info[2])) {
                            $sql = "where " . $column . " = '" . $value . "' and id !=' " . $get_unique_info[2] . "'";
                        } else {
                            $sql = "where " . $column . " = '" . $value . "' and id !=' " . $get_unique_info[2] . "'";
                        }
                        $check_unique_db = db_first($table, $sql);
                        if (!empty($check_unique_db)) {
                            $attribute_validate[] = str_replace(':attribute', $final_attribute, trans('validation.unique'));
                        }
                    }
                } elseif (preg_match('/^in:/i', $rule)) {
                    $ex_rule = explode(':', $rule);
                    if (isset($ex_rule[1])) {
                        $ex_in = explode(',', $ex_rule[1]);
                        if (!empty($ex_in) && is_array($ex_in) && !in_array($value, $ex_in)) {
                            $attribute_validate[] = str_replace(':attribute', $final_attribute, trans('validation.in'));
                        }
                    }
                } elseif (preg_match('/^exists:/i', $rule)) {
                    $ex_rule = explode(':', $rule);
                    if (count($ex_rule) > 1 && isset($ex_rule[1])) {
                        $get_exists_info = explode(',', $ex_rule[1]);
                        $table = $get_exists_info[0];
                        $column = isset($get_exists_info[1]) ? $get_exists_info[1] : $attribute;
                        if (isset($get_exists_info[2])) {
                            $sql = "where " . $column . " = '" . $value .  "'";
                        } else {
                            $sql = "where id='" . $value .  "'";
                        }
                        $check_exists_db = db_first($table, $sql);
                        if (empty($check_exists_db)) {
                            $attribute_validate[] = str_replace(':attribute', $final_attribute, trans('validation.exists'));
                        }
                    }
                }
            }
            if (!empty($attribute_validate) && is_array($attribute_validate) && count($attribute_validate) > 0) {
                $validation[$attribute] = $attribute_validate;
            }
        }
        if (count($validation) > 0) {
            if ($http_header == 'redirect') {
                session('old', json_encode($values));
                session('errors', json_encode($validation));
                if (!is_null($back)) {
                    redirect($back);
                } else {
                    back();
                }
            } elseif ($http_header == 'api') {
                header('content-type: application/json; charset=utf-8');
                http_response_code(422);
                echo json_encode($validation, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
        } else {
            return $values;
        }
    }
}



if (!function_exists('any_error')) {
    function any_error($offset = null)
    {
        $array = json_decode(session('errors'), true);
        if (isset($array[$offset])) {
            $text = $array[$offset];
            if (!empty($array)) {
                session('errors', json_encode($array));
            }
            return is_array($text) ? $text : [];
        } elseif (!empty($array) && count($array) > 0) {
            return $array;
        } else {
            return [];
        }
    }
}


if (!function_exists('all_errors')) {
    function all_errors()
    {
        $all_errors = [];
        foreach (any_error() as $errors) {
            foreach ($errors as $error) {
                $all_errors[] = $error;
            }
        }
        return $all_errors;
    }
}

if (!function_exists('get_error')) {
    function get_error($offset)
    {
        $error = '<ul>';
        foreach (any_error($offset) as $error_string) {
            if (is_string($error_string)) {
                $error .= '<li>' . $error_string . '</li>';
            }
        }
        $error .= '<ul>';
        return !empty(any_error($offset)) ? $error : null;
    }
}

if (!function_exists('end_errors')) {
    function end_errors()
    {
        session_flash('errors');
    }
}


if (!function_exists('old')) {
    function old($request)
    {
        $old_values = json_decode(session('old'), true);
        if (is_array($old_values) && !empty($old_values) && in_array($request, array_keys($old_values))) {
            return $old_values[$request];
        } else {
            return '';
        }
    }
}
