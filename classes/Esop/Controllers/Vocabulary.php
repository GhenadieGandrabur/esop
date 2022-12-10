<?php

namespace Esop\Controllers;
use \Main\DatabaseTable;
use \Main\Authentication;


class Vocabulary
{
  private $authorsTable;
    private $vocabularyTable;
    private $categoriesTable;
    private $authentication;
    private $wordCategoryTable;


    public function __construct(DatabaseTable $vocabularyTable, DatabaseTable $authorsTable,  DatabaseTable $categoriesTable, Authentication $authentication, DatabaseTable $wordCategoryTable)
    {
        $this->vocabularyTable = $vocabularyTable;
        $this->authorsTable = $authorsTable;
        $this->categoriesTable = $categoriesTable;
        $this->authentication = $authentication;
        $this->wordCategoryTable = $wordCategoryTable;
    }

    public function list()
    {
        $categories = $this->categoriesTable->findAll();
        if(!isset($_GET['categoryId'])){
            $words = $this->vocabularyTable->findAll();
        }else{
            $wordCategories = $this->wordCategoryTable->find('categoryId',$_GET['categoryId']);
            if(empty($wordCategories)){
                $wordCategories=[];
            }
            $words = [];
            foreach($wordCategories as $wordCategory){
            $words[] = $this-> vocabularyTable->findById($wordCategory->wordId);
    
            }
        }

    

     


        $title = 'Vocabulary';
        $pic = '/img/cambridge.jpg';

        $totalwords = $this->vocabularyTable->total();
     

        $author = $this->authentication->getUser();

        return [
                'template' => 'words.html.php',
                'title' => $title,
                'pic' => $pic,
              
                'variables' => [
                    'totalwords' => $totalwords,
                    'words' => $words,
                    'userId' => $author->id ?? null,
                    'categories'=>$categories,

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
        foreach($_POST['category'] as $category){
          $this->wordCategoryTable->save(['wordId'=>$word['id'],'categoryId'=>$category]);      
        }
        header('location: /word/list');
    }

    public function edit()
    {
        $author = $this->authentication->getUser();
        $categories = $this->categoriesTable->findAll();

        if (isset($_GET['id'])) {
            $word = $this->vocabularyTable->findById($_GET['id']);
        }

        $title = 'Edit word';
         $wordCategories = $this->wordCategoryTable->find('wordId',$_GET['id']);
        if(empty($wordCategories)){
            $wordCategories=[];
        }
        $categoriesId = [];
        foreach($wordCategories as $wordCategory){
            $categoriesId[] = $wordCategory->categoryId;

        }

        return [
            'template' => 'editword.html.php',
            'title' => $title,
            'variables' => [
                'word' => $word ?? null,
                'userId' => $author->id ?? null,
                'categories' => $categories,
                'categoriesId' => $categoriesId
            ]
        ];
    }   
    
}
