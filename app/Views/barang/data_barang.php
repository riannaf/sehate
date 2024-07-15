<?= $this->extend('template/layout') ?>

<?= $this->section('judul') ?>
Data Barang
<?= $this->endSection() ?>

<?= $this->section('konten') ?>

<div class="row">
    <div class="col-lg-8">
        <div class="btn-group">
            <a href="/barang/form_barang" class="mb-3 mt-3 btn btn-primary"><i class="fa-solid fa-plus"></i>Tambah</a>
        </div>
    </div>
</div>




<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Spesifikasi</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Menu</th>
    </tr>
    <?php foreach ($data as $index => $row) { ?>

        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= $row->kode_barang ?></td>
            <td><?= $row->nama_barang ?></td>
            <td><?= $row->spesifikasi ?></td>
            <td><?= $row->jumlah_barang ?></td>
            <td><?= $row->harga_sewa ?></td>
            <td>
                <a href="<?= base_url('barang/ubah?id_barang=' . $row->id_barang); ?>">Ubah</a>
                <a href="<?= base_url('barang/hapus?id_barang=' . $row->id_barang); ?>" onclick="return confirm('Yakin Ingin Menghapus?');">Hapus</a>
            </td>
        </tr>

    <?php

    }
    if (count($data) == 0) {

        echo ' <tr><td colspan="7"><b>Data Produk Tidak Ditemukan</b></td></tr>';
    }
    ?>




</table>


<?= $this->endSection() ?>