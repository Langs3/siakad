<?php namespace App\Models;

use CodeIgniter\Model;

class MapelModel extends Model
{
    protected $table = 'mapel';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'namamapel',
        'sks',
    ];
}