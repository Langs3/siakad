<?php

namespace App\Controllers;

use App\Models\GuruModel;
use CodeIgniter\Controller;

class Guru extends Controller
{
    public function index()
    {
        $model = new GuruModel();
        $pager = \Config\Services::pager();
        $data['guru'] = $model->orderBy('npwp', 'ASC')->findAll();
        return view('guru/index', $data);
    }
    public function add() 
	{
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
			'npwp'=> '',
			'nama'=> '',
			'gender'=>  '',
			'ttl'=>  '',
			'email'=>  '',
            'alamat'=>  '',
			'mapel'=>  '',
			);
			session()->setFlashdata('inputs', $data);
		}
		return view ('/guru/add');
	}
	public function save() 
	{
		helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $data = array(
            'npwp' => $this->request->getPost('npwp'),
            'nama' => $this->request->getPost('nama'),
            'gender' => $this->request->getPost('gender'),
            'ttl' => $this->request->getPost('ttl'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'mapel' => $this->request->getPost('mapel'),
        );

        if($validation->run($data, 'guru')) {
            $model = new GuruModel();
            $model->insert($data);
            session()->setFlashdata('success', 'Berhasil Menyimpan Data Guru' . $this->request->getPost('guru'));
            return redirect()->to(base_url('guru'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/guru/add'));
        }
	}

	public function edit($npwp){
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
                'npwp'=> '',
                'nama'=> '',
                'gender'=>  '',
                'ttl'=>  '',
                'email'=>  '',
                'alamat'=>  '',
                'mapel'=>  '',
			);
			session()->setFlashdata('inputs', $data);
		}
		$model = new GuruModel();
		$data['guru'] = $model->where('npwp', $npwp) ->first();
		return view('/guru/edit',$data);
	}

    public function update() 
	{
		helper(['form', 'url']);
        $npwp = $this->request->getPost('npwp') ;
        $validation = \Config\Services::validation();
        $data = array(
            'npwp' => $this->request->getPost('npwp'),
            'nama' => $this->request->getPost('nama'),
            'gender' => $this->request->getPost('gender'),
            'ttl' => $this->request->getPost('ttl'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'mapel' => $this->request->getPost('mapel'),
        );

        if($validation->run($data, 'guru')) {
            $model = new GuruModel();
            $model->update($npwp, $data);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data Guru' . $this->request->getPost('guru'));
            return redirect()->to(base_url('/guru'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/guru/edit/', $npwp));
        }
	}

    public function delete($npwp)
    {
        $model = new GuruModel();
        $model->where('npwp', $npwp)->delete();
        session()->setFlashdata('success', "Berhasil Menghapus Data Guru");
        return redirect()->to(base_url('/guru'));
    }
}
?>