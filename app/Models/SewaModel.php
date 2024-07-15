<?php

namespace App\Models;

use CodeIgniter\Model;

class SewaModel extends Model
{
    protected $table      = 'sewa';
    protected $primaryKey = 'id_sewa';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['jumlah_barang', 'name_penyewa', 'name_barang', 'harga_total', 'tanggal_sewa', 'jatuh_tempo', 'status'];
}
