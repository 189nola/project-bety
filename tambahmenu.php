<?php

use function PHPSTORM_META\type;

session_start();
include 'koneksi.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="image/logo.png">
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
</head>

<body>

    <!--header-->
    <header style="background-color: #f0a2d9;">
        <div class="container">
            <h1><a href="dashboard.php">Food Nr</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="daftarmenu.php">Daftar Menu</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--content-->

    <div class="section">
        <div class="container">
            <h3>Tambah Menu</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value="">--pilih--</option>
                        <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                        while ($r = mysqli_fetch_array($kategori)) {

                            ?>

                            <option value="<?php echo $r['id_kategori'] ?>">
                                <?php echo $r['nama_kategori'] ?>
                            </option>
                        <?php } ?>
                    </select>

                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                    <input type="file" name="gambar" class="input-control" required>
                    <textarea name="deskripsi" class="input-control" cols="30" rows="10" placeholder="Deskripsi"></textarea><br>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                    <select name="status" class="input-control">
                        <option value="">--pilih--</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>

                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    $kategori = $_POST['kategori'];
                    $nama = $_POST['nama'];
                    $harga = $_POST['harga'];
                    $deskripsi = $_POST['deskripsi'];
                    $status = $_POST['status'];

                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];


                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];

                    $newname = 'menu' . time() . '.' . $type2;

                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                    if (!in_array($type2, $tipe_diizinkan)) {
                        echo '<script>alert("format salah")</script>';
                    } else {
                        move_uploaded_file($tmp_name, './menu/' . $newname);

                        $insert = mysqli_query($conn, "INSERT INTO tb_menu VALUES (
                            null,
                            '" . $kategori . "',
                            '" . $nama . "',
                            '" . $harga  . "',
                            '" . $deskripsi . "',
                            '" . $newname . "',
                            '" . $status . "',
                            null
                            ) ");

                        if ($insert) {
                            echo '<script>alert("Simpan Data Berhasil")</script>';
                            echo '<script>window.location="menu.php"</script>';
                        } else {
                            echo 'Gagal' . mysqli_error($conn);
                        }
                    }

                }
                ?>
            </div>
        </div>
    </div>

    <!--footer-->

    <footer>
        <div class="container">
            <center><p>&copy; <?php echo date("Y"); ?> Food. Hak Cipta Dilindungi</p><center>
        </div>
    </footer>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>

</html>