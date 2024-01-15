<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\OrderDetailModel;
use CodeIgniter\Controller;


class OrdersController extends Controller
{
    public function index()
    {
        $orderModel = new OrderModel();
        $userModel = new UserModel();
        $orders = $orderModel->findAll();
        $users = $userModel->findAll();
        
        // Create a mapping of user_id to email
        $userMap = [];
        foreach ($users as $user) {
            $userMap[$user['user_id']] = $user['email'];
        }
    
        // Add user email to each order
        foreach ($orders as &$order) {
            $order['user'] = $userMap[$order['user_id']];
        }
    
        $data = [
            'title' => 'Orders',
            'orders' => $orders
        ];
    
        return view('pages/admin/order', $data);
    }
    public function orderDetail($orderId)
    {
        $orderDetailModel = new OrderDetailModel();
        $productModel = new ProductModel();
        $userModel = new UserModel();
        $orderModel = new OrderModel(); // Assuming you have a ProductModel
        // Get all order details with the specified order_id
        $orderDetails = $orderDetailModel->where('order_id', $orderId)->findAll();
        $order = $orderModel->find($orderId);
        $user_id = $order['user_id'];
        $user=$userModel->find($user_id);
        // var_dump($orderDetails);
        // Check if order details are found
        if (empty($orderDetails)) {
            // Handle the case where no order details are found
            // For example, you might want to redirect back or display an error message
            return redirect()->back()->with('error', 'Order details not found');
        }

        // Fetch product names for each order detail
        foreach ($orderDetails as &$orderDetail) {
            $product = $productModel->find($orderDetail['product_id']);
            $orderDetail['product_name'] = $product ? $product['name'] : 'N/A';
        }
        $orderDetail['user_email'] = $user['email'];
        $orderDetail['user_fullname'] = $user['fullname'];
        $data = [
            'title' => 'Orders',
            'orderDetails' => $orderDetails
        ];
        var_dump($orderDetail);
        return view('pages/admin/order_detail',$data);
    }

    
}