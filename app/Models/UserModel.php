<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['username','fullname', 'password', 'email','role', 'image'];
    protected $returnType = 'array';

    public function isEmailExist($email)
    {
        // Check if the email already exists in the database
        $user = $this->where('email', $email)->first();
        return $user !== null;
    }

    public function isUsernameExist($username)
    {
        // Check if the username already exists in the database
        $user = $this->where('username', $username)->first();
        return $user !== null;
    }

    public function getUserById($user_id)
    {
        return $this->find($user_id);
    }
    public function updateImage($userId, $newAvatarName)
    {
        // Thực hiện cập nhật trường 'image' cho user có 'user_id' là $userId
        $this->set('image', 'images/' . $newAvatarName)
            ->where('user_id', $userId)
            ->update();
    }

}

