<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Lpj</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><?php echo $judul; ?></li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6"><a href="<?= base_url('Lpj/tambah_lpj') ?>" class="btn btn-info mb-2">Ajukan Lpj</a></div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Nama Pengaju</td>
                            <td>Nama Kegiatan</td>
                            <td>Lpj</td>
                            <td>Status</td>
                            <td>Details</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($lpj as $us) : ?>
                            <?php if ($us['nama'] == $this->session->userdata('id')) : ?>
                                <tr>
                                    <td><?php
                                        $userId = $us['nama'];
                                        $user = $this->db->get_where('user', ['id' => $userId])->row_array();
                                        echo $user['nama'];
                                        ?>
                                    </td>
                                    <td><?= $us['namakegiatan']; ?></td>
                                    <td>
                                        <a href="<?= base_url('./assets/img/lpj/') . $us['file_path']; ?>" target="_blank" class="btn btn-info btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Chechk Lpj</span>
                                        </a>
                                    </td>
                                    <td>
                                        <?php if ($us['status'] == 'Ditolak') : ?>
                                            <span class="btn btn-danger"><?= $us['status']; ?></span>
                                        <?php elseif ($us['status'] == 'Proses') : ?>
                                            <span class="btn btn-warning"><?= $us['status']; ?></span>
                                        <?php elseif ($us['status'] == 'Selesai') : ?>
                                            <span class="btn btn-success"><?= $us['status']; ?></span>
                                        <?php else : ?>
                                            <span class="btn btn-info"><?= $us['status']; ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('Lpj/detail/') . $us['id']; ?>" class="btn btn-info btn-circle">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>