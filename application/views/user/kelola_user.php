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
                    <table class="table table-hover table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nik</th>
                                <th scope="col">Nama</th>
                                <th scope="col">RT/RW</th>
                                <th scope="col">Status Pemilihan</th>
                                <th scope="col">Waktu Pemilihan</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($user_detail as $item) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $item['nik']; ?></td>
                                    <td><?= $item['nama_lengkap']; ?></td>
                                    <td><?= '00' . $item['rt'] . '/' . '00' . $item['rw']; ?></td>
                                    <td>
                                        <?php if ($item['vote_status'] == 0) {
                                            echo '<div class="badge badge-danger">Belum Memilih</div>';
                                        } else {
                                            echo '<div class="badge badge-success">Sudah Memilih</div>';
                                        } ?>
                                    </td>
                                    <td><?= $item['waktu_pemilihan']; ?></td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="<?= base_url('detail-user/') . $item['id'] ?>" class="btn btn-sm btn-primary">Detail</a>
                                            <a href="<?= base_url('edit-user/') . $item['id'] ?>" class="btn btn-sm btn-success">Edit</a>
                                            <a href="<?= base_url('hapus-user/') . $item['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
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
            <form action="<?= base_url('tambah-user'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="number" class="form-control" name="nik" placeholder="3604 xxxx xxxx">
                            </div>
                            <div class="form-group">
                                <label>TTL</label>
                                <input type="text" class="form-control" name="ttl" placeholder="Serang, 01 Juni 1987">
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" placeholder="Karyawan">
                            </div>
                            <div class="form-group">
                                <label>RT</label>
                                <input type="number" class="form-control" name="rt" placeholder="0">
                            </div>
                            <div class="form-group">
                                <label>RW</label>
                                <input type="number" class="form-control" name="rw" placeholder="0">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="role_id" id="exampleFormControlSelect1">
                                    <option>** Pilih Role **</option>
                                    <option value="2">User</option>
                                    <option value="3">Panitia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" placeholder="Jhon">
                            </div>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>