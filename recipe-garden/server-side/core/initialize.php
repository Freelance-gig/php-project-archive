<?php 
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

    // xamp folder /xampp/httpdocs
    // defined('SITE_ROOT' ? null : define('SITE_ROOT', DS . 'xampp'.DS. 'httdocs'));
    // defined('SITE_ROOT' ? null : define('SITE_ROOT',  DS.'home'.DS.'idris'.DS.'projects'.DS.'recipe-garden'.DS.'server-side');
    defined('SITE_ROOT') ? null : define('SITE_ROOT',  'C:'.DS.'xampp'.DS.'htdocs'.DS.'recipe-garden'.DS.'server-side');

    // includes folder path
    defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'include');
    
    // core folder path
    defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');

    //load the config file
    require_once(INC_PATH.DS."server-config.php");

    //load core classes 
    require_once(CORE_PATH.DS."collections.php");
    require_once(CORE_PATH.DS."users.php");
    require_once(CORE_PATH.DS."recipes.php");


?>