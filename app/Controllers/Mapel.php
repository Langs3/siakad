<?php

namespace App\Controllers;

use App\Models\MapelModel;
use CodeIgniter\Controller;

class Mapel extends Controller
{
    public function index()
    {
        $model = new MapelModel();
        $pager = \Config\Services::pager();
        $data['mapel'] = $model->orderBy('id', 'ASC')->findAll();
        return view('mapel/index', $data);
    }

    public function add() 
	{
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
			'id'=> '',
			'namamapel'=> '',
			'sks'=>  '',
			);
			session()->setFlashdata('inputs', $data);
		}
		return view ('mapel/add');
	}
	public function save() 
	{
		helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $data = array(
            'namamapel' => $this->request->getPost('namamapel'),
            'sks' => $this->request->getPost('sks'),
        );

        if($validation->run($data, 'mapel')) {
            $model = new MapelModel();
            $model->insert($data);
            session()->setFlashdata('success', 'Berhasil Menyimpan Data Mata Pelajaran' . $this->request->getPost('mapel'));
            return redirect()->to(base_url('mapel'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('mapel/add'));
        }
	}

    public function edit($id){
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
                'namamapel'=> '',
                'sks'=> '',
			);
			session()->setFlashdata('inputs', $data);
		}
		$model = new MapelModel();
		$data['mapel'] = $model->where('id', $id) ->first();
		return view('/mapel/edit',$data);
	}

    public function update() 
	{
		helper(['form', 'url']);
        $id = $this->request->getPost('id') ;
        $validation = \Config\Services::validation();
        $data = array(
            'namamapel' => $this->request->getPost('namamapel'),
            'sks' => $this->request->getPost('sks'),
        );

        if($validation->run($data, 'mapel')) {
            $model = new MapelModel();
            $model->update($id, $data);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data Mata Pelajaran' . $this->request->getPost('mapel'));
            return redirect()->to(base_url('/mapel'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/mapel/edit/', $id));
        }
	}

    public function delete($id)
    {
        $model = new MapelModel();
        $model->where('id', $id)->delete();
        session()->setFlashdata('success', "Berhasil Menghapus Data Mata Pelajaran");
        return redirect()->to(base_url('/mapel'));
    }
}
?>