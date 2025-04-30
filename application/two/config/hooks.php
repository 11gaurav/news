<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/
$hook['post_controller_constructor'] = array(
	'class'    => 'MyHookClass',  // Optional, only if you are using a class
	'function' => 'my_pre_system_function',  // Function name to call
	'filename' => 'myhook.php',  // Path to the hook file (if not using a class)
	'filepath' => 'hooks',  // Directory where the hook file is stored
	'params'   => array()  // Any parameters to pass to the function
);
