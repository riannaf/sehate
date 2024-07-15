<?= $this->extend('template/layout') ?>

<?= $this->section('judul') ?>
Data Sewa
<?= $this->endSection() ?>

<?= $this->section('konten') ?>

<div class="row">
    <div class="col-lg-8">
        <div class="btn-group">
            <a href="/sewa/form_sewa" class="mb-3 mt-3 btn btn-primary"><i class="fa-solid fa-plus"></i>Tambah</a>
        </div>
    </div>
</div>




<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Nama Customer</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Tanggal Ambil</th>
        <th>Jatuh Tempo</th>
        <th>Status</th>
        <th>Menu</th>
    </tr>
    <?php foreach ($data as $index => $row) { ?>

        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= $row->name_penyewa ?></td>
            <td><?= $row->name_barang ?></td>
            <td><?= $row->jumlah_barang ?></td>
            <td><?= $row->harga_total ?></td>
            <td><?= $row->tanggal_sewa ?></td>
            <td><?= $row->jatuh_tempo ?></td>
            <td><?= $row->status ?></td>

            <td>
                <a href="<?= base_url('sewa/ubah?id_sewa=' . $row->id_sewa); ?>">Ubah</a>
                <a href="<?= base_url('sewa/hapus?id_sewa=' . $row->id_sewa); ?>" onclick="return confirm('Yakin Ingin Menghapus?');">Hapus</a>
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