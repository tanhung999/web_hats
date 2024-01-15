<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $model = new UserModel();
        $users = $model->findAll();
        $data=[
            'title'=>'Customers ',
            'users'=>$users 
        ];
        return view('pages/admin/customer',$data);
    }
    
    public function profile()
    {
        // Check if the user is logged in
        if (!session()->has('user_id')) {
            // If not logged in, redirect to the login page
            return redirect()->to(base_url('login'));
        }
    
        // Retrieve user information from the session
        $user_id = session()->get('user_id');
    
        // Load the UserModel
        $userModel = new UserModel();
    
        // Get user data using user_id
        $userData = $userModel->find($user_id);
    
        // Pass user data to the view
        $data = [
            'title' => 'User Profile',
            'userData' => $userData,
        ];
    
        return view('pages/admin/profile', $data);
    }
    public function updateAvatar()
    {
        $userModel = new UserModel();
        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            // Get the uploaded file
            $avatarFile = $this->request->getFile('avatar');

            // Validate the uploaded file
            $validationRules = [
                'avatar' => 'uploaded[avatar]|max_size[avatar,1024]|is_image[avatar]',
            ];

            if ($this->validate($validationRules)) {
                // Move the uploaded file to the desired location
                $newAvatarName = $avatarFile->getRandomName();
                $avatarFile->move(ROOTPATH . 'public/images', $newAvatarName);

                // Update the user's avatar in the database
                $userModel->updateImage(session()->get('user_id'), $newAvatarName);

                // Redirect or display success message
                return redirect()->to(base_url('admin/profile'))->with('success', 'Avatar updated successfully.');
            } else {
                // Validation failed, redirect with error messages
                return redirect()->to(base_url('admin/profile'))->withInput()->with('validation', $this->validator);
            }
        }

        // Redirect to the profile page if accessed without a valid form submission
        return redirect()->to(base_url('admin/profile'));
    }
}