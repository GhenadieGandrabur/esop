<?php

namespace Esop\Controllers;
use \Main\DatabaseTable;
use \Main\Authentication;


class Vocabulary
{
  private $authorsTable;
    private $vocabularyTable;
    private $authentication;

    public function __construct(DatabaseTable $vocabularyTable, DatabaseTable $authorsTable, Authentication $authentication)
    {
        $this->vocabularyTable = $vocabularyTable;
        $this->authorsTable = $authorsTable;
        $this->authentication = $authentication;
    }

    public function list()
    {
        $result = $this->vocabularyTable->findAll();

        $words = [];
        foreach ($result as $word) {
            

            $words[] = [
                'id' => $word['id'],
                'en' => $word['en'],
                'definition' => $word['definition'],
                'ro' => $word['ro'],
                'ru' => $word['ru'],
                'category'=>$word['category']              
            ];
        }


        $title = 'Vocabulary';
        $pic = '/img/cambridge.jpg';

        $totalwords = $this->vocabularyTable->total();
        $headerpic = "/img/headpic.jpg";

        $author = $this->authentication->getUser();

        return [
                'template' => 'words.html.php',
                'title' => $title,
                'pic' => $pic,
              
                'variables' => [
                    'totalwords' => $totalwords,
                    'words' => $words,
                    'userId' => $author['id'] ?? null
                ]
            ];
    }



    public function delete()
    {
        $this->vocabularyTable->delete($_POST['id']);

        header('location: /word/list');
    }
    public function saveEdit()
    {
        

        if (isset($_GET['id'])) {
            $word = $this->vocabularyTable->findById($_GET['id']);         
        }

        $word = $_POST['word'];       

        $this->vocabularyTable->save($word);

        header('location: /word/list');
    }

    public function edit()
    {
        $author = $this->authentication->getUser();

        if (isset($_GET['id'])) {
            $word = $this->vocabularyTable->findById($_GET['id']);
        }

        $title = 'Edit word';

        return [
            'template' => 'editword.html.php',
            'title' => $title,
            'variables' => [
                'word' => $word ?? null,
                'userId' => $author['id'] ?? null
            ]
        ];
    }   
    
}