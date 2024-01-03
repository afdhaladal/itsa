<div id="layoutSidenav_content">
    <div class="container-fluid">
        <div class="container-fluid px-4">
            <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('Profil') ?>">Profil</a></li>
            </ol>
        </div>
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" alt="" style="max-width: 100%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title m-0 font-weight-bold text-primary"><?= $user['nama'] ?></h5>
                            <p class="card-text m-0 font-weight-bold text-primary"><?= $user['email'] ?></p>
                            <p class="card-text"><small class="text-muted m-0 font-weight-bold">Anggota sejak <?= date('Y-m-d', $user['date_created']) ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="card-body">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Profil</h6>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Nama</div>
                            <div class="col-md-6"><?= $user['nama']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">NIM</div>
                            <div class="col-md-6"><?= $user['nim']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Angkatan</div>
                            <div class="col-md-6"><?= $user['angkatan']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Kelas</div>
                            <div class="col-md-6"><?= $user['kelas']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Pengaduan</div>
                            <div class="col-md-6"><?= $user['email']; ?></div>
                        </div>
                        <div class="card-footer justify-content-center">
                            <a href="<?= base_url('Dashboard') ?>" class="btn btn-danger">Tutup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>