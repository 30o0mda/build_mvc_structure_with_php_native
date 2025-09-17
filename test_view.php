<?php

$path = '/home/techlaber/projects/build_mvc_structure_with_php_native/resources/views/front/home.php';

echo "Testing view file path:<br>";
echo "Path: $path<br>";

if (file_exists($path)) {
    echo "✅ File exists!";
} else {
    echo "❌ File NOT found!";
}
