<?php
/**
 * insert data in database
 * @param string $table
 * @param array $data
 * @return array The ID of the newly created record.
 */
if(!function_exists('db_create')){
    function db_create(string $table,array $data)
    {
        $sql = " INSERT INTO ".$table;
        $columns ='';
        $values = '';  
        foreach ($data as $key => $value) {
            $columns .= " `$key`,";
            $values .= "'".$value."',";
        }

        $columns = rtrim( $columns, ',');
        $values = rtrim( $values, ',');
        $sql .=  " ($columns) VALUES ($values)";
        mysqli_query($GLOBALS['connection'],$sql);
        $id = mysqli_insert_id($GLOBALS['connection']);
        $first = mysqli_query($GLOBALS['connection'],"select * from $table where id = ".$id);
        $data = mysqli_fetch_assoc($first);
        return $data;
    }
}

/**
 * update data in database
 * @param string $table
 * @param array $data
 * @param int $id
 * @return array The ID of the newly created record.
 */
if (!function_exists('db_update')) {
    function db_update(string $table, array $data, int $id)
    {
        $sql = " update ".$table." set "  ;
        $column_value ='';
        foreach ($data as $key => $value) {
            $column_value .= $key."='".$value."'  ,  ";
        }
        $column_value = rtrim( $column_value, '  ,  ');
        $sql .= $column_value. " where id = ".$id;
        echo $sql . "<br>";
        mysqli_query($GLOBALS['connection'],$sql);
        $first = mysqli_query($GLOBALS['connection'],"select * from $table where id = ".$id);
        $data = mysqli_fetch_assoc($first);
        return $data;
    }
}

/**
 * delete data in database
 * @param string $table
 * @param int $id
 */
if(!function_exists('db_delete')){
    function db_delete(string $table, int $id)
    {
    $query = mysqli_query($GLOBALS['connection'],"DELETE FROM " .$table. " WHERE id = $id");
    return $query;
    }
}

/**
 * fetch single row data in database
 * @param string $table
 * @param int $id
 */
if(!function_exists('db_find')){
    function db_find(string $table, int $id):mixed
    {
    $query = mysqli_query($GLOBALS['connection'],"SELECT * FROM " .$table. " WHERE id = $id");
    $result = mysqli_fetch_assoc($query);
    return $result;
    }
}



/**
 * search for a single row data in database
 * @param string $table
 * @param int $id
 */
if(!function_exists('db_first')){
    function db_first(string $table, string $query_str):mixed
    {
    $query = mysqli_query($GLOBALS['connection'],"SELECT * FROM " .$table." " .$query_str);
    $result = mysqli_fetch_assoc($query);
    return $result;
    }
}

/**
 * search for a multiple row data in database
 * @param string $table
 * @param int $id
 */
if(!function_exists('db_get')){
    function db_get(string $table, string $query_str): array
    {
    $query = mysqli_query($GLOBALS['connection'],"SELECT * FROM " .$table." " .$query_str);
    $num = mysqli_num_rows($query);
    $GLOBALS['query'] = $query;
    return [
        'num' => $num,
        'data' => $query
    ];
    }
}

/**
 * search for a multiple and pagination row data in database
 * @param string $table
 * @param int $id
 * @param string $query_str
 * @param int $limit
 * @return array
 */
if(!function_exists('render_paginate')){
    function render_paginate(int $total_page):string
    {
        $html = '<ul>';
        for ($i = 1; $i <= $total_page; $i++) {
            $html .= '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
        }
        $html .= '</ul>';
        return $html;
    }
  
}
if(!function_exists('db_paginate')){
    function db_paginate(string $table, string $query_str,int $limit =15,string $orderby = 'asc'):array
    {
        if(isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0){
            $Current_page = $_GET['page']-1;
        }else{
            $Current_page = 0;
        }

    $query_count = mysqli_query($GLOBALS['connection'],"SELECT COUNT(id)  FROM " .$table." " .$query_str);
    $count = mysqli_fetch_row($query_count);
    $total_record = $count[0];
    $start = $Current_page * $limit ;
    $total_page = ceil($total_record / $limit);
    if($Current_page >= $total_page){
        $start = $total_page + 1;
    }
    $query = mysqli_query($GLOBALS['connection'],"SELECT * FROM " .$table." " .$query_str." ORDER BY id ".$orderby." LIMIT {$start},{$limit}");
    $num = mysqli_num_rows($query);
    $GLOBALS['query'] = $query;
    return [
        'query' => $query,
        'num' => $num,
        'render' => render_paginate($total_page),
        'current_page' => $Current_page,
        'limit' => $limit
    ];
    }
}


