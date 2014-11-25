<?php
// Load Global Defines
require_once dirname(__FILE__) . '/../config/defines.php';

// Init Parameter Manager
require_once JEFF_BASE_DIR . 'app/model/ParamManager.php';
$param_manager = new ParamManager();

// Check URL path
$url_path = $param_manager->getParam('url_path', '');
echo('url_path="' . $url_path . '"<br><br>');

// Determine course of action based on URL path
switch($url_path) {

case '':
    // Top page
    echo('Top page');
    break;

case 'development':
    // Page about development
    echo('Development page');
    break;

case 'resume':
    // Resume top page
    echo('resume');
    break;

default:
    // Invalid path, show 404 page
    echo('404');
    break;
}
