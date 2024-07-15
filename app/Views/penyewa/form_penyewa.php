<?= $this->extend('template/layout') ?>

<?= $this->section('judul') ?>
Form Customer
<?= $this->endSection() ?>

<?= $this->section('konten') ?>
<form action="<?= base_url('penyewa/proses_input') ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_penyewa_pk" value="<?= isset($id_penyewa) ? $id_penyewa : '' ?>">

    <div class="row mb-3 mt-3">
        <label for="kode_penyewa" class="col-lg-2 col-form-label">Kode penyewa</label>
        <div class="col-lg-2">
            <input type="text" name="id_penyewa" id="kode_penyewa" class="form-control" value="<?= $default_id ?>">
        </div>
    </div>

    <div class="row mb-3">
        <label for="nama_penyewa" class="col-lg-2 col-form-label">Nama penyewa</label>
        <div class="col-lg-4">
            <input type="text" name="nama_penyewa" id="nama_penyewa" class="form-control" value="<?= $default_nama ?>">
        </div>
    </div>

    <div class="row mb-3">
        <label for="alamat" class="col-lg-2 col-form-label">Alamat</label>
        <div class="col-lg-6">
            <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $default_alamat ?>">
        </div>
    </div>

    <div class="row mb-3">
        <label for="no_hp" class="col-lg-2 col-form-label">Telepon</label>
        <div class="col-lg-6">
            <input type="number" name="no_hp" id="no_hp" class="form-control" value="<?= $default_no_hp ?>">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6 offset-lg-2">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="<?= base_url('penyewa/data_penyewa') ?>">Kembali</a>
        </div>
    </div>
</form>

<?= $this->endSection() ?>