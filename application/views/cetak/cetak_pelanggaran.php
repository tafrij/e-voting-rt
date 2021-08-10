<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>

<body>
    <!-- <a href="cetak.php" target="_blank" rel="noopener noreferrer">cetak</a> -->
    <table style="text-align: center;" width="100%">
        <tr>
            <td rowspan="5"><img src="<?= base_url('assets/images/unbaja.png') ?>" width="70" alt=""></td>
        </tr>
        <tr>
            <td style="font-size: 15px; font-weight: bold;">LAPORAN HASIL SUARA</td>
        </tr>
        <tr>
            <td style="font-size: 15px; font-weight: bold;">DESA KALANGAN ANYAR</td>
        </tr>
        <tr>
            <td style="font-size: 10px;">Jl. Raya Serang - Jkt No.Km. 20, Kibin, Kec. Kibin, Serang, Banten</td>
        </tr>
    </table>
    <hr>

    <h4 style="text-align: center;"><?= $title ?></h4>

    <table border="1" style="margin-top: 10px; font-size: 11px; border-collapse: collapse;" width="100%">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Suara</th>
            <th>Tahun</th>
        </tr>

        <?php
        $no = 1;
        foreach ($data_materi as $key) :
        ?>
            <?php
            $row = $this->db->query("SELECT COUNT(`pilihan`) AS num FROM vote WHERE `pilihan` = '$key->id'")->row();
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $key->nama ?></td>

                <td><?= $row->num ?></td>
                <td><?= date('Y', time()) ?></td>
            </tr>
        <?php
            $no++;
        endforeach;
        ?>

    </table>

    <p style="font-size: 11px; text-align: right; align-self: flex-end;">
        <?php
        setlocale(LC_TIME, 'id_ID.utf8');
        $hariIni = new DateTime();
        echo "Serang, " . strftime('%d %B %Y', $hariIni->getTimestamp());
        ?>
        <br>
        Kepala Panitia,
    </p>
    <br><br><br>
    <p style="font-size: 11px; text-align: right; align-self: flex-end;">
        Sunoro,SE
        <br>
        <span style="font-weight:bold;">NIP : 1101100031</span>
    </p>
</body>

</html>