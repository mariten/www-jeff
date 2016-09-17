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
case 'top':
    require_once JEFF_BASE_DIR . 'app/controller/page/Top.php';
    $action = new Page_Top();
    break;
case 'async/top':
    require_once JEFF_BASE_DIR . 'app/controller/async/Top.php';
    $action = new Async_Top();
    break;


case 'development':
    require_once JEFF_BASE_DIR . 'app/controller/page/Development.php';
    $action = new Page_Development();
    break;


case 'photography':
    require_once JEFF_BASE_DIR . 'app/controller/page/Photography.php';
    $action = new Page_Photography();
    break;


case 'translation':
    require_once JEFF_BASE_DIR . 'app/controller/page/Translation.php';
    $action = new Page_Translation();
    break;


case 'contact':
    require_once JEFF_BASE_DIR . 'app/controller/page/Contact.php';
    $action = new Page_Contact();
    break;


default:
    // Invalid path, show 404 page
    echo('404');
    exit;
    break;
}

// Execute action
$action->init($url_path);
$error_messages = $action->checkParams($param_manager);
if(empty($error_messages)) {
    $action->perform();
} else {
    echo('Error');
}
