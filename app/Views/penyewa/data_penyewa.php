<?= $this->extend('template/layout') ?>

<?= $this->section('judul') ?>
Data Customer
<?= $this->endSection() ?>

<?= $this->section('konten') ?>

<div class="row">
    <div class="col-lg-8">
        <div class="btn-group">
            <a href="/penyewa/form_penyewa" class="mb-3 mt-3 btn btn-primary"><i class="fa-solid fa-plus"></i>Tambah</a>
        </div>
    </div>
</div>




<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Kode penyewa</th>
        <th>Nama penyewa</th>
        <th>Alamat</th>
        <th>Nomor Telepon</th>
        <th>Menu</th>
    </tr>
    <?php foreach ($data as $index => $row) { ?>

        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= $row->kode_penyewa ?></td>
            <td><?= $row->nama_penyewa ?></td>
            <td><?= $row->alamat ?></td>
            <td><?= $row->no_hp ?></td>
            <td>
                <a href="<?= base_url('penyewa/ubah?id_penyewa=' . $row->id_penyewa); ?>">Ubah</a>
                <a href="<?= base_url('penyewa/hapus?id_penyewa=' . $row->id_penyewa); ?>" onclick="return confirm('Yakin Ingin Menghapus?');">Hapus</a>
            </td>
        </tr>

    <?php

    }
    if (count($data) == 0) {

        echo ' <tr><td colspan="7"><b>Data Tidak Ditemukan</b></td></tr>';
    }
    ?>




</table>


<?= $this->endSection() ?>