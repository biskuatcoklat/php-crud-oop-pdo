<?php 
class Proses
{
    public function __construct()
    {
        $host ="localhost";
        $dbname="siswa";
        $username="root";
        $password="";
        $this->koneksi = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }

    public function show()
    {
        $query=$this->koneksi->prepare("SELECT * FROM kelas");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
        
    }

    public function add($nama, $kelas, $alamat)
    {
        $data = $this->koneksi->prepare('INSERT INTO kelas (nama,kelas,alamat) VALUES (?, ?, ?)');
        
        $data->bindParam(1, $nama);
        $data->bindParam(2, $kelas);
        $data->bindParam(3, $alamat);
 
        $data->execute();
        return $data->rowCount();
    }

    public function getData($id){
        $query = $this->koneksi->prepare("SELECT * FROM kelas where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }

    public function update($id,$nama,$kelas,$alamat){
        $query = $this->koneksi->prepare('UPDATE kelas set nama=?,kelas=?,alamat=? where id=?');
        
        $query->bindParam(1, $nama);
        $query->bindParam(2, $kelas);
        $query->bindParam(3, $alamat);
        $query->bindParam(4, $id);
 
        $query->execute();
        return $query->rowCount();
    }

    public function delete($id)
    {
        $query = $this->koneksi->prepare("DELETE FROM kelas where id=?");
 
        $query->bindParam(1, $id);
 
        $query->execute();
        return $query->rowCount();
    }
}

?>