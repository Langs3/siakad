<?php namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'npwp';
    protected $allowedFields = [
        'npwp',
        'nama',
        'gender',
        'ttl',
        'email',
        'alamat',
        'mapel'
    ];

    
}