<?php

class Other extends Connection{
    public function tambahBerita($post){
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $sql = "INSERT INTO berita (judul, berita) VALUES ('$judul', '$isi')";
        $result = $this->conn->query($sql);
        if($result){
            header('Location: ../app/pengumuman.php?msg=ins');
        } else {
            echo "Error ".$result."<br>".$this->conn->error;
        }  
    }
    
    public function ubahBerita($post){
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $sql = "UPDATE berita SET judul='$judul', berita='$isi' WHERE id = '$id' ";
        $result = $this->conn->query($sql);
        if($result){
            header('Location: ../app/pengumuman.php?msg=upd');
        } else {
            echo "Error ".$result."<br>".$this->conn->error;
        }  
    }

    public function editBerita($id){
        $sql = "SELECT * FROM berita WHERE id = '$id' ";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
        $pengumuman = $result->fetch_assoc();
        return $pengumuman;
        }
    }

    public function hapusBerita($deleteid){
        $sql = "DELETE FROM berita WHERE id = '$deleteid'";
        $result = $this->conn->query($sql);
        if($result){
            header('Location: ../app/pengumuman.php?msg=del');
        } else {
            echo "Error ".$result."<br>".$this->conn->error;
        }  
    }
    public function tampilBerita(){
        $sql = "SELECT * FROM berita";
        return $this->conn->query($sql);
    } 

    public function tampilJurusan(){
        $query = "SELECT id_jurusan FROM tb_jurusan";
        $result = $this->conn->query($query);
    }

    //jumlah mhs, jur, mtk
    public function jmlMhs(){
    $sql = "SELECT nim FROM tb_mahasiswa";
    return $this->conn->query($sql);
    }

    public function jmlJur(){
    $sql = "SELECT id_jurusan FROM tb_jurusan";
    return $this->conn->query($sql);
    }

    public function jmlMtk(){
    $sql = "SELECT id_matkul FROM tb_matkul";
    return $this->conn->query($sql);
    }
}

class JurusanMataKuliah extends Connection{
    public function jurMatkul(){
        $sql = "SELECT j.nama_jurusan as jurusan, mk.nama_matkul as matkul, mk.sks as sks, mk.semester as smst FROM tb_jurusan j JOIN tb_jurmtk jm ON j.id_jurusan = jm.id_jurusan JOIN tb_matkul mk ON mk.id_matkul = jm.id_matkul";
        return $this->conn->query($sql);
          }
}