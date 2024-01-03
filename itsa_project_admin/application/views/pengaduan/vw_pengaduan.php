<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pengaduan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><?php echo $judul; ?></li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6"><a href="<?= base_url('Pengaduan/tambah_pengaduan') ?>" class="btn btn-info mb-2">Tambah Pengaduan</a></div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Nama</td>
                            <td>NIM</td>
                            <td>Angkatan</td>
                            <td>Kelas</td>
                            <td>Status</td>
                            <td>Details</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pengaduan as $us) : ?>
                            <?php if ($us['nama'] == $this->session->userdata('id')) : ?>
                                <tr>
                                    <td><?php
                                        $userId = $us['nama'];
                                        $user = $this->db->get_where('user', ['id' => $userId])->row_array();
                                        echo $user['nama'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $userId = $us['nama'];
                                        $user = $this->db->get_where('user', ['id' => $userId])->row_array();
                                        echo $user['nim'];
                                        ?>
                                    </td>
                                    <td><?php
                                        $userId = $us['nama'];
                                        $user = $this->db->get_where('user', ['id' => $userId])->row_array();
                                        echo $user['angkatan'];
                                        ?>
                                    </td>
                                    <td><?php
                                        $userId = $us['nama'];
                                        $user = $this->db->get_where('user', ['id' => $userId])->row_array();
                                        echo $user['kelas'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($us['status'] == 'Proses') : ?>
                                            <span class="btn btn-warning"><?= $us['status']; ?></span>
                                        <?php elseif ($us['status'] == 'Selesai') : ?>
                                            <span class="btn btn-success"><?= $us['status']; ?></span>
                                        <?php else : ?>
                                            <span class="btn btn-info"><?= $us['status']; ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('Pengaduan/detail/') . $us['id']; ?>" class="btn btn-info btn-circle">
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