<?php

namespace Esop;

class EsopRoutes implements \Main\Routes
{
private $authorsTable;
private $articlesTable;
private $authentication;
private $eventsTable;
private $examssTable;
private $certificatesTable;
private $wordTable;
private $sptransTable;
private $categoriesTable;



public function __construct()
{
include __DIR__ . '/../../includes/DatabaseConnection.php';


$this->articlesTable = new \Main\DatabaseTable($pdo, 'article', 'id');
$this->sptransTable = new \Main\DatabaseTable($pdo, 'sptrans', 'id');
$this->wordTable = new \Main\DatabaseTable($pdo, 'vocabulary', 'id');
$this->certificatesTable = new \Main\DatabaseTable($pdo, 'certificate_images', 'id');
$this->eventsTable = new \Main\DatabaseTable($pdo, 'events', 'id');
$this->examsTable = new \Main\DatabaseTable($pdo, 'exams', 'id');
$this->authorsTable = new \Main\DatabaseTable($pdo, 'author', 'id');
$this->authentication = new \Main\Authentication($this->authorsTable, 'email', 'password');
$this->categoriesTable = new \Main\DatabaseTable($pdo, 'category', 'id');

}

public function getRoutes(): array
{
$articleController = new \Esop\Controllers\Article($this->articlesTable, $this->authorsTable, $this->authentication);
$sptransController = new \Esop\Controllers\Sptrans($this->sptransTable, $this->authentication);
$wordController = new \Esop\Controllers\Vocabulary($this->wordTable, $this->authorsTable, $this->categoriesTable, $this->authentication);
$certificatesController = new \Esop\Controllers\Certificates($this->certificatesTable,$this->authentication);
$eventsController = new \Esop\Controllers\Events($this->eventsTable, $this->authentication);		
$examsController = new \Esop\Controllers\Exams($this->examsTable, $this->authentication);		
$authorController = new \Esop\Controllers\Register($this->authorsTable);
$loginController = new \Esop\Controllers\Login($this->authentication);
$categoryController = new \Esop\Controllers\Category($this->categoriesTable);

$routes = [
'' => ['GET' => [ 'controller' => $articleController, 	'action' => 'home']],

'author/register' => ['GET' => ['controller' => $authorController,'action' => 'registrationForm'],
'POST' => ['controller' => $authorController, 'action' => 'registerUser'],'login' => true],
'author/success' => ['GET' => ['controller' => $authorController,'action' => 'success']],

'article/list' => ['GET' => ['controller' => $articleController,'action' => 'list']],
'article/delete' => ['POST' => ['controller' => $articleController,	'action' => 'delete'], 'login' => true],
'article/edit' => ['POST' => ['controller' => $articleController,'action' => 'saveEdit'],
				'GET' => ['controller' => $articleController,'action' => 'edit'],'login' => true ],

'login/error' => ['GET' => ['controller' => $loginController, 'action' => 'error']],
'login/success' => ['GET' => ['controller' => $loginController,	'action' => 'success' ]],
'login' => ['GET' => ['controller' => $loginController,	'action' => 'loginForm'	],
	'POST' => ['controller' => $loginController,'action' => 'processLogin']],

'filemanager' => ['GET' => [ 'controller' => $certificatesController, 	'action' => 'filemanager']],	

'certificates/list' => ['GET' => [ 'controller' => $certificatesController, 	'action' => 'list']],			
'certificate/delete' => ['POST' => [ 'controller' => $certificatesController, 	'action' => 'delete'],'login' => true],
'certificate/edit' => ['POST'=> ['controller' => $certificatesController, 'action' => 'saveEdit'],
				'GET'=> ['controller' => $certificatesController, 'action' => 'edit'], 'login' => true],

'logout' => ['GET' => ['controller' => $loginController,'action' => 'logout']],

'certificates/aboutme' => ['GET' => [ 'controller' => $certificatesController, 	'action' => 'aboutme']],

'events/list' => ['GET'=> ['controller' => $eventsController, 'action' => 'list'],],
'events/delete' => ['POST'=> ['controller' => $eventsController, 'action' => 'delete'],'login' => true],
'events/edit' => ['POST'=> ['controller' => $eventsController, 'action' => 'saveEdit'],
				'GET'=> ['controller' => $eventsController, 'action' => 'edit'], 'login' => true],

'exams/list' => ['GET'=> ['controller' => $examsController, 'action' => 'list'],],
'exams/delete' => ['POST'=> ['controller' => $examsController, 'action' => 'delete'],'login' => true],
'exams/edit' => ['POST'=> ['controller' => $examsController, 'action' => 'saveEdit'],
				'GET'=> ['controller' => $examsController, 'action' => 'edit'], 'login' => true],

'word/list' => ['GET'=> ['controller' => $wordController, 'action' => 'list'],],
'word/delete' => ['POST'=> ['controller' => $wordController, 'action' => 'delete'],'login' => true],
'word/edit' => ['POST'=> ['controller' => $wordController, 'action' => 'saveEdit'],
			'GET'=> ['controller' => $wordController, 'action' => 'edit'], 'login' => true],

'contacts' => ['GET'=> ['controller' => $articleController, 'action' => 'contacts'],],

'category/edit' => [ 'POST' => ['controller' => $categoryController, 'action' => 'saveEdit' ],
                      'GET' => ['controller' => $categoryController, 'action' => 'edit' ], 'login' => true ],
'category/list' => ['GET' => ['controller' => $categoryController,'action' => 'list'],'login' => true],
'category/delete' => [ 'POST' => ['controller' => $categoryController, 'action' => 'delete' ],'login' => true],

'sptrans/edit' => [ 'POST' => ['controller' => $sptransController, 'action' => 'saveEdit' ],
                      'GET' => ['controller' => $sptransController, 'action' => 'edit' ], 'login' => true ],
'sptrans/list' => ['GET' => ['controller' => $sptransController,'action' => 'list'],'login' => true],
'sptrans/delete' => [ 'POST' => ['controller' => $sptransController, 'action' => 'delete' ],'login' => true],

];

return $routes;
}

public function getAuthentication(): \Main\Authentication
{
return $this->authentication;
}
}
