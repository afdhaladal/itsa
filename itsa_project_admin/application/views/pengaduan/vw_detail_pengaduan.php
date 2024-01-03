<div id="layoutSidenav_content">
    <div class="container-fluid">
        <div class="container-fluid px-4">
            <h1 class="mt-4">Pengaduan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('Pengaduan') ?>">Pengaduan</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('Profil') ?>">Detail</a></li>
            </ol>
            <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        </div>
        <div class="container-fluid">
            <div class="card mb-3" style="max-width: 900px;">
                <div class="row no-gutters">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">Nama</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $pengaduan['nama_user']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">NIM</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $pengaduan['nim_user']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Angkatan</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $pengaduan['angkatan_user']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Kelas</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $pengaduan['kelas_user']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Pengaduan</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $pengaduan['pengaduan']; ?></div>
                        </div>
                        <div class="card-footer justify-content-center">
                            <a href="<?= base_url('Pengaduan') ?>" class="btn btn-danger">Tutup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>