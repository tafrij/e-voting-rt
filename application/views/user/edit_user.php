<div class="container-fluid" style="font-size:13px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><?= $title ?></h5>
                        </div>
                    </div>
                    <form action="<?= base_url('edit-user/') . $user_detail['id']; ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="<?= 'http://localhost/e-voting-rt/assets/img/profile/' . $user_detail['image']; ?>" class="card-img">
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="number" class="form-control" name="nik" value="<?= $user_detail['nik'] ?>">
                                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" value="<?= $user_detail['nama_lengkap'] ?>">
                                    <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>TTL</label>
                                    <input type="text" class="form-control" name="ttl" value="<?= $user_detail['ttl'] ?>">
                                    <?= form_error('ttl', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" class="form-control" name="pekerjaan" value="<?= $user_detail['pekerjaan'] ?>">
                                    <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label>RT</label>
                                            <input type="number" class="form-control" name="rt" value="<?= $user_detail['rt'] ?>">
                                            <?= form_error('rt', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label>RW</label>
                                            <input type="number" class="form-control" name="rw" value="<?= $user_detail['rw'] ?>">
                                            <?= form_error('rw', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Pilih Gambar</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
                                        <option><?= $user_detail['jenis_kelamin'] ?></option>
                                    </select>
                                    <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" rows="10" class="form-control"><?= $user_detail['alamat'] ?></textarea>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Edit</button>
                            </div>
                        </div>
                    </form>
                    <a href="<?= base_url('kelola-user') ?>" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->