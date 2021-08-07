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
                                <a href="<?= base_url('edit-kandidat/') . $kandidat['id']  ?>" class="btn btn-sm btn-success">Edit</a>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusUser">Hapus</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?= 'http://localhost/e-voting-rt/assets/img/' . $kandidat['image']; ?>" class="card-img">
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>No Kandidat</label>
                                <input disabled type="number" class="form-control" name="no_kandidat" value="<?= $kandidat['no_kandidat'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Visi</label>
                                <textarea disabled name="visi" rows="10" class="form-control"><?= $kandidat['visi'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Nama</label>
                                <input disabled type="text" class="form-control" name="nama" value="<?= $kandidat['nama'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Misi</label>
                                <textarea disabled name="misi" rows="10" class="form-control"><?= $kandidat['misi'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('kandidat') ?>" class="btn btn-sm btn-primary">Kembali</a>
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
                    <h5>Hapus kandidat <?= $kandidat['no_kandidat'] ?> ?</h5>
                </div>
                <br><br>
                <form action="<?= base_url('hapus-kandidat/') . $kandidat['id']  ?>">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>