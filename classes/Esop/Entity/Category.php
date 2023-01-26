<?php
namespace Esop\Entity;

use Main\DatabaseTable;

class Category
{
    public $id;
    public $name;
    private $wordsTable;
    private $wordCategoriesTable;

    public function __construct(DatabaseTable $wordsTable, DatabaseTable $wordCategoriesTable) {
        $this->wordsTable = $wordsTable;
        $this->wordCategoriesTable = $wordCategoriesTable;
    }

    public function getJokes()
    {
        $jokeCategories = $this->wordCategoriesTable->
            find('categoryId', $this->id);

        $jokes = [];

        foreach ($jokeCategories as $wordCategory) {
            $word = $this->wordsTable->
                findById($wordCategory->wordId);
            if ($word) {
                $words[] = $word;
            }
        }

        return $words;
    }
}
