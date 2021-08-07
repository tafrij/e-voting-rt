<div class="container-fluid" style="font-size:13px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><?= $title ?></h5>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group float-right" role="group">
                                <a href="<?= base_url('edit-user/') . $user_detail['id']  ?>" class="btn btn-sm btn-success">Edit</a>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusUser">Hapus</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?= 'http://localhost/e-voting-rt/assets/img/profile/' . $user_detail['image']; ?>" class="card-img">
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>NIK</label>
                                <input disabled type="number" class="form-control" name="nik" value="<?= $user_detail['nik'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input disabled type="text" class="form-control" name="nama_lengkap" value="<?= $user_detail['nama_lengkap'] ?>">
                            </div>
                            <div class="form-group">
                                <label>TTL</label>
                                <input disabled type="text" class="form-control" name="ttl" value="<?= $user_detail['ttl'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <input disabled type="text" class="form-control" name="pekerjaan" value="<?= $user_detail['pekerjaan'] ?>">
                            </div>
                            <div class="form-group">
                                <label>RT/RW</label>
                                <input disabled type="text" class="form-control" name="rt" value="<?= '00' . $user_detail['rt'] . '/' . '00' . $user_detail['rw'] ?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1" disabled>
                                    <option><?= $user_detail['jenis_kelamin'] ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" rows="10" class="form-control" disabled><?= $user_detail['alamat'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('kelola-user') ?>" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<div class="modal fade" id="hapusUser" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-3">
                    <h5>Hapus user <?= $user_detail['id'] ?> ?</h5>
                </div>
                <br><br>
                <form action="<?= base_url('hapus-user/') . $user_detail['id']  ?>">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>