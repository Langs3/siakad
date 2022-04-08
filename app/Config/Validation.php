<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $siswa = [
		'nis' => 'required|integer',
		'nama' => 'required|string',
		'gender' => 'required|string',
		'ttl' => 'required',
		'email' => 'required',
		'alamat' => 'required',
		'kelas_id' => 'required',
	];

    public $siswa_errors = [
		'nis' => [
			'required' => 'NIS wajib diisi',
			'integer' => 'NIS hanya dapat diisi angka',
		],
		'nama' => [
			'required' => 'Nama Siswa wajib diisi',
			'string' => 'Nama Siswa hanya dapat diisi huruf',
		],
		'gender' => [
			'required' => 'Jenis Kelamin wajib diisi',
			'string' => 'Jenis Kelamin hanya dapat diisi huruf',
		],
		'ttl' => [
			'required' => 'Tempat & Tanggal Lahir Lahir wajib diisi',
		],
		'email' => [
			'required' => 'Tanggal Lahir wajib diisi',
		],
        'alamat' => [
			'required' => 'Alamat wajib diisi',
		],
        'kelas_id' => [
			'required' => 'Kelas wajib diisi',
		],
	];
}
