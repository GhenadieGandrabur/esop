<?php
namespace Esop\Entity;

class Word
{
    public $id;
    //public $authorId;
    //public $jokedate;
    //public $joketext;
    //private $authorsTable;
    //private $author;
    public $en;
    public $definition;
    public $ro;
    public $ru;
    private $wordCategoriesTable;

    public function __construct( \Main\DatabaseTable$jokeCategoriesTable)
    {
        
        $this->wordCategoriesTable = $jokeCategoriesTable;
    }
        
    public function addCategory($categoryId)
    {
        $wordCat = ['wordId' => $this->id, 'categoryId' => $categoryId];

        $this->wordCategoriesTable->save($wordCat);
    }
}
