<?php

namespace Esop\Controllers;
use \Main\DatabaseTable;
use Main\Authentication;



class Exams
{
    
    private $examTable;
    private $authentication;
    

    public function __construct(DatabaseTable $examTable, Authentication $authentication)
    {
        $this->examTable = $examTable;      
        $this->authentication = $authentication;      
    }

    public function list()
    {
        $result = $this->examTable->findAll();

        $exams = [];
        foreach ($result as $exam) {
            $exams[] = [
                'id' => $exam['id'],
                'topic'=>$exam['topic'],
                'examtext' => $exam['examtext'],
                'examimage' => $exam['examimage']
            ];
        }

        $title = 'exam list';
        $pic = "/img/examsbanner.gif";
        $totalexams = $this->examTable->total();
         $author = $this->authentication->getUser();

        return [
                'template' => 'exams.html.php',
                'title' => $title,
                'pic'=>$pic,
                'variables'=>[
                    'totalexams'=>$totalexams, 'exams'=>$exams, 'userId'=>$author['id']?? null
                ]                
            ];
    }

    

    public function delete()
    {
        $this->examTable->delete($_POST['id']);

        header('location: /exams/list');
    }
    public function saveEdit()
    {   

        if (isset($_GET['id'])) {
            $exam = $this->examTable->findById($_GET['id']);

        }
        $exam = $_POST['exam'];       

        $this->examTable->save($exam);

        header('location: /exams/list');
    }

    public function edit()
    {
        

        if (isset($_GET['id'])) {
            $exam = $this->examTable->findById($_GET['id']);
        }

        $title = 'Edit exam';
        $pic = "/img/examsbanner.gif";

        return [
            'template' => 'examsEdit.html.php',
            'title' => $title,            
            'variables' => [
                'exam' => $exam ?? null,  'pic'=>$pic ?? null,               
            ]
        ];
    }    
}
