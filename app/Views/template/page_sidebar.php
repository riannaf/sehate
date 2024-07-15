<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<aside class="main-sidebar sidebar--primary elevation-4" style="background-color: 82C9B8;">
    <img src="<?= base_url('adminLTE/dist/img/logo_sehate.png') ?>">

    <div class="user-panel mt-2 pb-2b-2 d-flex"></div>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <br>
        <li class="nav-item">
            <img src="<?= base_url('adminLTE/dist/img/icon_dashboard.png') ?>">
            <a href="<?= base_url('dashboard') ?>" style="font-size: large;"> Dashboard </a>
        </li>
        <li class="nav-item">
            <div class="user-panel mt-2 pb-2b-2 d-flex"></div>
            <img src="<?= base_url('adminLTE/dist/img/icon_data_alat.png') ?>">
            <a href="<?= base_url('barang/data_barang') ?>" style="font-size: large;"> Data Barang </a>
        <li class="nav-item">
            <div class="user-panel mt-2 pb-2b-2 d-flex"></div>
            <img src="<?= base_url('adminLTE/dist/img/icon_data_customer.png') ?>">
            <a href="<?= base_url('penyewa/data_penyewa') ?>" style="font-size: large;"> Data Penyewa </a>
        </li>
        <li class="nav-item">
            <div class="user-panel mt-2 pb-2b-2 d-flex"></div>
            <img src="<?= base_url('adminLTE/dist/img/icon_transaksi.png') ?>">
            <a href="<?= base_url('sewa/data_sewa') ?>" style="font-size: large;"> Data Persewaan </a>
        </li>

</aside>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>