<?php

include_once 'libs/include/db.php';

function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT']."/quiz/_template/$name.php";
}

global $site_config;

$site_config = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/../db_config.json');

function get_config($key, $default = null)
{
    global $site_config;
    $array = json_decode($site_config, true);
    if (isset($array[$key])) {
        return $array[$key];
    }
    return $default;
}
