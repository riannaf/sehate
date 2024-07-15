<?= $this->extend('template/layout') ?>

<?= $this->section('judul') ?>
Form Barang
<?= $this->endSection() ?>

<?= $this->section('konten') ?>
<form action="<?= base_url('barang/proses_input') ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_barang_pk" value="<?= isset($id_barang) ? $id_barang : '' ?>">

    <div class="row mb-3 mt-3">
        <label for="kode_barang" class="col-lg-2 col-form-label">Kode Barang</label>
        <div class="col-lg-2">
            <input type="text" name="id_barang" id="kode_barang" class="form-control" value="<?= $default_id ?>">
        </div>
    </div>

    <div class="row mb-3">
        <label for="nama_barang" class="col-lg-2 col-form-label">Nama Barang</label>
        <div class="col-lg-4">
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?= $default_nama ?>">
        </div>
    </div>

    <div class="row mb-3">
        <label for="spesifikasi" class="col-lg-2 col-form-label">Spesifikasi</label>
        <div class="col-lg-6">
            <input type="text" name="spesifikasi" id="spesifikasi" class="form-control" value="<?= $default_spesifikasi ?>">
        </div>
    </div>

    <div class="row mb-3">
        <label for="stok" class="col-lg-2 col-form-label">Stok</label>
        <div class="col-lg-6">
            <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control" value="<?= $default_jumlah ?>">
        </div>
    </div>

    <div class="row mb-3">
        <label for="harga" class="col-lg-2 col-form-label">Harga</label>
        <div class="col-lg-6">
            <input type="number" name="harga_sewa" id="harga_sewa" class="form-control" value="<?= $default_harga ?>">
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-6 offset-lg-2">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="<?= base_url('barang/data_barang') ?>">Kembali</a>
        </div>
    </div>
</form>

<?= $this->endSection() ?>