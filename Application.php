<?php

class Application
{
	public const DEFAULT_PAGE = 'Home';

	public function run()
	{
		if (isset($_GET['url']))
		{
			$url = explode('/', $_GET['url']);
			$class = 'controllers\\'.ucfirst($url[0]).'Controller';
		}
		else
		{
			$class = 'controllers\\'.self::DEFAULT_PAGE.'Controller';
			$url[0] = self::DEFAULT_PAGE;
		}

		$view = 'views\\'.ucfirst($url[0]).'View';
		$model = 'models\\'.ucfirst($url[0]).'Model';

		$controller = new $class(new $view, new $model);
		$controller->index();
	}
}
