<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\CategoriesController;
use App\Models\UserModel;


class AuthController extends BaseController
{
    
    public function login()
    {
        $data['title'] = 'Login';
        return view('pages/admin/sign_in',$data);
    }
    public function register () {
        $data['title'] = 'Register';
        return view('pages/admin/sign_up',$data);
    }
    // Trong AuthController.php
    public function logout()
    {
        // Xoá các session liên quan đến người dùng
        session()->remove(['user_id', 'username', 'email', 'role']);

        // Hiển thị thông báo đăng xuất thành công
        session()->setFlashdata('success', 'Bạn Vừa Đăng xuất khỏi Website Muốn Quay Lại Hãy Đăng Nhập.');

        // Chuyển hướng về trang login
        return redirect()->to(base_url('login'));
    }

    public function processLogin()
{
    // Lấy dữ liệu từ form
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    // Validation rules
    $rules = [
        'email' => 'required',
        'password' => 'required'
    ];

    // Custom messages for validation errors
    $messages = [
        'email' => [
            'required' => 'Vui lòng nhập địa chỉ email.'
        ],
        'password' => [
            'required' => 'Vui lòng nhập mật khẩu.'
        ]
    ];

    // Run validation
    if (!$this->validate($rules, $messages)) {
        // Nếu có lỗi xảy ra trong quá trình xác thực
        session()->setFlashdata('error', 'Vui lòng nhập đầy đủ thông tin đăng nhập.');
        return redirect()->to(base_url('login'))->withInput()->with('validation', $this->validator);
    }

    // Gọi model để kiểm tra thông tin đăng nhập
    $userModel = new UserModel();
    $user = $userModel->where('email', $email)->first();

    if ($user && $user['password'] === md5($password)) {
        // Đăng nhập thành công

        session()->set('user_id', $user['user_id']);
        session()->set('username', $user['username']);
        session()->set('fullname', $user['fullname']);
        session()->set('email', $user['email']);
        session()->set('role', $user['role']);
        session()->set('image', $user['image']);

        session()->setFlashdata('success', 'Đăng nhập thành công.');

        if ($user['role'] === 'admin') {
            // Redirect to the admin panel
            session()->setFlashdata('success', 'Đăng nhập thành công (Admin).');
            return redirect()->to(base_url('admin'))->with('sessionData', session()->get());
        } elseif ($user['role'] === 'user') {
            // Redirect to the user's product page
            session()->setFlashdata('success', 'Đăng nhập thành công (User).');
            return redirect()->to(base_url('dashboard'));
        }
    } else {
        // Đăng nhập thất bại
        session()->setFlashdata('error', 'Địa chỉ email hoặc mật khẩu không đúng.');
        return redirect()->to(base_url('login'));
    }
}

    public function processRegister()
    {
        // Get data from the form
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validation rules
        $rules = [
            'username' => 'required|alpha_numeric|min_length[3]|max_length[30]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ];

        // Custom messages for validation errors
        $messages = [
            'username' => [
                'required' => 'Vui lòng nhập tên người dùng.',
                'alpha_numeric' => 'Tên người dùng chỉ được chứa ký tự và số.',
                'min_length' => 'Tên người dùng phải có ít nhất 3 ký tự.',
                'max_length' => 'Tên người dùng không được quá 30 ký tự.',
            ],
            'email' => [
                'required' => 'Vui lòng nhập địa chỉ email.',
                'valid_email' => 'Địa chỉ email không hợp lệ.',
                'is_unique' => 'Địa chỉ email đã tồn tại.',
            ],
            'password' => [
                'required' => 'Vui lòng nhập mật khẩu.',
                'min_length' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            ],
        ];

        // Run validation
        if (!$this->validate($rules, $messages)) {
            // If there are validation errors
            return redirect()->to(base_url('register'))->withInput()->with('validation', $this->validator);
        }

        // Hash the password before saving to the database
        $hashedPassword = md5($password);

        // Check if email or username already exists
        $userModel = new UserModel();

        if ($userModel->isEmailExist($email)) {
            // Email already exists, handle accordingly (e.g., show an error message)
            return redirect()->to(base_url('register'))->with('error', 'Email already exists.');
        }

        if ($userModel->isUsernameExist($username)) {
            // Username already exists, handle accordingly (e.g., show an error message)
            return redirect()->to(base_url('register'))->with('error', 'Username already exists.');
        }

        // Save the user data to the database
        $userData = [
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword,
        ];

        $newUserId = $userModel->insert($userData);

        // Determine user role
        $role = ($username === 'admin') ? 'admin' : 'user';

        // Set session data
        session()->set('user_id', $newUserId);
        session()->set('username', $username);
        session()->set('email', $email);
        session()->set('role', $role);

        // Set success flash message
        session()->setFlashdata('success', 'Đăng ký thành công.');

        // Redirect based on the user's role
        if ($role === 'admin') {
            return redirect()->to(base_url('admin'));
        } elseif ($role === 'user') {
            return redirect()->to(base_url('home'));
        }
    }
}
