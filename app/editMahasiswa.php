<?php
require 'conf/function.php';
require 'conf/crud.php';

$crud = new Crud();

if(isset($_POST['update'])){
$crud->updateMahasiswa($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vo | Edit Mahasiwa</title>

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
                            <h1 class="m-0">Edit Mahasiswa</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- jquery validation -->
                            <div class="card"> 
                                <!-- form start -->
                                <?php
                                if(isset($_GET['editid'])){
                                $editid = $_GET['editid'];
                                $update = $crud->viewsMahasiswa($editid);
                                ?>
                                <form action="" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">NIM</label>
                                            <input type="text" name="nim" class="form-control" placeholder="NIM"
                                                value="<?= $update['nim']?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput2">Nama</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama"
                                                value="<?= $update['nama']?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput3">Jurusan</label>
                                            <select name="jurusan" class="form-control" required>
                                                <option value="<?= $update['jurusan']; ?>"><?= $update['nama_jurusan']; ?></option>
                                                    <?php
                                                        $result = $crud->selectAllJurusan();
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option value='" . $row["id_jurusan"] . "'> " . $row["nama_jurusan"] . "</option>";
                                                            }
                                                        } else {
                                                            echo "<option valuee='-1'> selected> Tidak ada Jurusan </option>";
                                                        }
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput4">Alamat</label>
                                            <textarea name="alamat" class="form-control" placeholder="Alamat"
                                                value="<?= $update['alamat']?>" required><?= $update['alamat']?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput5">No. Telepon</label>
                                            <input type="text" name="telp" class="form-control"
                                                placeholder="No. Telepon" value="<?= $update['telp']?>" required>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <input type="hidden" name="hid" value="<?= $update['nim']?>">
                                        <button type="submit" name="update" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                                <?php } ?>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">

                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
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