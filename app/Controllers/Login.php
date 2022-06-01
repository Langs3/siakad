<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login/login');
    }

    public function __construct()
    {
        helper('form');
        $this->admin = new AdminModel();
    }

    public function process()
    {
        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');

        $cek = $this->admin->process($username, $password);

        if(($cek['username'] == $username) && ($cek['password'] == $password)){
            $session = \Config\Services::session();
            $session->set('username', $username);
            $session->set('password', $password);
            return redirect()->to(base_url('home'));
        }else{
            session()->setFlashdata('gagal', 'Username atau Password Salah');
            return redirect()->to(base_url('login'));
        }
    }


    function logout()
    {
        session()->destroy();
        return redirect()->to('/login/login');
    }
}