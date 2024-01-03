<div class="container col-lg-6">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">ITSA Login</h1>
                                </div>
                                <?= $this->session->flashdata('message') ?>
                                <form method="POST" action="<?= base_url('auth/cek_login') ?>">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" value="<?= set_value('email'); ?>" id="email" name="email" type="email" placeholder="Masukan Alamat Email..." />
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" value="<?= set_value('nama'); ?>" name="password" id="password" type="password" placeholder="Password" />
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                        <button class="btn btn-primary" type="submit">Login</button>
                                    </div>
                                </form>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Login with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('Auth/registrasi') ?>">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>