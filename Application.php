<?php

use controllers\
{
	AboutController,
	AdminAboutController,
	AdminPostController,
	AdminMessageController,
	AdminCommentController,
	AdminController,
	ContactController,
	HomeController,
	LoginController,
	PostController,
	TestController
};

class Application
{
	//public const DEFAULT_PAGE = 'Home';

	public function run()
	{
		$aboutController = new AboutController();
		$adminAboutController = new AdminAboutController();
		$adminPostController = new AdminPostController();
		$adminMessageController = new AdminMessageController();
		$adminCommentController = new AdminCommentController();
		$adminController = new AdminController();
		$contactController = new ContactController();
		$homeController = new HomeController();
		$loginController = new LoginController();
		$postController = new PostController();
		$testController = new TestController();

		Router::get('/about', function() use ($aboutController) {
			$aboutController->index();
		});

		Router::get('/admin/about', function() use ($adminAboutController) {
			$adminAboutController->index();
		});

		Router::get('/admin/posts', function() use ($adminPostController) {
			$adminPostController->index();
		});

		Router::get('/admin/messages', function() use ($adminMessageController) {
			$adminMessageController->index();
		});

		Router::get('/admin/commentaries', function() use ($adminCommentController) {
			$adminCommentController->index();
		});

		Router::get('/admin/dashboard', function() use ($adminController) {
			$adminController->index();
		});

		 Router::get('/admin', function() {
		 	header('Location: admin/dashboard');
		 });

		Router::get('/contact', function() use ($contactController) {
			$contactController->index();
		});

		Router::get('/', function() use ($homeController) {
			$homeController->index();
		});

		Router::get('/home', function() use ($homeController) {
			$homeController->index();
		});

		Router::get('/login', function() {
			header('Location: admin/login');
		});

		Router::get('/admin/login', function() use ($loginController) {
			$loginController->index();
		});
		
		Router::get('/post', function() use ($postController) {
			$postController->index();
		});

		Router::get('/test', function() use ($testController) {
			$testController->index();
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
