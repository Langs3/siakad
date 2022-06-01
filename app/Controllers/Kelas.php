<?php

namespace App\Controllers;

use App\Models\KelasModel;
use CodeIgniter\Controller;

class Kelas extends Controller
{
    public function index()
    {
        $model = new KelasModel();
        $pager = \Config\Services::pager();
        $data['kelas'] = $model->orderBy('id', 'ASC')->findAll();
        return view('kelas/index', $data);
    }

    public function add() 
	{
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
			'id'=> '',
			'namakelas'=> '',
			'kapasitas'=>  '',
			'terisi'=>  '',
			);
			session()->setFlashdata('inputs', $data);
		}
		return view ('kelas/add');
	}
	public function save() 
	{
		helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $data = array(
            'namakelas' => $this->request->getPost('namakelas'),
            'kapasitas' => $this->request->getPost('kapasitas'),
            'terisi' => $this->request->getPost('terisi'),
        );

        if($validation->run($data, 'kelas')) {
            $model = new KelasModel();
            $model->insert($data);
            session()->setFlashdata('success', 'Berhasil Menyimpan Data Kelas' . $this->request->getPost('kelas'));
            return redirect()->to(base_url('kelas'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('kelas/add'));
        }
	}

    public function edit($id){
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
                'namakelas'=> '',
                'kapasitas'=> '',
                'terisi'=> '',
			);
			session()->setFlashdata('inputs', $data);
		}
		$model = new KelasModel();
		$data['kelas'] = $model->where('id', $id) ->first();
		return view('/kelas/edit',$data);
	}

    public function update() 
	{
		helper(['form', 'url']);
        $id = $this->request->getPost('id') ;
        $validation = \Config\Services::validation();
        $data = array(
            'namakelas' => $this->request->getPost('namakelas'),
            'kapasitas' => $this->request->getPost('kapasitas'),
            'terisi' => $this->request->getPost('terisi'),
        );

        if($validation->run($data, 'kelas')) {
            $model = new KelasModel();
            $model->update($id, $data);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data Kelas' . $this->request->getPost('kelas'));
            return redirect()->to(base_url('/kelas'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/kelas/edit/', $id));
        }
	}

    public function delete($id)
    {
        $model = new KelasModel();
        $model->where('id', $id)->delete();
        session()->setFlashdata('success', "Berhasil Menghapus Data Kelas");
        return redirect()->to(base_url('/kelas'));
    }
}
?>