<?php

namespace Esop\Controllers;
use \Main\DatabaseTable;
use \Main\Authentication;


class Words
{
    private $authorsTable;
    private $wordTable;
    private $categoriesTable;
    private $authentication;
    private $wordCategoryTable;


    public function __construct(DatabaseTable $wordTable, DatabaseTable $authorsTable,  DatabaseTable $categoriesTable, Authentication $authentication, DatabaseTable $wordCategoryTable)
    {
        $this->wordTable = $wordTable;
        $this->authorsTable = $authorsTable;
        $this->categoriesTable = $categoriesTable;
        $this->authentication = $authentication;
        $this->wordCategoryTable = $wordCategoryTable;
    }

    public function list()
    {            
        $categories = $this->categoriesTable->findAll();
        if(!isset($_GET['categoryId'])){
            $words = $this->wordTable->findAll();
        }else{
            $wordCategories = $this->wordCategoryTable->find('categoryId',$_GET['categoryId']);
           
            if(empty($wordCategories)){
                $wordCategories=[];
            }
            $words = [];
            foreach($wordCategories as $wordCategory){
            $words[] = $this-> wordTable->findById($wordCategory->wordId);    
            }
        }
        $title = 'Vocabulary';
        $pic = '/img/cambridge.jpg';

        $totalwords = $this->wordTable->total();     

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
        $this->wordTable->delete($_POST['id']);

        header('location: /word/list');
    }
    public function saveEdit()
    {

       /* if (isset($_GET['id'])) {
            $word = $this->wordTable->findById($_GET['id']);         
        }*/

        
        $word = $_POST['word'];
        $this->wordCategoryTable->deleteWhere('wordId', $word['id']);
        
        
        $this->wordTable->save($word);
        
        foreach($_POST['category'] as $category){

          $this->wordCategoryTable->save(['wordId'=>$word['id'],'categoryId'=>$category]);      
        }
        header('location: /word/list');
    }

    public function edit()
    {
        
        $categories = $this->categoriesTable->findAll();

        if (isset($_GET['id'])) {
            $word = $this->wordTable->findById($_GET['id']);
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
