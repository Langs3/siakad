<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public function process($username, $password)
    {
        return $this->db->table('admin')->where(array('username' => $username, 'password' => $password))->get()->getRowArray();
    }
}