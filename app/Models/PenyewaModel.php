<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyewaModel extends Model
{
    protected $table      = 'penyewa';
    protected $primaryKey = 'id_penyewa';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['kode_penyewa', 'nama_penyewa', 'alamat', 'no_hp'];

    protected $validationRules    = [
        'id_penyewa' => 'string',
        'kode_penyewa' => 'required|is_unique[penyewa.kode_penyewa, id_penyewa, {id_penyewa}]'
    ];

    protected $validationMessages = [
        'kode_penyewa'        => [
            'is_unique' => 'Maaf, Kode penyewa {value} Sudah Ada',
        ],
    ];
}
