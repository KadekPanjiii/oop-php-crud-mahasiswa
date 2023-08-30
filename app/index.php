<?php

require 'conf/function.php';
require 'conf/other.php';

$other = new Other();

$satu = $other->jmlMhs();
$mhs = $satu->num_rows;

$dua = $other->jmlJur();
$jur = $dua->num_rows;

$tiga = $other->jmlMtk();
$mtk = $tiga->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vo | Dashboard</title>

  <?php include('components/header.php'); ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php include('components/navbar.php'); ?>

    <?php include('components/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3 class='text-light'><?= $mhs ?></h3>

                <p class='text-light'>Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 class='text-light'><?= $jur ?></h3>

                <p class='text-light'>Jurusan</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 class='text-light'><?= $mtk ?></h3>

                <p class='text-light'>Mata Kuliah</p>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard-list"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    <div class="row mt-3">
    <div class="col-12">
        <div class="card">
        <div class="card-header"><h3><b>Pengumuman Terbaru</b></h3></div>
        <div class="card-body">
        <?php
        $result = $other->tampilBerita();
        if ($result->num_rows > 0) {
        $berita = $result->fetch_all(MYSQLI_ASSOC);
        for ($i = 0; $i < count($berita); $i++) {
        ?>
        <div class='border-bottom mb-4'>
        <h5><?=$berita[$i]['judul']?></h5>
        <p><?=$berita[$i]['berita']?></p>
        </div>

        <?php        
          }   
        } else {
        ?>
        <h5>Tidak ada pengumuman</h5>
        <?php
        }
        ?>
        </div>
        </div>
    </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include('components/footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
