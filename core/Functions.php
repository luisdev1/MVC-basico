<?php

if (!function_exists('database')) {

    function database($key = null) {

        $app = include 'config/database.php';

        if ($app['environment'] === 'development') {

            return $app['connections']['development'][$key];
        }

        return $app['connections']['production'][$key];
    }

}

if (!function_exists('environment')) {

    function environment($key) {

        $app = include 'config/environment.php';

        return $app[$key];
    }

}

if (!function_exists('base_url')) {

    function base_url($path = null) {

        $url = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);

        if ($path == null) {
            return $url;
        }

        return $url . $path;
    }

}

if (!function_exists('back_url')) {

    function back_url($path = null) {

        if ($path == null) {
            return str_replace(basename(dirname($_SERVER['SCRIPT_FILENAME'])), '', base_url());
        }

        return str_replace(basename(dirname($_SERVER['SCRIPT_FILENAME'])), '', base_url($path));
    }

}