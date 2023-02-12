<?php 
require_once "proses.php";
$koneksi = new Proses();
if(isset($_GET['id'])){
    $id = $_GET['id']; 
    $data_siswa = $koneksi->getData($id);
}
else
{
    header('Location: index.php');
}
 
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat']; 
    $update = $koneksi->update($id,$nama,$kelas,$alamat);
    if($update)
    {
        echo "<script>alert('data berhasil diubah');
        document.location.href = 'index.php';</script>";
    }
    else
    {
        echo "<script>alert('data gagal diubah');
        document.location.href = 'index.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Edit Data</title>
</head>
<body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <h3>Tambah Data</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $data_siswa['id']; ?>"/>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control" id="nama" required autocomplete="off" autofocus value="<?php echo $data_siswa['nama'];?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">
                            <input type="text" name="kelas" class="form-control" id="kelas" value="<?php echo $data_siswa['kelas']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $data_siswa['alamat']?>">
                        </div>
                    </div><br>
                    <div class="form-group row">
                        <label for="nama_siswa" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <input type="submit" name="update" class="btn btn-primary" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</body>
</html>