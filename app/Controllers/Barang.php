<?php

namespace App\Controllers;

class Barang extends BaseController
{
    protected $barangModel;

    function __construct()
    {
        $this->barangModel = new \App\Models\BarangModel();
    }

    public function index()
    {
        if (isset($_COOKIE['barang'])) {
            $arr_barang = json_decode($_COOKIE['barang'], true);
        } else {
            $arr_barang = [];
        }

        $pencarian_id_barang = !isset($_GET['cari']) ? '' : $_GET['cari'];

        $arr_barang = $this->barangModel
            ->like('kode_barang', $pencarian_id_barang)
            ->get();
        $data_view = [
            'data' => $arr_barang->getResult(),
            'pencarian_id_barang' => $pencarian_id_barang
        ];

        return view('barang/data_barang', $data_view);
    }

    public function form()
    {
        $default_id = isset($_GET['default_id']) ? $_GET['default_id'] : 'B0';
        $default_nama = isset($_GET['default_nama']) ? $_GET['default_nama'] : '';
        $default_spesifikasi = isset($_GET['default_spesifikasi']) ? $_GET['default_spesifikasi'] : '';
        $default_jumlah = isset($_GET['default_jumlah']) ? $_GET['default_jumlah'] : 0;
        $default_harga = isset($_GET['default_harga']) ? $_GET['default_harga'] : '0';

        $data_view = [
            'default_id' => $default_id,
            'default_nama' => $default_nama,
            'default_spesifikasi' => $default_spesifikasi,
            'default_jumlah' => $default_jumlah,
            'default_harga' => $default_harga
        ];

        return view('barang/form_barang', $data_view);
    }


    public function proses_input()
    {
        $nama_barang = $this->request->getPost('nama_barang');
        $spesifikasi = $this->request->getPost('spesifikasi');
        $jumlah_barang = $this->request->getPost('jumlah_barang');
        $harga_sewa = $this->request->getPost('harga_sewa');

        $id_barang_input = $_POST['id_barang'];

        $id_barang_pk = $this->request->getPost('id_barang_pk');

        if ($id_barang_pk == '') {
            $url_back_form = base_url("barang/form_barang?default_id=$id_barang_input&default_nama=$nama_barang&default_spesifikasi=$spesifikasi&default_jumlah=$jumlah_barang&default_harga=$harga_sewa");
        } else {
            $url_back_form = base_url("barang/ubah?id_barang=$id_barang_pk");
        }

        $barang_baru = [
            'kode_barang' => $id_barang_input,
            'nama_barang' => $nama_barang,
            'spesifikasi' => $spesifikasi,
            'jumlah_barang' => $jumlah_barang,
            'harga_sewa' => $harga_sewa,
            'id_barang' => $id_barang_pk,
        ];

        if ($id_barang_pk == '') {
            $proses_db = $this->barangModel->insert($barang_baru);
        } else {
            $proses_db = $this->barangModel->update($id_barang_pk, $barang_baru);
        }

        if ($proses_db === false) {
            $error = $this->barangModel->errors();
            $pesan_error_kd = $error['kode_barang'];

            return "<h2>$pesan_error_kd</h2>
                <a href='$url_back_form'>Klik untuk kembali ke form</a>";
        } else {
            return redirect()->to(base_url('barang'));
        }
    }

    public function data_barang()
    {
        $arr_barang = $this->barangModel->get();

        $data_view = [
            'data' => $arr_barang->getResult()
        ];

        return view('barang/data_barang', $data_view);
    }

    public function ubah()
    {
        $id = $this->request->getGet('id_barang');

        $data_barang = $this->barangModel
            ->where('id_barang', $id)
            ->first();

        $default_id = $data_barang['kode_barang'];
        $default_nama = $data_barang['nama_barang'];
        $default_spesifikasi = $data_barang['spesifikasi'];
        $default_jumlah = $data_barang['jumlah_barang'];
        $default_harga = $data_barang['harga_sewa'];

        $data_view = [
            'default_id' => $default_id,
            'default_nama' => $default_nama,
            'default_spesifikasi' => $default_spesifikasi,
            'default_jumlah' => $default_jumlah,
            'default_harga' => $default_harga,
            'id_barang' => $id
        ];
        return view('barang/form_barang', $data_view);
    }

    public function hapus()
    {
        $id = $this->request->getGet('id_barang');

        $data_barang = $this->barangModel->delete($id);
        return redirect()->to(base_url('barang'));
    }
}
