<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use CodeIgniter\Controller;

class Siswa extends Controller
{
    public function index()
    {
        $model = new SiswaModel();
        $pager = \Config\Services::pager();
        $data['siswa'] = $model->orderBy('nis', 'ASC')->findAll();
        return view('siswa/index', $data);
    }
    public function add() 
	{
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
			'nis'=> '',
			'nama'=> '',
			'gender'=>  '',
			'ttl'=>  '',
			'email'=>  '',
            'alamat'=>  '',
			'kelas_id'=>  '',
			);
			session()->setFlashdata('inputs', $data);
		}
		return view ('/siswa/add');
	}
	public function save() 
	{
		helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $data = array(
            'nis' => $this->request->getPost('nis'),
            'nama' => $this->request->getPost('nama'),
            'gender' => $this->request->getPost('gender'),
            'ttl' => $this->request->getPost('ttl'),
            'email' => $this->request->getPost('alamat'),
            'alamat' => $this->request->getPost('email'),
            'kelas_id' => $this->request->getPost('kelas_id'),
        );

        if($validation->run($data, 'siswa')) {
            $model = new SiswaModel();
            $model->insert($data);
            session()->setFlashdata('success', 'Berhasil Menyimpan Data Siswa' . $this->request->getPost('siswa'));
            return redirect()->to(base_url('siswa'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/siswa/add'));
        }
	}

	public function edit($nis){
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
                'nis'=> '',
                'nama'=> '',
                'gender'=>  '',
                'ttl'=>  '',
                'email'=>  '',
                'alamat'=>  '',
                'kelas_id'=>  '',
			);
			session()->setFlashdata('inputs', $data);
		}
		$model = new SiswaModel();
		$data['siswa'] = $model->where('nis', $nis) ->first();
		return view('/siswa/edit',$data);
	}

    public function update() 
	{
		helper(['form', 'url']);
        $nis = $this->request->getPost('nis') ;
        $validation = \Config\Services::validation();
        $data = array(
            'nis' => $this->request->getPost('nis'),
            'nama' => $this->request->getPost('nama'),
            'gender' => $this->request->getPost('gender'),
            'ttl' => $this->request->getPost('ttl'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'kelas_id' => $this->request->getPost('kelas_id'),
        );

        if($validation->run($data, 'siswa')) {
            $model = new SiswaModel();
            $model->update($nis, $data);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data Siswa' . $this->request->getPost('siswa'));
            return redirect()->to(base_url('/siswa'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/siswa/edit/', $nis));
        }
	}

    public function hapus($nis)
    {
        $model = new SiswaModel();
        $model->where('nis', $nis)->delete();
        session()->setFlashdata('success', 'Berhasil Menghapus Data Siswa');
        return redirect()->to(base_url('/siswa'));
    }
}
?>