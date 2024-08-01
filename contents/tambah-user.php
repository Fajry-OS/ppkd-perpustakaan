<?php
if (isset($_POST['simpan'])) {
    // jika param edit ada maka update, selain itu maka tambah
    $id = isset($_GET['edit']) ? $_GET['edit'] : '';


    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    if (!$id) {
        $queryInsert = mysqli_query($koneksi, "INSERT INTO user (nama_lengkap, email, password) VALUES ('$nama_lengkap', '$email', '$password') ");
    } else {
        $updateUser = mysqli_query($koneksi, "UPDATE user SET  nama_lengkap = '$nama_lengkap',  email = '$email', password ='$password' WHERE id ='$id' ");
    }
    header("Location:?pg=user&tambah=berhasil");
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id = '$id'");
    header("location:?pg=user&delete=berhasil");
}
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$id'");
    $rowEdit = mysqli_fetch_assoc($edit);
}
?>
<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-sm-8">

            <div class="card">
                <div class="card-header">Data User</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Lengkap</label>
                            <input value="<?= $rowEdit['nama_lengkap'] ?? '' ?>" type="text" class="form-control" name="nama_lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input value="<?= $rowEdit['email'] ?? '' ?>" type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input value="" type="password" class="form-control" name="password">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>