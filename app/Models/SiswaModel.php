<?php namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = "siswa";
    protected $allowedFields = [
        'nis',
        'nama',
        'gender',
        'ttl',
        'email',
        'alamat',
        'kelas_id'
    ];
}