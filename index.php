<?php 
require_once "proses.php";
$koneksi = new Proses();
$data = $koneksi->show();
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $hapus = $koneksi->delete($id);
    if($hapus)
    {
        header('Location: index.php');
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
    <title>Testing</title>
</head>
<body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <h3>Data Siswa</h3>
            </div>
            <div class="card-body">
                <a href="tambahdata.php" class="btn btn-primary">Tambah data</a><hr/>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach($data as $datas) { ?> 
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $datas["nama"]; ?></td>
                            <td><?= $datas["kelas"]; ?></td>
                            <td><?= $datas["alamat"]; ?></td>
                            <td>
                                <a href="edit.php?id=<?= $datas["id"]; ?>" class="btn btn-warning">Edit</a>
                                <a href="index.php?delete=<?= $datas["id"]; ?>" onclick=" return confirm ('Do You Want to delete data?');" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</body>
</html>