<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id_barang';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['kode_barang', 'nama_barang', 'spesifikasi', 'jumlah_barang', 'harga_sewa'];

    protected $validationRules    = [
        'id_barang' => 'string',
        'kode_barang' => 'required|is_unique[barang.kode_barang, id_barang, {id_barang}]'
    ];

    protected $validationMessages = [
        'kode_barang'        => [
            'is_unique' => 'Maaf, Kode barang {value} Sudah Ada',
        ],
    ];
}
