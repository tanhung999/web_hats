<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $allowedFields = ['name'];

    public function updateCategory($categoryId, $newCategoryName)
    {
        $this->set('name', $newCategoryName)
            ->where('category_id', $categoryId)
            ->update();
    }

    

}
