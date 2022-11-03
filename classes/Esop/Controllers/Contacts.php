<?php

namespace Esop\Controllers;
use \Main\DatabaseTable;
use Main\Authentication;



class Contacts
{
    
    private $contactTable;
    private $authentication;
    

    public function __construct(DatabaseTable $contactTable, Authentication $authentication)
    {
        $this->eventTable = $contactTable;      
        $this->authentication = $authentication;      
    }

    public function list()
    {
        $result = $this->eventTable->findAll();

$contacts = [];
        foreach ($result as $contact) {
    $contacts[] = [
                'id' => $contact['id'],
                'contact_text'=>$contact['contact_text']                
            ];
        }

        $title = 'Contacts';
        $pic = "/img/contact.jpg";
        
         $author = $this->authentication->getUser();

        return [
                'template' => 'contact.html.php',
                'title' => $title,
                'pic'=>$pic,
                'variables'=>[
                'contacts'=>$contacts, 'userId'=>$author['id']?? null
                ]                
            ];
    }

    

    public function delete()
    {
        $this->eventTable->delete($_POST['id']);

        header('location: /events/list');
    }
    public function saveEdit()
    {   

        if (isset($_GET['id'])) {
    $contact = $this->eventTable->findById($_GET['id']);

        }
$contact = $_POST['event'];       

        $this->eventTable->save($contact);

        header('location: /events/list');
    }

    public function edit()
    {
        

        if (isset($_GET['id'])) {
    $contact = $this->eventTable->findById($_GET['id']);
        }

        $title = 'Edit event';

        return [
            'template' => 'eventEdit.html.php',
            'title' => $title,            
            'variables' => [
                'event' => $contact ?? null,                
            ]
        ];
    }

   
    
}
