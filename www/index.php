<?php
// Load Global Defines
require_once dirname(__FILE__) . '/../config/defines.php';

// Init Parameter Manager
require_once JEFF_BASE_DIR . 'app/model/ParamManager.php';
$param_manager = new ParamManager();

// Load Controller Parent Class
require_once JEFF_BASE_DIR . 'app/controller/Controller.php';

// Check URL path
$url_path = $param_manager->getParam('url_path', '');

// Determine course of action based on URL path
$action = null;
switch($url_path) {

case '':
    require_once JEFF_BASE_DIR . 'app/controller/page/Top.php';
    $action = new Page_Top();
    break;

case 'development':
    // Page about development
    echo('Development page');
    exit;
    break;

case 'resume':
    // Resume top page
    echo('resume');
    exit;
    break;

default:
    // Invalid path, show 404 page
    echo('404');
    exit;
    break;
}

// Execute action
$action->init();
$action->checkParams($param_manager);
$action->perform();
