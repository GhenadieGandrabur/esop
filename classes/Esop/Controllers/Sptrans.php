<?php

namespace Esop\Controllers;
use \Main\DatabaseTable;
use Main\Authentication;



class Sptrans

{
    
    private $sptransTable;
    private $authentication;
    

    public function __construct(DatabaseTable $sptransTable, Authentication $authentication)
    {
        $this->sptransTable = $sptransTable;      
        $this->authentication = $authentication;      
    }

       public function home()
    {
        $title = 'Specialized translation';
        $pic = '/img/harvard.jpg';
    
        return ['template' => 'sptrans.html.php', 'title' => $title,'pic'=>$pic];
    }

    public function list()
    {
        $result = $this->sptransTable->findAll();

        $sptrans = [];
        foreach ($result as $sptran) {
            $sptrans[] = [
                'id' => $sptran['id'],
                'topic'=>$sptran['topic'],
                'sptrantext' => $sptran['sptrantext'],
                'sptranimage' => $sptran['sptranimage']
            ];
        }

        $title = 'sptran list';
        $pic = "/img/cambridge.jpg";
        $totalsptrans = $this->sptransTable->total();
         $author = $this->authentication->getUser();

        return [
                'template' => 'sptrans.html.php',
                'title' => $title,
                'pic'=>$pic,
                'variables'=>[
                    'totalsptrans'=>$totalsptrans, 'sptrans'=>$sptrans, 'userId'=>$author['id']?? null
                ]                
            ];
    }

    

    public function delete()
    {
        $this->sptransTable->delete($_POST['id']);

        header('location: /sptrans/list');
    }
    public function saveEdit()
    {   

        if (isset($_GET['id'])) {
            $sptran = $this->sptransTable->findById($_GET['id']);

        }
        $sptran = $_POST['sptran'];       

        $this->sptransTable->save($sptran);

        header('location: /sptrans/list');
    }

    public function edit()
    {
        

        if (isset($_GET['id'])) {
            $sptran = $this->sptransTable->findById($_GET['id']);
        }

        $title = 'Edit sptran';

        return [
            'template' => 'sptransEdit.html.php',
            'title' => $title,            
            'variables' => [
                'sptran' => $sptran ?? null,                
            ]
        ];
    }

   
    
}
