<?php

namespace Esop\Controllers;
use \Main\DatabaseTable;
use Main\Authentication;

class Pics
{
    
    private $picTable;
    private $authentication;
    

    public function __construct(DatabaseTable $picTable, Authentication $authentication)
    {
        $this->picTable = $picTable;      
        $this->authentication = $authentication;
    }

    public function list()
    {
        $result = $this->picTable->findAll();

        $pics = [];
        foreach ($result as $pic) {
            $pics[] = [
                'id' => $pic['id'],
                'name'=>$pic['name'],
                'image' => $pic['image']
            ];
        }

        $title = 'Certificates list';
        $pic = "/img/cambridge.jpg";
        $totalpics = $this->picTable->total();
         $author = $this->authentication->getUser();

        return [
                'template' => 'pics.html.php',
                'title' => $title,
                'pic'=>$pic,
                'variables'=>[
                    'totalpics'=>$totalpics, 'pics'=>$pics, 'userId'=>$author['id']?? null
                ]                
            ];
    }
     
    public function adapic(){
        $title = 'Add a pic';
        return ['template' => 'adapic.html.php',
                'title' => $title,];
    }
    

    public function delete()
    {
        $this->picTable->delete($_POST['id']);

        header('location: /pics/list');
    }
    public function saveEdit()
    {
      

        $pic = $_POST['pic'];        

        $this->picTable->save($pic);

        header('location: /pics/list');
        
    }

    public function edit()
    {
        

        if (isset($_GET['id'])) {
            $pic = $this->picTable->findById($_GET['id']);
        }

        $title = 'Edit pic';

        return [
            'template' => 'picEdit.html.php',
            'title' => $title,            
            'variables' => [
                'pic' => $pic ?? null,                
            ]
        ];
    }

   
    
}
