<div class="container-fluid" style="font-size: 13px;">
    <div class="row">
        <div class="col-8">
            <div class="card shadow">
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <h1 class="h5"><?= $title; ?></h1>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-hover table-borderless table-striped" id="dataTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Pilihan</th>
                                        <th scope="col">Periode</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($vote as $item) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $item['name']; ?></td>
                                            <td><?= $item['no_kandidat'] . '-' . $item['nama']; ?></td>
                                            <td><?= $item['periode']; ?></td>
                                            <td class="text-center">
                                                <!-- <div class="btn-group" role="group">
                                                    <a href="<?= base_url('detail-user/') . $item['id'] ?>" class="btn btn-sm btn-primary">Detail</a>
                                                    <a href="<?= base_url('edit-user/') . $item['id'] ?>" class="btn btn-sm btn-success">Edit</a>
                                                    <a href="<?= base_url('hapus-user/') . $item['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                                                </div> -->
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
        <div class="col-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <h1 class="h5">Status Vote</h1>
                        </div>
                        <div class="col-5">
                            <div class="float-right">
                                <span class="mr-3">
                                    <span class="badge badge-pill badge-danger mr-1"><i class="fas fa-times"></i></span>
                                    <?= $count_vote_x['vote_x'];  ?>
                                </span>
                                <span>
                                    <span class="badge badge-pill badge-success mr-1"><i class="fas fa-check"></i></span>
                                    <?= $count_vote_o['vote_o'];  ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless" style="max-height: 500px; overflow:auto; display:inline-block; ">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user_status as $item) : ?>
                                    <tr>
                                        <td><?= $item['nama_lengkap']; ?></td>
                                        <td class="text-center">
                                            <?php if ($item['vote_status'] == '' || $item['vote_status'] == 0) : ?>
                                                <span class="badge badge-pill badge-danger"><i class="fas fa-times"></i></span>
                                            <?php else : ?>
                                                <span class="badge badge-pill badge-success"><i class="fas fa-check"></i></span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>