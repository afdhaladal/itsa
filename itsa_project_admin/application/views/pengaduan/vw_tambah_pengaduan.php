<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pengaduan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><?php echo $judul; ?></li>
        </ol>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('Pengaduan/upload'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="nama" id="nama" value="<?= $user['id']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="nim" id="nim" value="<?= $user['id']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="angkatan" id="angkatan" value="<?= $user['id']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="kelas" id="kelas" value="<?= $user['id']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="pengaduan">Pengaduan</label>
                            <input type="text" name="pengaduan" class="form-control" id="pengaduan" placeholder="Pengaduan">
                        </div>
                        <a href="<?= base_url('Pengaduan') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="tambah" id="tombol" class="btn btn-primary float-right">Tambah Pengaduan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    const tombol = document.querySelector('#tombol');
    tombol.addEventListener('click', function() {
        // Memeriksa apakah input pengaduan sudah diisi
        const pengaduanInput = document.getElementById('pengaduan');
        const pengaduanValue = pengaduanInput.value.trim();

        if (pengaduanValue !== '') {
            // Jika pengaduan diisi, tampilkan sweet alert
            Swal.fire({
                icon: 'success',
                title: 'Terima Kasih',
                showConfirmButton: false,
                text: 'Data Anda akan kami proses',
            });

            // Setelah menampilkan sweet alert, submit form
            document.getElementById('formPengaduan').submit();
        } else {
            // Jika pengaduan belum diisi, berikan pesan error
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Harap isi data terlebih dahulu!',
            });
        }
    });
</script>