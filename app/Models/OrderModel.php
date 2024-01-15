<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $allowedFields = ['order_id','user_id','order_date','total_amount','status'];
}