<?php 
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

    // xamp folder /xampp/httpdocs
    // defined('SITE_ROOT' ? null : define('SITE_ROOT', DS . 'xampp'.DS. 'httdocs'));
    defined('SITE_ROOT') ? null : define('SITE_ROOT',  DS.'home'.DS.'ire'.DS.'projects'.DS.'ezra'.DS.'api');

    // Utils folder path
    defined('UTILS_PATH') ? null : define('UTILS_PATH', SITE_ROOT.DS.'utils');
    
    // Models folder path
    defined('MODELS_PATH') ? null : define('MODELS_PATH', SITE_ROOT.DS.'models');

    //load the config file
    require_once(SITE_ROOT.DS."backend-config.php");

    //load core classes 
    require_once(MODELS_PATH.DS."recipeModel.php");
    require_once(MODELS_PATH.DS."userModel.php");
    require_once(MODELS_PATH.DS."recipeModel.php");


?>