<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'Products';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['name', 'description', 'price', 'category_id', 'image_url'];
    public function updateProduct($productId, $data)
    {
        $this->set($data)
            ->where('product_id', $productId)
            ->update();

        return $this->affectedRows() > 0;
    }
}
