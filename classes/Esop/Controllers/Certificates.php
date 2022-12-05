<?php

namespace Esop\Controllers;
use \Main\DatabaseTable;
use Main\Authentication;

class Certificates
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
        $certificates = $this->certificate_imagesTable->findAll();

/*$certificates = [];
        foreach ($result as $certificate) {
            $certificates[] = [
                'id' =>$certificate['id'],
                'certificate_src'=>$certificate['certificate_src'],
                'certificate_title' =>$certificate['certificate_title']
            ];
        }*/

        $title = 'Certificates list';
        $pic = "/img/cambridge.jpg";
        $totalcertificates = $this->certificate_imagesTable->total();
         $author = $this->authentication->getUser();

        return [
                'template' => 'certificates.html.php',
                'title' => $title,
                'pic'=>$pic,
                'variables'=>[
                    'totalcertificates'=>$totalcertificates, 'certificates'=>$certificates, 'userId'=>$author->id?? null
                ]                
            ];
    }


    
    
    public function aboutme()
    {
        $title = 'About me';
        $pic = "/img/headpic.jpg";

        return ['template' => 'aboutme.html.php', 'title' => $title,
         'pic' => $pic];
    }
    public function filemanager()
    {
        $title = 'File manager';
        $pic = "/img/headpic.jpg";

        return ['template' => 'filemanager.html.php', 'title' => $title,
         'pic' => $pic];
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
if (isset($_GET['id']))
{
$certificate = $this->certificate_imagesTable->findById($_GET['id']);
}

$title = 'Edit certificates!';

return [
'template' => 'certificateEdit.html.php',
'title' => $title,            
'variables' => ['certificate' => $certificate ?? null,]
];
}
}
