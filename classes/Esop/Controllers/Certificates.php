<?php

namespace Esop\Controllers;
use \Main\DatabaseTable;
use \Main\Authentication;


class Certificates
{
  private $authorsTable;
    private $articlesTable;
    private $authentication;

    public function __construct(DatabaseTable $articlesTable, DatabaseTable $authorsTable, Authentication $authentication)
    {
        $this->articlesTable = $articlesTable;
        $this->authorsTable = $authorsTable;
        $this->authentication = $authentication;
    }

    public function list()
    {
        $result = $this->articlesTable->findAll();

        $articles = [];
        foreach ($result as $article) {
            $author = $this->authorsTable->findById($article['authorId']);

            $articles[] = [
                'id' => $article['id'],
                'date' => $article['date'],
                'topic' => $article['topic'],
                'articleText' => $article['articleText'],
                'authorId'=>$article['authorId']
                
               
            ];
        }


        $title = 'Article list';

        $totalArticles = $this->articlesTable->total();

        $author = $this->authentication->getUser();

        return [
                'template' => 'articles.html.php',
                'title' => $title,
                'variables' => [
                    'totalArticles' => $totalArticles,
                    'articles' => $articles,
                    'userId' => $author['id'] ?? null
                ]
            ];
    }

    public function pics()
    {
        $title = 'Certificates';
        $pic = "/img/headpic.jpg";

        return ['template' => 'ulimgallery.html.php', 'title' => $title,
         'pic' => $pic];
    }
    
    
    public function aboutme()
    {
        $title = 'About me';
        $pic = "/img/headpic.jpg";

        return ['template' => 'aboutme.html.php', 'title' => $title,
         'pic' => $pic];
    }

    public function delete()
    {

        $author = $this->authentication->getUser();

        $article = $this->articlesTable->findById($_POST['id']);

        if ($article['authorId'] != $author['id']) {
            return;
        }

        $this->articlesTable->delete($_POST['id']);

        header('location: /article/list');
    }
    public function saveEdit()
    {
        $author = $this->authentication->getUser();

        if (isset($_GET['id'])) {
            $article = $this->articlesTable->findById($_GET['id']);

            if ($article['authorId'] != $author['id']) {
                return;
            }
        }

        $article = $_POST['article'];
        $article['date'] = new \DateTime();
        $article['authorId'] = $author['id'];

        $this->articlesTable->save($article);

        header('location: /article/list');
    }

    public function edit()
    {
        $author = $this->authentication->getUser();

        if (isset($_GET['id'])) {
            $article = $this->articlesTable->findById($_GET['id']);
        }

        $title = 'Edit article';

        return [
            'template' => 'editarticle.html.php',
            'title' => $title,
            'variables' => [
                'article' => $article ?? null,
                'userId' => $author['id'] ?? null
            ]
        ];
    }   
    
}
