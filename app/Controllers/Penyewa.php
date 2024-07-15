<?php

namespace App\Controllers;

class Penyewa extends BaseController
{
    protected $penyewaModel;

    function __construct()
    {
        $this->penyewaModel = new \App\Models\PenyewaModel();
    }

    public function index()
    {
        if (isset($_COOKIE['penyewa'])) {
            $arr_penyewa = json_decode($_COOKIE['penyewa'], true);
        } else {
            $arr_penyewa = [];
        }

        $pencarian_id_penyewa = !isset($_GET['cari']) ? '' : $_GET['cari'];

        $arr_penyewa = $this->penyewaModel
            ->like('kode_penyewa', $pencarian_id_penyewa)
            ->get();
        $data_view = [
            'data' => $arr_penyewa->getResult(),
            'pencarian_id_penyewa' => $pencarian_id_penyewa
        ];

        return view('penyewa/data_penyewa', $data_view);
    }

    public function form()
    {
        $default_id = isset($_GET['default_id']) ? $_GET['default_id'] : 'P0';
        $default_nama = isset($_GET['default_nama']) ? $_GET['default_nama'] : '';
        $default_alamat = isset($_GET['default_alamat']) ? $_GET['default_alamat'] : '';
        $default_no_hp = isset($_GET['default_no_hp']) ? $_GET['default_no_hp'] : '+62';

        $data_view = [
            'default_id' => $default_id,
            'default_nama' => $default_nama,
            'default_alamat' => $default_alamat,
            'default_no_hp' => $default_no_hp,
        ];

        return view('penyewa/form_penyewa', $data_view);
    }


    public function proses_input()
    {
        $nama_penyewa = $this->request->getPost('nama_penyewa');
        $alamat = $this->request->getPost('alamat');
        $no_hp = $this->request->getPost('no_hp');

        $id_penyewa_input = $_POST['id_penyewa'];

        $id_penyewa_pk = $this->request->getPost('id_penyewa_pk');

        if ($id_penyewa_pk == '') {
            $url_back_form = base_url("penyewa/form_penyewa?default_id=$id_penyewa_input&default_nama=$nama_penyewa&default_alamat=$alamat&default_no_hp=$no_hp");
        } else {
            $url_back_form = base_url("penyewa/ubah?id_penyewa=$id_penyewa_pk");
        }

        $penyewa_baru = [
            'kode_penyewa' => $id_penyewa_input,
            'nama_penyewa' => $nama_penyewa,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'id_penyewa' => $id_penyewa_pk,
        ];

        if ($id_penyewa_pk == '') {
            $proses_db = $this->penyewaModel->insert($penyewa_baru);
        } else {
            $proses_db = $this->penyewaModel->update($id_penyewa_pk, $penyewa_baru);
        }

        if ($proses_db === false) {
            $error = $this->penyewaModel->errors();
            $pesan_error_kd = $error['kode_penyewa'];

            return "<h2>$pesan_error_kd</h2>
                <a href='$url_back_form'>Klik untuk kembali ke form</a>";
        } else {
            return redirect()->to(base_url('penyewa'));
        }
    }

    public function data_penyewa()
    {
        $arr_penyewa = $this->penyewaModel->get();

        $data_view = [
            'data' => $arr_penyewa->getResult()
        ];

        return view('penyewa/data_penyewa', $data_view);
    }

    public function ubah()
    {
        $id = $this->request->getGet('id_penyewa');

        $data_penyewa = $this->penyewaModel
            ->where('id_penyewa', $id)
            ->first();

        $default_id = $data_penyewa['kode_penyewa'];
        $default_nama = $data_penyewa['nama_penyewa'];
        $default_alamat = $data_penyewa['alamat'];
        $default_no_hp = $data_penyewa['no_hp'];

        $data_view = [
            'default_id' => $default_id,
            'default_nama' => $default_nama,
            'default_alamat' => $default_alamat,
            'default_no_hp' => $default_no_hp,
            'id_penyewa' => $id
        ];
        return view('penyewa/form_penyewa', $data_view);
    }

    public function hapus()
    {
        $id = $this->request->getGet('id_penyewa');

        $data_penyewa = $this->penyewaModel->delete($id);
        return redirect()->to(base_url('penyewa'));
    }
}
