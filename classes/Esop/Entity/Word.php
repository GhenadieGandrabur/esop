<?php
namespace Esop\Entity;

class Word
{
    public $id;
    public $en;
    public $definition;
    public $ro;
    public $ru;
    private $wordCategoriesTable;

    public function __construct( \Main\DatabaseTable$wordCategoriesTable)
    {
        
        $this->wordCategoriesTable = $wordCategoriesTable;
    }
        
    public function addCategory($categoryId) {
		$wordCat = ['wordId' => $this->id, 'categoryId' => $categoryId];

		$this->wordCategoriesTable->save($wordCat);
	}

	public function hasCategory($categoryId) {
		$wordCategories = $this->wordCategoriesTable->find('wordId', $this->id);

		foreach ($wordCategories as $wordCategory) {
			if ($wordCategory->categoryId == $categoryId) {
				return true;
			}
		}
	}

	public function clearCategories() {
		$this->wordCategoriesTable->deleteWhere('wordId', $this->id);
	}
}
