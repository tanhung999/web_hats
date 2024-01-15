<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model
{
    protected $table = 'orderdetails';
    protected $primaryKey = 'order_detail_id';
    protected $allowedFields = ['order_id','product_id','quantity'];
}