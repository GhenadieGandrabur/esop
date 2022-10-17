<?php

namespace Esop\Controllers;
use \Main\DatabaseTable;
use Main\Authentication;



class Events
{
    
    private $eventTable;
    private $authentication;
    

    public function __construct(DatabaseTable $eventTable, Authentication $authentication)
    {
        $this->eventTable = $eventTable;      
        $this->authentication = $authentication;      
    }

    public function list()
    {
        $result = $this->eventTable->findAll();

        $events = [];
        foreach ($result as $event) {
            $events[] = [
                'id' => $event['id'],
                'topic'=>$event['topic'],
                'eventtext' => $event['eventtext']
            ];
        }

        $title = 'event list';
        $pic = "/img/cambridge.jpg";
        $totalEvents = $this->eventTable->total();
         $author = $this->authentication->getUser();

        return [
                'template' => 'events.html.php',
                'title' => $title,
                'pic'=>$pic,
                'variables'=>[
                    'totalEvents'=>$totalEvents, 'events'=>$events, 'userId'=>$author['id']?? null
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
            $event = $this->eventTable->findById($_GET['id']);

        }

        $event = $_POST['event'];
        
        

        $this->eventTable->save($event);

        header('location: /events/list');
    }

    public function edit()
    {
        

        if (isset($_GET['id'])) {
            $event = $this->eventTable->findById($_GET['id']);
        }

        $title = 'Edit event';

        return [
            'template' => 'eventsEdit.html.php',
            'title' => $title,            
            'variables' => [
                'event' => $event ?? null,                
            ]
        ];
    }

   
    
}
