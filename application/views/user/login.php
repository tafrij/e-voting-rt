<div class="container mt-3">
    <div class="row justify-content-center mt-5">
        <div class="col-10">
        <?= $this->session->flashdata('message'); ?>
            <div class="card p-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 mx-auto">
                            <div class="text-center">
                                <img src="http://localhost/e-voting-rt/assets/img/garuda.png" width="100%" class="d-inline-block align-top mr-1">
                            </div>
                        </div>
                        <div class="col-6 mx-auto">
                        <h5>Login</h5>
                            <form class="user mt-4" method="post" action="<?= base_url('user-login'); ?>">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="nik" name="nik" placeholder="Masukan NIK" value="<?= set_value('username'); ?>">
                                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-light btn-user btn-block">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>