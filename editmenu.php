<?php

use function PHPSTORM_META\type;

session_start();
include 'koneksi.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$menu = mysqli_query($conn, "SELECT * FROM tb_menu WHERE id_menu = '" . $_GET['id'] . "' ");
if(mysqli_num_rows($menu)== 0){
    echo '<script>window.location="menu.php"</script>';
}
$p = mysqli_fetch_object($menu);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>𝑸𝒖𝒂𝒓𝒕𝒆𝒓 𝑳𝒊𝒇𝒆 𝑪𝒓𝒊𝒔𝒊𝒔</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="image/logo.png">
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
</head>

<body>

    <!--header-->

    <header style="background-color: #df8600;">
        <div class="container">
            <h1><a href="dashboard.php">Food</a></h1>
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
            <h3>Edit Menu</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value="">--pilih--</option>
                        <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                        while ($r = mysqli_fetch_array($kategori)) {
                            ?>
                            <option value="<?php echo $r['id_kategori'] ?>" <?php echo ($r['id_kategori'] == $p->id_kategori) ? '
                            selected' : ''; ?>><?php echo $r['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>

                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk"
                        value="<?php echo $p->nama_menu ?>" required>
                    <img src="menu/<?php echo $p->gambar_menu ?>" width="150px">
                    <input type="hidden" name="foto" value="<?php echo $p->gambar_menu ?>">

                    <input type="file" name="gambar" class="input-control">
                    <textarea name="deskripsi" class="input-control" cols="30" rows="10" placeholder="Deskripsi"
                        value="<?php echo $p->deskripsi_menu ?>"></textarea><br>

                    <select name="status" class="input-control">
                        <option value="">--pilih--</option>
                        <option value="1" <?php echo ($p->status_menu == 1) ? 'selected' : ''; ?>>Aktif</option>
                        <option value="0" <?php echo ($p->status_menu == 0) ? 'selected' : ''; ?>>Tidak Aktif</option>
                    </select>

                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $kategori = $_POST['kategori'];
                    $nama = $_POST['nama'];
                    
                    $deskripsi = $_POST['deskripsi'];
                    $status = $_POST['status'];
                    $foto = $_POST['foto'];

                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];


                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];
                   

                    if($filename != '' ){

                        $newname = 'menu' . time() . '.' . $type2;

                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                        if (!in_array($type2, $tipe_diizinkan)) {
                            echo '<script>alert("format salah")</script>';

                        } else {
                            unlink('./menu/.'.$foto);
                            move_uploaded_file($tmp_name, './menu/' . $newname);
                            $namagambar = $newname;

                        }
                    }else{
                        $namagambar = $foto;

                    }

                    $update = mysqli_query($conn, "UPDATE tb_menu SET
                    id_kategori = '".$kategori."',
                    nama_menu = '".$nama."',
                    deskripsi_menu = '".$deskripsi."',
                    gambar_menu = '".$namagambar."',
                    status_menu = '".$status."'
                    WHERE id_menu = '".$p->id_menu."'
                    ");

                    if ($update) {
                        echo '<script>alert("ubah Data Berhasil")</script>';
                        echo '<script>window.location="menu.php"</script>';
                    } else {
                        echo 'Gagal' . mysqli_error($conn);
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!--footer-->

    <<footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Food NR. Hak Cipta Dilindungi</p>
        </div>
    </footer>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>

</html>