<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $model = new CategoryModel();
        $categories = $model->findAll();
        $data=[
            'title'=>'Categories ',
            'categories'=>$categories
        ];
        return view('pages/admin/category',$data);
    }
    
    // CategoriesController.php

public function editCategory($categoryId)
    {
        // Load the necessary model
        $categoryModel = new CategoryModel();

        // Get category details from the database based on the $categoryId
        $category = $categoryModel->find($categoryId);

        // Pass category details to the view
        $data = [
            'title' => 'Categories',
            'category' => $category,
            // Other data you want to pass to the view
        ];

        return view('pages/admin/edit_category', $data);
    }

    public function updateCategory()
    {
        if ($this->request->getMethod() === 'post') {
            $categoryId = $this->request->getPost('id');
            $newCategoryName = $this->request->getPost('name');

            // Update the category in the database using the model method
            $categoryModel = new CategoryModel();
            try {
                $categoryModel->updateCategory($categoryId, $newCategoryName);
            
                // Success
                return redirect()->to(base_url('admin/category'))->with('success', 'Category updated successfully.');
            } catch(\Exception $e) {
                // Failure
                return redirect()->to(base_url('admin/category'))->with('error', 'Error updating category.');
            }
        }

        // Redirect to the category page if accessed without a valid form submission
        return redirect()->to(base_url('admin/category'));
    }

}
