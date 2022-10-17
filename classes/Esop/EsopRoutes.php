<?php

namespace Esop;

class EsopRoutes implements \Main\Routes
{
	private $authorsTable;
	private $articlesTable;
	private $authentication;
	private $eventsTable;
	private $picsTable;

	public function __construct()
	{
		include __DIR__ . '/../../includes/DatabaseConnection.php';

		$this->articlesTable = new \Main\DatabaseTable($pdo, 'article', 'id');
		$this->picsTable = new \Main\DatabaseTable($pdo, 'images', 'id');
		$this->eventsTable = new \Main\DatabaseTable($pdo, 'events', 'id');
		$this->authorsTable = new \Main\DatabaseTable($pdo, 'author', 'id');
		$this->authentication = new \Main\Authentication($this->authorsTable, 'email', 'password');
	}

	public function getRoutes(): array
	{
		$articleController = new \Esop\Controllers\Article($this->articlesTable, $this->authorsTable, $this->authentication);
		$picController = new \Esop\Controllers\Pics($this->picsTable,$this->authentication);
		$eventsController = new \Esop\Controllers\Events($this->eventsTable, $this->authentication);
		$certificatesController = new \Esop\Controllers\Certificates($this->articlesTable, $this->authorsTable, $this->authentication);
		$authorController = new \Esop\Controllers\Register($this->authorsTable);
		$loginController = new \Esop\Controllers\Login($this->authentication);
		$routes = [
			'author/register' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'registrationForm'
				],
				'POST' => [
					'controller' => $authorController,
					'action' => 'registerUser'
				]
			],
			'author/success' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'success'
				]
			],
			'article/edit' => ['POST' => ['controller' => $articleController,'action' => 'saveEdit'],
				                'GET' => ['controller' => $articleController,'action' => 'edit'],'login' => true ],
			'article/delete' => [
				'POST' => [
					'controller' => $articleController,
					'action' => 'delete'
				],
				'login' => true
			],
			'article/list' => [
				'GET' => [
					'controller' => $articleController,
					'action' => 'list'
				]
			],
			'login/error' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'error'
				]
			],
			'login/success' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'success'
				]
			],
			'login' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'loginForm'
				],
				'POST' => [
					'controller' => $loginController,
					'action' => 'processLogin'
				]
			],
			'' => ['GET' => [ 'controller' => $articleController, 	'action' => 'home']],
			'pics/list' => ['GET' => [ 'controller' => $picController, 	'action' => 'list']],
			'pic/add' => ['GET' => [ 'controller' => $picController, 	'action' => 'adapic']],
			'pic/delete' => ['POST' => [ 'controller' => $picController, 	'action' => 'delete'],'login' => true],
			'pic/edit' => ['POST'=> ['controller' => $picController, 'action' => 'saveEdit'],
			                   'GET'=> ['controller' => $picController, 'action' => 'edit'], 'login' => true],
			'logout' => ['GET' => ['controller' => $loginController,'action' => 'logout']],
            'certificates/aboutme' => ['GET' => [ 'controller' => $certificatesController, 	'action' => 'aboutme']],
			'events/list' => ['GET'=> ['controller' => $eventsController, 'action' => 'list'],],
			'events/delete' => ['POST'=> ['controller' => $eventsController, 'action' => 'delete'],'login' => true],
			'events/edit' => ['POST'=> ['controller' => $eventsController, 'action' => 'saveEdit'],
			                   'GET'=> ['controller' => $eventsController, 'action' => 'edit'], 'login' => true],


		];

		return $routes;
	}

	public function getAuthentication(): \Main\Authentication
	{
		return $this->authentication;
	}
}
