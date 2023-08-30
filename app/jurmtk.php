<?php

require 'conf/function.php';
require 'conf/other.php';
require 'conf/crud.php';

$crud = new Crud();
$other = new Other();
$model = new JurusanMataKuliah();

if(isset($_POST['tambahjurmtk'])){
  $crud->tambahJurusanMatkul($_POST);
}

$result = $model->jurMatkul();
$jurusan_data = [];
foreach ($result as $row) {
$jurusan = $row['jurusan'];
if (!isset($jurusan_data[$jurusan])) {
$jurusan_data[$jurusan] = [];
}
$jurusan_data[$jurusan][] = $row;
}

if(isset($_GET['msg']) AND $_GET['msg']=='ins'){
  echo "<script> alert('Data berhasil ditambahkan'); </script>";
}
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
                            <h1 class="m-0 mb-2">Data Jurusan & Mata Kuliah</h1>
                            <button class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>&nbsp;Jurusan & Matkul</button>
                        </div><!-- /.col -->
                        
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <?php foreach ($jurusan_data as $jurusan => $detail):?>
            <?php $i = 1; ?>
            <!-- Main content -->
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title ml-4 mb-2">
                        Jurusan <b><?= $jurusan ?> </b>
                    </h3>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Mata Kuliah</th>
                                <th class="text-center">SKS</th>
                                <th class="text-center">Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($detail as $row) :
                            ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td><?= $row['matkul'];?></td>
                                <td class="text-center"><?= $row['sks']; "-"?></td>
                                <td class="text-center"><?= $row['smst'];?></td>
                            </tr>
                            <?php endforeach; ?>
                          </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            </div>
            <!-- /.card -->

            <!-- /.content -->
            <?php endforeach; ?>
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

    <!-- Modal Jurusan -->
<div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jurusan & Matkul</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label>Jurusan</label>
            <select name="idjur" class="form-control" >
                <?php
                $result = $crud->selectAllJurusan();
                if ($result->num_rows > 0) {
                // output data of each row
                while($r = $result->fetch_assoc()) {
                echo "<option value='" . $r["id_jurusan"] . "'> " . $r["nama_jurusan"] . "</option>";
                }
                } else {
                echo "<option value='-1'> selected> Tidak ada Jurusan </option>";
                }
                ?>
            </select>
          </div>
        <div class="form-group">
          <label>Mata Kuliah</label>
            <select style='width: 100%;' class="form-control js-example-basic-multiple" name="kodemtk[]" multiple="multiple">
                <?php
                $result = $crud->selectAllMatkul();
                // output data of each row
                while($r = $result->fetch_assoc()) {
                echo "<option value='" . $r["id_matkul"] . "'> " . $r["nama_matkul"] . "</option>";
                }
                ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="tambahjurmtk" class="btn btn-sm btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>