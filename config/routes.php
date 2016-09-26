<?php
/**
  * Determine the controller (action) to process
  * @param  string   URL path as received from Apache (see rewrite rule)
  * @return object   Class instantiation of controller (action) to be called
  */
function getMatchingController($url_path)
{
    switch($url_path) {

    // About Me
    case '':
    case 'top':
        require_once JEFF_BASE_DIR . 'app/controller/page/Top.php';
        return new Page_Top();

    case 'async/top':
        require_once JEFF_BASE_DIR . 'app/controller/async/Top.php';
        return new Async_Top();


    // Development
    case 'development':
        require_once JEFF_BASE_DIR . 'app/controller/page/Development.php';
        return new Page_Development();


    // Photography and Samples
    case 'photography':
        require_once JEFF_BASE_DIR . 'app/controller/page/Photography.php';
        return new Page_Photography();

    case 'photography/samples/olden-japan':
    case 'photography/samples/modern-japan':
    case 'photography/samples/natural-japan':
    case 'photography/samples/japan-at-night':
    case 'photography/samples/food-in-japan':
    case 'photography/samples/animals-in-japan':
        require_once JEFF_BASE_DIR . 'app/controller/page/photography/Samples.php';
        return new Page_Photography_Samples();

    case 'async/photography/samples':
        require_once JEFF_BASE_DIR . 'app/controller/async/photography/Samples.php';
        return new Async_Photography_Samples();


    // Translation
    case 'translation':
        require_once JEFF_BASE_DIR . 'app/controller/page/Translation.php';
        return new Page_Translation();


    // Get in Touch
    case 'contact':
        require_once JEFF_BASE_DIR . 'app/controller/page/Contact.php';
        return new Page_Contact();


    // No matching action
    default:
        return null;
    }
}
