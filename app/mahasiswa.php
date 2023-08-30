<?php

require 'conf/function.php';
require 'conf/crud.php';

$crud = new Crud();

//create
if(isset($_POST['simpanjur'])){
  $crud->createJurusan($_POST);
}
if(isset($_POST['simpanmtk'])){
  $crud->createMatkul($_POST);
}

//delete
if(isset($_GET['deleteid'])){
  $deleteid = $_GET['deleteid'];
  $crud->deleteMahasiswa($deleteid);
}

//alert create
if(isset($_GET['msg']) AND $_GET['msg']=='ins'){
  echo "<script> alert('Data berhasil ditambahkan'); </script>";
}
//alert update
if(isset($_GET['msg']) AND $_GET['msg']=='upd'){
  echo "<script> alert('Data berhasil diupdate'); </script>";
}
//alert delete
if(isset($_GET['msg']) AND $_GET['msg']=='del'){
  echo "<script> alert('Data berhasil dihapus'); </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vo LTE | Mahasiswa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="AdminLTE/dist/css/style.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include ('components/navbar.php')?>

  <!-- Sidebar -->
  <?php include ('components/sidebar.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0">Data Mahasiswa</h1>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
          <div class="col-md-12 mb-4">
            <div class="card">
              <div class="card-header">
                <a href="tambahMahasiswa.php" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i>
                        &nbsp;Mahasiswa
                      </a>
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>
                  &nbsp;Jurusan
                </button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModals"><i class="fas fa-plus"></i>
                  &nbsp;Mata Kuliah
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $read = $crud->tampilMahasiswa();
                    if ($read->num_rows > 0) {
                    $mhs = $read->fetch_all(MYSQLI_ASSOC);
                    for ($i = 0; $i < count($mhs); $i++) {
                  ?>
                  <tr>
                    <td class="text-center"><?= $i + 1 ?></td>
                    <td class="text-center"><?= $mhs[$i]['nim']?></td>
                    <td><?= $mhs[$i]['nama']?></td>
                    <td class="text-center"><?= $mhs[$i]['nama_jurusan']?></td>
                    <td class="text-center"><?= $mhs[$i]['alamat']?></td>
                    <td class="text-center"><?= $mhs[$i]['telp']?></td>
                    <td>
                      <a href="editMahasiswa.php?editid=<?= $mhs[$i]['nim']?>"
                          class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i> Edit</a>
                      <a href="mahasiswa.php?deleteid=<?= $mhs[$i]['nim']?>"
                          class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  <?php }             
                  } else {
                  ?>
                  <tr>
                      <td colspan="7" class='text-center'>Tidak ada data Mahasiswa</td>
                  </tr>
                  <?php
                  }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->

<!-- ./wrapper -->

<!-- Modal Jurusan -->
<div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jurusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="namajur" placeholder="Nama Jurusan">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="simpanjur" class="btn btn-sm btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Mata Kuliah -->
<div class="modal fade bd-example-modal-sm" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Kuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="matkul" placeholder="Mata Kuliah">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="sks" placeholder="SKS">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="semester" placeholder="Semester">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="simpanmtk" class="btn btn-sm btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php include('components/footer.php');?>

<!-- DataTables  & Plugins -->
<script src="AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
