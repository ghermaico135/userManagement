<?php

spl_autoload_register('AutoLoader');

// function autoLoader($className)
// {
//     $path = 'assets/php';
//     $extension = '.class.php';

//     $fullPath = $path . $className . $extension;
//     return $fullPath;
// }

function AutoLoader($className)
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if (strpos($url, 'include')) {
        $path = '../assets/php';

    } else {
        $path = 'assets/php';
    }

    $extension = '.class.php';
    require_once $path . $className . $extension;

}
