<?= $this->extend('template/layout') ?>

<?= $this->section('judul') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('konten') ?>
<main>
    <style>
        /* Style untuk mengatur tata letak dan tampilan */
        .container {
            display: flex;
            align-items: center;
        }

        img {
            margin-right: 10px;
            /* Margin kanan agar ada ruang antara teks dan gambar */
        }

        /* Style untuk mengatur tata letak dan tampilan card */
        .card-container {
            display: flex;
            justify-content: center;
            justify-content: space-around;
            /* Membuat card berada di sekitar ruang yang sama */
        }

        .card {
            background-color: 83B1CA;
            color: FFFFFF;
            width: 200px;
            /* Atur lebar card sesuai kebutuhan */
            border: 1px solid #ccc;
            /* Garis tepi card */
            padding: 10px;
            /* Ruang di dalam card */
            margin: 10px;
            /* Ruang di antara card */
            text-align: center;
            /* Pusatkan teks di dalam card */
        }
    </style>
    <div class="container" style="background-color:FFFFFF;">
        <div class="s-wrapper" style="vertical-align: middle;">
            <p style="justify-content: center;">
                Sehate adalah bisnis dibidang jasa layanan penyewaan HT (Handy Talky). Sehate  resmi didirikan pada 21 Oktober 2022 oleh Ilham Fathoni dan Ikbal Fauzi, yang berlokasi di Jl. Permadi MG.2/1586, RT 60, RW 19, Wirogunan, Mergansan, Kota Yogyakarta.
            </p>
            <h3>Visi</h3>
            <p style="justify-content: center;">
                Menjadi perusahaan penyewaan HT No 1 di Jogja.
            </p>
            <h3>Misi</h3>
            <p style="justify-content: center;">
                Menerapkan harga bersaing <br>
                Menggencarkan promosi melalui sosial media <br>
                Memberikan pelayanan yang baik <br>
                Konsisten
            </p>
        </div>
        <div class="container">
            <img src="<?= base_url('adminLTE/dist/img/gambar_ht_1.png') ?>">
        </div>
    </div>
    <div class="container" style="background-color:FFFFFF;">
        <div class="card-container">
            <div class="card">
                <h3>HT Comteck <br> UV-82</h3>
                <p>22 unit</p>
            </div>
            <div class="card">
                <h3>Earphone</h3>
                <p>22 unit</p>
            </div>
            <div class="card">
                <h3>Box Container</h3>
                <p>3 unit</p>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>