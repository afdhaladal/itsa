<div id="layoutSidenav_content">
    <div class="container-fluid">
        <div class="container-fluid px-4">
            <h1 class="mt-4">Proposal</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin') ?>">Proposal</a></li>
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
                            <div class="col-md-6"><?= $proposal['nama_user']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">NIM</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $proposal['nim_user']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">No WA</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $proposal['nohp']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Nama Kegiatan</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $proposal['namakegiatan']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Proposal</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6">
                                <a href="<?= base_url('./assets/img/proposal/') . $proposal['file_path']; ?>" target="_blank" class="btn btn-info btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                    <span class="text">Chechk Proposal</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-footer justify-content-center">
                            <a href="<?= base_url('Proposal') ?>" class="btn btn-danger">Tutup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>