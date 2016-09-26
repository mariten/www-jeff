<?php
// Load Global Defines
require_once dirname(__FILE__) . '/../config/defines.php';
require_once JEFF_BASE_DIR . 'config/routes.php';

// Init Parameter Manager
require_once JEFF_BASE_DIR . 'app/model/ParamManager.php';
$param_manager = new ParamManager();

// Load Controller Parent Class
require_once JEFF_BASE_DIR . 'app/controller/Controller.php';

// Check URL path
$url_path = $param_manager->getParam('url_path', '');

// Determine which action to instantiate
$action = getMatchingController($url_path);
if(is_null($action)) {
    // No matching action - HTTP 404
    require_once JEFF_BASE_DIR . 'app/controller/error/NotFound.php';
    $action = new Error_NotFound();
}

// Check input params based on action
$action->init($param_manager);
$error_messages = $action->loadParams();
if(!empty($error_messages)) {
    // Param error - HTTP 400
    $action->httpBadRequest();
}

// Execute action
$action->perform();
