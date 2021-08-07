<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><?= $title ?></h5>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2">
                    <img src="<?= 'http://localhost/e-voting-rt/assets/img/profile/' . $user['image']; ?>" class="card-img">
                    </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>NIK</label>
                                <input disabled type="number" class="form-control" name="nik" placeholder="3604 xxxx xxxx">
                            </div>
                            <div class="form-group">
                                <label>TTL</label>
                                <input disabled type="text" class="form-control" name="ttl" placeholder="Serang, 01 Juni 1987">
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <input disabled type="text" class="form-control" name="pekerjaan" placeholder="Karyawan">
                            </div>
                            <div class="form-group">
                                <label>RT</label>
                                <input disabled type="number" class="form-control" name="rt" placeholder="0">
                            </div>
                            <div class="form-group">
                                <label>RW</label>
                                <input disabled type="number" class="form-control" name="rw" placeholder="0">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
                                <option>** Pilih Jenis Kelamin **</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
