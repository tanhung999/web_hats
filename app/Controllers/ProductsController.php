<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use CodeIgniter\Controller;

class ProductsController extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel(); // Assuming you have a separate model for categories

        $products = $productModel->findAll();
        $categories = $categoryModel->findAll();

        // Create an associative array mapping category_id to category_name
        $categoryMap = [];
        foreach ($categories as $category) {
            $categoryMap[$category['category_id']] = $category['name'];
        }

    // Iterate through products and add category_name field
        foreach ($products as &$product) {
            $product['category_name'] = $categoryMap[$product['category_id']];
        }

        $data = [
            'title' => 'Products',
            'products' => $products,
        ];
        return view('pages/admin/product',$data);
    }
    public function editProduct($productId)
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();

        // Lấy thông tin sản phẩm cần sửa dựa trên $productId
        $product = $productModel->find($productId);

        // Lấy danh sách tất cả các danh mục
        $categories = $categoryModel->findAll();

        $data = [
            'title' => 'Products',
            'product' => $product,
            'categories' => $categories,
        ];

        return view('pages/admin/edit_product', $data); // Tạo file edit_product.php trong thư mục views/pages/admin/
    }
    // Trong ProductsController.php

    public function updateProduct()
    {
        $productModel = new ProductModel();
    
        if($this->request->getMethod() === 'post') {
            // Lấy dữ liệu từ biểu mẫu POST
            $newImage = $this->request->getFile('image');
            $productId = $this->request->getPost('id');
            $productName = $this->request->getPost('name');
            $categoryId = $this->request->getPost('category_id');
            $productDescription = $this->request->getPost('description');
            $productPrice = $this->request->getPost('price');
            
            // Lấy thông tin sản phẩm cần cập nhật
            $product = $productModel->find($productId);
            
            if (!$product) {
                // Xử lý nếu không tìm thấy sản phẩm
                return redirect()->to(base_url('admin/product'));
            }
            if ($newImage->getSize() > 0) {
                $validationRules = [
                    'image' => 'uploaded[image]|max_size[image,10240]|is_image[image]',
                ];                
                // File đã được tải lên
                // Thực hiện các xử lý khác ở đây
                if ($this->validate($validationRules)) {
                    // Move the uploaded file to the desired location
                    $newImageName = $newImage->getRandomName();
                    $newImage->move(ROOTPATH . 'public/images', $newImageName);
                    $imagePath = ('images/' . $newImageName);
                } else {
                    return redirect()->to(base_url('admin/category'))->with('error', 'Image update not valid...');
                }
            } else {
                // Không có file được tải lên
                $imagePath = $product['image_url'];
            }
            // Dữ liệu cập nhật
            $data = [
                'name' => $productName,
                'category_id' => $categoryId,
                'description' => $productDescription,
                'price' => $productPrice,
                'image_url' => $imagePath,
            ];
            //Thực hiện cập nhật thông tin sản phẩm
            $updated = $productModel->updateProduct($productId, $data);
        
            if ($updated) {
                return redirect()->to(base_url('admin/product'))->with('success', 'Product updated successfully');
            } else {
                return redirect()->to(base_url('admin/product'))->with('error', 'Failed to update product');
            }
          
        } else {
            return redirect()->to(base_url('admin/product'))->with('success', 'Hãy quay lại sau!!!');
        }
        
    }
    


    
}
