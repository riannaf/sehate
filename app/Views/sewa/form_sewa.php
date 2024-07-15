<?= $this->extend('template/layout') ?>

<?= $this->section('judul') ?>
Data Alat
<?= $this->endSection() ?>

<?= $this->section('konten') ?>
<form action="<?= base_url('sewa/proses_input') ?>" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id_sewa_pk" value="<?= isset($id_sewa) ? $id_sewa : '' ?>">


  <div class="row mb-3 mt-3">
    <label class="col-lg-2 col-form-label" for="default_nama_penyewa">Nama</label>
    <div class="col-lg-3">
      <select class="custom-select col-lg-5" id="name_penyewa" name="name_penyewa">
        <option selected><?= $default_nama_penyewa ?></option>
        <?php
        $index = 1;
        foreach ($data_penyewa as $index => $row) { ?>
          <option value="<?= $row->nama_penyewa ?>"><?= $row->nama_penyewa ?></option>
          <?= $index + 1 ?>
        <?php  }  ?>
      </select>
    </div>
  </div>

  <div class="row mb-3">
    <label for="default_nama_barang" class="col-lg-2 col-form-label">Kode Barang</label>
    <div class="col-lg-3">
      <select class="custom-select col-lg-5" id="name_barang" name="name_barangINT">
        <option selected><?= $default_nama_barang ?></option>
        <?php
        $index = 1;
        foreach ($data_barang as $index => $row) { ?>
          <option value="<?= $row->nama_barang ?>"><?= $row->nama_barang ?></option>
        <?php }  ?>
      </select>
    </div>
  </div>


  <div class="row mb-3">
    <label for="jumlah_barang" class="col-lg-2 col-form-label">jumlah_barang</label>
    <div class="col-lg-1">
      <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control" value="<?= $default_jumlah_barang ?>">
    </div>
  </div>

  <div class="row mb-3">
    <label for="tanggal_sewa" class="col-lg-2 col-form-label">Tanggal Ambil</label>
    <div class="col-lg-2">
      <input type="date" name="tanggal_sewa" id="tanggal_sewa" class="form-control" value="<?= $default_tanggal_sewa ?>">
    </div>
  </div>

  <div class="row mb-3">
    <label for="jatuh_tempo" class="col-lg-2 col-form-label">Jatuh Tempo</label>
    <div class="col-lg-2">
      <input type="date" name="jatuh_tempo" id="jatuh_tempo" class="form-control" value="<?= $default_jatuh_tempo ?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="status" class="col-lg-2 col-form-label">Status</label>
    <div class="col-lg-6">
      <select name="status" id="status">
        <option value="Selesai">Selesai</option>
        <option value="Dalam Proses">Dalam Proses</option>
        <option value="Belum Bayar">Belum Bayar</option>
      </select>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6 offset-lg-2">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      <a href="<?= base_url('sewa/data_sewa') ?>">Kembali</a>
    </div>
  </div>

</form>

<?= $this->endSection() ?>