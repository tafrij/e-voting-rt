<!-- Begin Page Content -->
<div class="container-fluid" style="font-size:13px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body shadow">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <h5><?= $title ?></h5>
                        </div>
                        <div class="col-md-6">
                            <a href="" class="btn btn-sm btn-primary mb-3 float-right" data-toggle="modal" data-target="#newMenuModal">Tambah User</a>
                        </div>
                    </div>
                    <table class="table table-hover table- table-striped" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No Kandidat</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Visi</th>
                                <th scope="col">Misi</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($kandidat as $item) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $item['no_kandidat']; ?></td>
                                    <td>
                                    <img src="<?= 'http://localhost/e-voting-rt/assets/img//' . $item['image']; ?>" class="rounded-circle img-profile" width="30px">
                                    <?= $item['nama']; ?>
                                    </td>
                                    <td><?= $item['visi']; ?></td>
                                    <td><?= $item['misi']; ?></td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="<?= base_url('detail-kandidat/') . $item['id'] ?>" class="btn btn-sm btn-primary">Detail</a>
                                            <a href="<?= base_url('edit-kandidat/') . $item['id'] ?>" class="btn btn-sm btn-success">Edit</a>
                                            <a href="<?= base_url('hapus-kandidat/') . $item['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?= base_url('tambah-kandidat'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Kandidat</label>
                                <input type="number" class="form-control" name="no_kandidat" placeholder="00">
                            </div>
                            <div class="form-group">
                                <label>Visi</label>
                                <textarea name="visi" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Pilih Gambar</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="John">
                            </div>
                            <div class="form-group">
                                <label>Misi</label>
                                <textarea name="misi" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>