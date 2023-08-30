<?php

class Crud extends Connection{
    public function tampilMahasiswa(){
        $sql = "SELECT nim, nama, nama_jurusan, telp, alamat FROM tb_mahasiswa, tb_jurusan WHERE tb_jurusan.id_jurusan = tb_mahasiswa.jurusan";
        return $this->conn->query($sql);
    }
    
    //MAHASISWA
    public function createMahasiswa($post){
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];

        $sql = "INSERT INTO tb_mahasiswa (nim, nama, jurusan, alamat, telp) VALUES ('$nim', '$nama', '$jurusan', '$alamat', '$telp')";
        $result = $this->conn->query($sql);
        if($result){
            header('Location: ../app/mahasiswa.php?msg=ins');
        } else {
            echo "Error ".$result."<br>".$this->conn->error;
        }  
    }

    public function viewsMahasiswa($editid){
        $sql = "SELECT *, tb_jurusan.nama_jurusan FROM tb_mahasiswa, tb_jurusan WHERE nim = '$editid' AND tb_jurusan.id_jurusan = tb_mahasiswa.jurusan";
        $result = $this->conn->query($sql);
        if(mysqli_num_rows($result) == 1){
            $row = $result->fetch_assoc();
            return $row;
        }
    }

    public function updateMahasiswa($post){
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $editid = $_POST['hid'];

        $sql = "UPDATE tb_mahasiswa SET nama='$nama', jurusan='$jurusan', alamat='$alamat', telp='$telp' WHERE nim ='$editid' ";
        $result = $this->conn->query($sql);
        if($result){
            header('Location: ../app/mahasiswa.php?msg=upd');
        } else {
            echo "Error ".$result."<br>".$this->conn->error;
        }  
    }

    public function deleteMahasiswa($deleteid){
        $sql = "DELETE FROM tb_mahasiswa WHERE nim = '$deleteid'";
        $result = $this->conn->query($sql);
        if($result){
            header('Location: ../app/mahasiswa.php?msg=del');
        } else {
            echo "Error ".$result."<br>".$this->conn->error;
        }  
    }

        //JURUSAN
        public function createJurusan($post){
        $nama = $_POST['namajur'];

        $sql = "INSERT INTO tb_jurusan (id_jurusan, nama_jurusan) VALUES ('', '$nama')";
        $result = $this->conn->query($sql);
        if($result){
            header('Location: ../app/mahasiswa.php?msg=ins');
        } else {
            echo "Error ".$result."<br>".$this->conn->error;
        }  
    }

    public function selectAllJurusan(){
        $sql = "SELECT * FROM tb_jurusan";
        return $this->conn->query($sql);
    }   

        //MATA KULIAH
        public function createMatkul($post){
        $nama = $_POST['matkul'];
        $sks = $_POST['sks'];
        $smst = $_POST['semester'];

        $sql = "INSERT INTO tb_matkul (id_matkul, nama_matkul, sks, semester) VALUES ('', '$nama', '$sks', '$smst')";
        $result = $this->conn->query($sql);
        if($result){
            header('Location: ../app/mahasiswa.php?msg=ins');
        } else {
            echo "Error ".$result."<br>".$this->conn->error;
        }  
    }

    public function selectAllMatkul(){
    $sql = "SELECT * FROM tb_matkul";
    return $this->conn->query($sql);
    }   

    public function tambahJurusanMatkul($post){
    $idjur = $_POST['idjur'];
    $kodemtk = $_POST['kodemtk'];

    foreach ($kodemtk as $idmtk) {
    $sql = "INSERT INTO tb_jurmtk (id_jurusan, id_matkul) VALUES ('$idjur', '$idmtk')";
    $result = $this->conn->query($sql);
    }
    if($result){
    header('Location: ../app/jurmtk.php?msg=ins');
    } else {
        echo "Error ".$result."<br>".$this->conn->error;
     }  
    }

    public function hapusJurusanMatkul($deleteid){
    $sql = "DELETE FROM tb_jurmtk WHERE id = '$deleteid'";
    $result = $this->conn->query($sql);
    if($result){
        header('Location: ../app/jurmtk.php?msg=del');
    } else {
        echo "Error ".$result."<br>".$this->conn->error;
    }  
    }
}