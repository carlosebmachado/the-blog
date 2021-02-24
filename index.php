<?php

define('ROOT_URL', basename(__DIR__));
define('DAY_SECONDS', 60*60*24);

$autoload = function ($class)
{
	if (file_exists($class.'.php'))
		include($class.'.php');
	else if (Config::SHOW_ERRORS)
		die('Couldn\'t load '.$class.'.');
};

spl_autoload_register($autoload);

$application = new Application();
$application->run();
