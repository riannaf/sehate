<?php

namespace App\Controllers;

class Sewa extends BaseController
{
  protected $sewaModel;
  protected $barangModel;
  protected $penyewaModel;
  function __construct()
  {
    $this->sewaModel = new \App\Models\SewaModel();
  }

  public function data_sewa()
  {
    $data = $this->sewaModel->get();
    $data_view = [
      'data' => $data->getResult()
    ];


    return view('sewa/data_sewa', $data_view);
  }

  public function form()
  {
    $this->barangModel = new \App\Models\BarangModel();
    $this->penyewaModel = new \App\Models\PenyewaModel();
    $data_barang = $this->barangModel->get();
    $data_penyewa = $this->penyewaModel->get();
    $data_sewa = $this->sewaModel->join('penyewa', 'penyewa.id_penyewa = sewa.id_penyewa', 'LEFT')
      ->join('barang', 'barang.id_barang = sewa.id_barang', 'LEFT')
      ->get();
    $default_nama_penyewa = isset($_GET['default_nama_penyewa']) ? $_GET['default_nama_penyewa'] : 'C';
    $default_nama_barang = isset($_GET['default_nama_barang']) ? $_GET['default_nama_barang'] : 'B';
    $default_jumlah = isset($_GET['default_jumlah']) ? $_GET['default_jumlah'] : '';
    $default_status = isset($_GET['default_status']) ? $_GET['default_status'] : '';
    $default_harga_total = isset($_GET['default_harga_total']) ? $_GET['default_harga_total'] : 0;
    $default_tanggal_sewa = isset($_GET['default_tanggal_sewa']) ? $_GET['default_tanggal_sewa'] : 0;
    $default_jatuh_tempo = isset($_GET['default_jatuh_tempo']) ? $_GET['default_jatuh_tempo'] : '';

    $data_view = [
      'default_nama_penyewa' => $default_nama_penyewa,
      'default_nama_barang' => $default_nama_barang,
      'default_jumlah_barang' => $default_jumlah,
      'default_harga_total' => $default_harga_total,
      'default_tanggal_sewa' => $default_tanggal_sewa,
      'default_jatuh_tempo' => $default_jatuh_tempo,
      'default_status' => $default_status,
      'data_barang' => $data_barang->getResult(),
      'data_penyewa' => $data_penyewa->getResult(),
      'data_sewa' => $data_sewa->getResult()
    ];


    return view('sewa/form_sewa', $data_view);
  }

  public function proses_input()
  {
    $this->sewaModel->join('penyewa', 'penyewa.id_penyewa = sewa.id_penyewa', 'LEFT')
      ->join('barang', 'barang.id_barang = sewa.id_barang', 'LEFT');


    $name_penyewa = $this->request->getPost('name_penyewa');
    $name_barang = $this->request->getPost('name_barangINT');
    $jumlah_barang = $this->request->getPost('jumlah_barang');
    $harga_satuan = $this->request->getPost('harga_satuanjay');
    $harga_total = $this->request->getPost('harga_total');
    $tanggal_sewa = $this->request->getPost('tanggal_sewa');
    $status = $this->request->getPost('status');
    $jatuh_tempo = $this->request->getPost('jatuh_tempo');
    $this->sewaModel->disableForeignKeyChecks();

    $id_sewa_pk = $this->request->getPost('id_sewa_pk');

    if ($id_sewa_pk == '') {
      $url_back_form = base_url("transaksi/form?default_id_sewa=$id_sewa_pk&default_name_barang=$name_barang&default_jumlah=$jumlah_barang&default_harga_total=$harga_total&default_tanggal_sewa=$tanggal_sewa&default_jatuh_tempo=$jatuh_tempo&default_status=$status");
    } else {
      $url_back_form = base_url("transaksi/ubah?id_sewa=$id_sewa_pk");
    }

    $this->barangModel = new \App\Models\BarangModel();

    $existingBarang = $this->barangModel
      ->where('nama_barang', $name_barang)
      ->first();
      // Jika ditemukan, ambil harga sewa dari database
      $harga_satuan = $existingBarang['harga_sewa'];
  

    $sewa_baru = [
      'name_penyewa' => $name_penyewa,
      'name_barang' => $name_barang,
      'jumlah_barang' => $jumlah_barang,
      'harga_total' => $harga_satuan * $jumlah_barang,
      'tanggal_sewa' => $tanggal_sewa,
      'jatuh_tempo' => $jatuh_tempo,
      'status' => $status,
      'id_sewa' => $id_sewa_pk,
    ];



    if ($id_sewa_pk == '') {
      $proses_db = $this->sewaModel->insert($sewa_baru);
    } else {
      $proses_db = $this->sewaModel->update($id_sewa_pk, $sewa_baru);
    }

    if ($proses_db === false) {
      $error = $this->sewaModel->errors();
      $pesan_error_kd = $error['id_sewa'];

      return "<h2>$pesan_error_kd</h2>
                <a href='$url_back_form'>Klik untuk kembali ke form</a>";
    } else {
      return redirect()->to(base_url('sewa/data_sewa'));
    }
  }


  public function ubah()
  {

    $id = $this->request->getGet('id_sewa');

    $this->barangModel = new \App\Models\BarangModel();
    $this->penyewaModel = new \App\Models\PenyewaModel();
    $data_barang = $this->barangModel->get();
    $data_penyewa = $this->penyewaModel->get();

    $data_sewa = $this->sewaModel
      ->where('id_sewa', $id)
      ->first();


    $default_id = $data_sewa['id_sewa'];
    $default_nama_penyewa = $data_sewa['name_penyewa'];
    $default_nama_barang = $data_sewa['name_barang'];
    $default_jumlah_barang = $data_sewa['jumlah_barang'];
    $default_harga_total = $data_sewa['harga_total'];
    $default_tanggal_sewa = $data_sewa['tanggal_sewa'];
    $default_status = $data_sewa['status'];
    $default_jatuh_tempo = $data_sewa['jatuh_tempo'];

    $data_view = [
      'default_id' => $default_id,
      'default_nama_penyewa' => $default_nama_penyewa,
      'default_nama_barang' => $default_nama_barang,
      'default_jumlah_barang' => $default_jumlah_barang,
      'default_harga_total' => $default_harga_total,
      'default_tanggal_sewa' => $default_tanggal_sewa,
      'default_status' => $default_status,
      'default_jatuh_tempo' => $default_jatuh_tempo,
      'id_sewa' => $id,
      'data_barang' => $data_barang->getResult(),
      'data_penyewa' => $data_penyewa->getResult()
    ];

    return view('sewa/form_sewa', $data_view);
  }

  public function hapus()
  {
    $id = $this->request->getGet('id_sewa');

    $data_sewa = $this->sewaModel->delete($id);
    return redirect()->to(base_url('sewa/data_sewa'));
  }
}
