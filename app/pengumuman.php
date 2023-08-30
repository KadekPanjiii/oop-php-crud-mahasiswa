<?php

require 'conf/function.php';
require 'conf/other.php';

$other = new Other();

//create
if(isset($_POST['tambah'])){
$other->tambahBerita($_POST);
}
//update
if(isset($_POST['update'])){
$other->ubahBerita($_POST);
}
//delete
if(isset($_GET['deleteid'])){
  $deleteid = $_GET['deleteid'];
  $other->hapusBerita($deleteid);
}

//alert
if(isset($_GET['msg']) AND $_GET['msg']=='ins'){
  echo "<script> alert('Data berhasil ditambahkan'); </script>";
}

if(isset($_GET['msg']) AND $_GET['msg']=='upd'){
  echo "<script> alert('Data berhasil diupdate'); </script>";
}

if(isset($_GET['msg']) AND $_GET['msg']=='del'){
  echo "<script> alert('Data berhasil dihapus'); </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vo | Pengumuman</title>

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
                            <h1 class="m-0">Data Pengumuman</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <?php
                    if (@$_GET['action'] == 'edit' && isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $pengumuman = $other->editBerita($id);
                    ?>
                    <form class="row" action="" method="post">
                    <input type="hidden" name="id" value="<?= $pengumuman['id'] ?>">
                    <div class="col-12 mb-2">
                        <label for="message-text" class="col-form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul" value="<?= $pengumuman['judul'] ?>">
                    </div>
                    <div class="col-12 mb-2">
                        <label for="message-text" class="col-form-label">Isi Pengumuman</label>
                        <textarea name="isi" rows='4' placeholder="Isi pengumuman" class="form-control"><?= $pengumuman['berita'] ?></textarea>
                    </div>
                  <div class="col-12 text-right">
                      <a href="" class="btn btn-danger">Batal</a>
                      <button class="btn btn-primary" type="submit" name='update'>Simpan Perubahan</button>
                  </div>
                  </form>
                <?php
                } else {
              // ADD BERITA
              ?>
                <form class="row" action="" method="post">
                    <div class="col-12 mb-2">
                        <label for="message-text" class="col-form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul">
                    </div>
                    <div class="col-12 mb-2">
                        <label for="message-text" class="col-form-label">Isi Pengumuman</label>
                        <textarea name="isi"  rows='4' placeholder="Isi pengumuman" class="form-control"></textarea>
                    </div>
                  <div class="col-12 text-right">
                      <button class="btn btn-primary" type="submit" name='tambah'>Publish</button>
                  </div>
                  </form>
                <?php
                }
              ?>
                </div>
            </div>
                <!-- /.card-header -->
                <di class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Tanggal Publish</th>
                                <th>Tanggal Ubah</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                           $result = $other->tampilBerita();
                            if ($result->num_rows > 0) {
                            $berita = $result->fetch_all(MYSQLI_ASSOC);
                            for ($i = 0; $i < count($berita); $i++) {
                            ?>
                        
                            <tr>
                                <td class="text-center"><?= $i + 1 ?></td>
                                <td><?= $berita[$i]['judul'] ?></td>
                                <td><?= strlen($berita[$i]['berita']) > 100 ? substr($berita[$i]['berita'],0,100) . '...' : $berita[$i]['berita'] ?></td>
                                <td class="text-center"><?= date_format(date_create($berita[$i]['created_at']), "d-M-Y") ?></td>
                                <td class="text-center"><?= date_format(date_create($berita[$i]['updated_at']), "d-M-Y") ?></td>
                                <td>
                                    <a href="pengumuman.php?action=edit&id=<?= $berita[$i]['id'];?>"
                                        class="btn btn-xs btn-primary"><i class="fa fa-pencil-alt"></i> Edit</a>
                                    <a href="pengumuman.php?deleteid=<?= $berita[$i]['id'];?>"
                                        class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            <?php  
                            }
                        }else {
                            ?>
                            <tr>
                                 <td colspan="6" class='text-center'>Tidak ada pengumuman</td>
                            </tr>
                            <?php
                        }?>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            </div>
            <!-- /.card -->
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