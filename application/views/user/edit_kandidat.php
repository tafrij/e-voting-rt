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
                    <form action="<?= base_url('edit-kandidat/') . $kandidat['id']  ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                            <div class="col-md-2">
                                <img src="<?= 'http://localhost/e-voting-rt/assets/img/' . $kandidat['image']; ?>" class="card-img">
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>No Kandidat</label>
                                    <input type="number" class="form-control" name="no_kandidat" value="<?= $kandidat['no_kandidat'] ?>">
                                    <?= form_error('no_kandidat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Visi</label>
                                    <textarea name="visi" rows="10" class="form-control"><?= $kandidat['visi'] ?></textarea>
                                    <?= form_error('visi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Pilih Gambar</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $kandidat['nama'] ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Misi</label>
                                    <textarea name="misi" rows="10" class="form-control"><?= $kandidat['misi'] ?></textarea>
                                    <?= form_error('misi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-success">Edit</button>
                            </div>
                        </div>
                    </form>
                    <a href="<?= base_url('kandidat') ?>" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>