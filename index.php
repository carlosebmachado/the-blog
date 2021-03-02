<?php

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
