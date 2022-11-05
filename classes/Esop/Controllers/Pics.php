<?php

namespace Esop\Controllers;
use \Main\DatabaseTable;
use Main\Authentication;

class Pics
{
    
    private $certificate_imagesTable;
    private $authentication;
    

    public function __construct(DatabaseTable $certificate_imagesTable, Authentication $authentication)
    {
        $this->certificate_imagesTable = $certificate_imagesTable;      
        $this->authentication = $authentication;
    }

    public function list()
    {
        $result = $this->certificate_imagesTable->findAll();

        $certificates = [];
        foreach ($result as $certificate) {
            $pictures[] = [
                'id' =>$certificate['id'],
                'certificate_src'=>$certificate['certificate_src'],
                'certificate_title' =>$certificate['certificate_title']
            ];
        }

        $title = 'Certificates list';
        $pic = "/img/cambridge.jpg";
        $totalcertificates = $this->certificate_imagesTable->total();
         $author = $this->authentication->getUser();

        return [
                'template' => 'certificates.html.php',
                'title' => $title,
                'pic'=>$pic,
                'variables'=>[
                    'totalcertificates'=>$totalcertificates, 'certificates'=>$certificates, 'userId'=>$author['id']?? null
                ]                
            ];
    }
     
 
    

    public function delete()
    {
        $this->certificate_imagesTable->delete($_POST['id']);

        header('location: /certificates/list');
    }
    public function saveEdit()
    {
      

        $certificate = $_POST['certificate'];        

        $this->certificate_imagesTable->save($certificate);

        header('location: /certificates/list');
        
    }

    public function edit()
    {
        

        if (isset($_GET['id'])) {
            $picture = $this->certificate_imagesTable->findById($_GET['id']);
        }

        $title = 'Edit certificates';

        return [
            'template' => 'picEdit.html.php',
            'title' => $title,            
            'variables' => [
                'certificate' => $certificate ?? null,                
            ]
        ];
    }

   
    
}
