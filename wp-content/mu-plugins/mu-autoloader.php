<?php
/**
 * Plugin Name: Mustard Auto Loader
 * Plugin URI:  https://themustardagency.com
 * Description: Autoloads all critical plugins.
 * Author:      Alex Woollam
 * Author URI:  https://www.themustardagency.com
 * Version:     1.0
 * Licence:     MIT
 */
$dirs = glob(dirname(__FILE__) . '/*' , GLOB_ONLYDIR);

foreach($dirs as $dir) {
    if(file_exists($dir . DIRECTORY_SEPARATOR . basename($dir) . ".php")) {
        require($dir . DIRECTORY_SEPARATOR . basename($dir) . ".php");
    }
}
