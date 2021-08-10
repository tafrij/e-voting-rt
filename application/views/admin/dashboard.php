<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>

        </div>

        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <?php $i = 1;
                        foreach ($suaras as $item) : ?>
                            <input type="hidden" value="<?= $item['suara'] ?>" id="<?= 'no_' . $i; ?>">
                            <input type="hidden" value="<?= $item['nama'] ?>" id="<?= 'nama_' . $i; ?>">
                            <!-- <p><?= $item['nama']  ?></p> -->

                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> <?= $item['nama'] ?>
                            </span>
                        <?php
                            $i++;
                        endforeach; ?>

                    </div>
                    <!-- <hr>
                    Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file. -->
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->