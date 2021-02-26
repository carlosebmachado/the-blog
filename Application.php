<?php

use controllers\
{
	AboutController,
	AdminAboutController,
	AdminController,
	ContactController,
	HomeController,
	LoginController,
	PostController
};

class Application
{
	//public const DEFAULT_PAGE = 'Home';

	public function run()
	{
		$aboutController = new AboutController();
		$adminAboutController = new AdminAboutController();
		$AdminController = new AdminController();
		$ContactController = new ContactController();
		$HomeController = new HomeController();
		$LoginController = new LoginController();
		$PostController = new PostController();

		Router::get('/about', function() use ($aboutController) {
			$aboutController->index();
		});

		Router::get('/admin/about', function() use ($adminAboutController) {
			$adminAboutController->index();
		});

		Router::get('/admin/dashboard', function() use ($AdminController) {
			$AdminController->index();
		});

		 Router::get('/admin', function() use ($AdminController) {
		 	header('Location: admin/dashboard');
		 });

		Router::get('/contact', function() use ($ContactController) {
			$ContactController->index();
		});

		Router::get('/', function() use ($HomeController) {
			$HomeController->index();
		});

		Router::get('/home', function() use ($HomeController) {
			$HomeController->index();
		});

		Router::get('/admin/login', function() use ($LoginController) {
			$LoginController->index();
		});
		
		Router::get('/post', function() use ($PostController) {
			$PostController->index();
		});

		// if (isset($_GET['url']))
		// {
		// 	$url = explode('/', $_GET['url']);
		// 	$class = 'controllers\\'.ucfirst($url[0]).'Controller';
		// }
		// else
		// {
		// 	$class = 'controllers\\'.self::DEFAULT_PAGE.'Controller';
		// 	$url[0] = self::DEFAULT_PAGE;
		// }

		// $controller = new $class();
		// $controller->index();
	}
}
