<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= 'http://localhost/e-voting-rt/assets/'; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="<?= 'http://localhost/e-voting-rt/assets/' ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= 'http://localhost/e-voting-rt/assets/'; ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-light">
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="http://localhost/e-voting-rt/assets/img/logo.png" width="30" height="30" class="d-inline-block align-top mr-1">
                <b>E-Voting</b>
            </a>
            <?php if(!$this->session->userdata('nik')): ?>
            <div class="bg-white rounded shadow-sm">
                <a href="<?= base_url('user-login') ?>" class="nav-link text-danger">Login</a>
            </div>
            <?php else: ?>
            <div class="bg-white rounded pl-2">
                <p class="text-secondary my-auto">Hai, <?= $user['nama_lengkap']; ?></a>
                <a href="<?= base_url('user-logout') ?>" class="ml-3 btn btn-danger btn-sm">Logout</a>
            </div>
            <?php endif; ?>
        </div>
    </nav>