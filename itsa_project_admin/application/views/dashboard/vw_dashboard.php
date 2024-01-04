<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">

        <?php
        if ($user['role'] == 'Sekre2') { ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <a href="<?= base_url('Proposal') ?>" style="text-decoration: none; color: inherit;">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Pengajuan Proposal Kegiatan
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-primary-300"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        <?php } elseif ($user['role'] == 'Sekre1') { ?>
            <!-- Tasks Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <a href="<?= base_url('Lpj') ?>" style="text-decoration: none; color: inherit;">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Pengajuan LPJ Kegiatan
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-primary-300"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        <?php } elseif ($user['role'] == 'Advo') { ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <a href="<?= base_url('Pengaduan') ?>" style="text-decoration: none; color: inherit;">
                            <div class="row no-gutters align-items-center">

                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Form Pengaduan
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-primary-300"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


        <?php } else { ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <a href="<?= base_url('Proposal') ?>" style="text-decoration: none; color: inherit;">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Pengajuan Proposal Kegiatan
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-primary-300"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tasks Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <a href="<?= base_url('Lpj') ?>" style="text-decoration: none; color: inherit;">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Pengajuan LPJ Kegiatan
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-primary-300"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <a href="<?= base_url('Pengaduan') ?>" style="text-decoration: none; color: inherit;">
                            <div class="row no-gutters align-items-center">

                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Form Pengaduan
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-primary-300"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>

</div>
<!-- /.container-fluid -->
</div>