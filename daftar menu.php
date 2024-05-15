<?php
session_start();
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
    <link rel="stylesheet" href="dasbor.css">
    <link rel="icon" href="##">
</head>

<body>

    <!--header-->

    <header style="background-color: #b6795b;">
        <div class="container">
            <h1><a href="dashboard.php">Food Nr</a></h1>
            <ul>
                <li><a href="dashboard.php">Dasbord</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="daftar_menu.php">Daftar menu</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>

    <?php
    if (session_status() === PHP_SESSION_NONE) {
session_start();
include 'koneksi.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$host = "your_host";
$username = "your_username";
$password = "your_password";
$database = "your_database";
$koneksi = mysqli_connect($host, $username, $password, $database);
if (!$koneksi) {
    
   
die("Connection failed: " . mysqli_connect_error());
}
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food</title>
        <link rel="stylesheet" href="style/dasbor.css">
        <link rel="icon" href="image/logo.png">
    </head>

    <body>

        <!--content-->

        <div class="section">
            <div class="container">
                <center><h3>Data Menu</h3></center>
                <div class="box">
                        <p><a href="tambah-menu.php" class="btn" style="background-color: #b6795b;">Tambah Menu</a></p>\
                    <br>
                    <table border="1" cellspacing="0" class="table">
                        <thead>
                            <tr>
                                <th width="40px">No</th>
                                <th>Menu</th>
                                <th>Nama Menu</th>
                                <th>Gambar</th>
                                <th>Kategori</th>
                                <th width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            $menu = mysqli_query($koneksi, "SELECT * FROM tb_kategori LEFT JOIN tb_menu USING (id_menu) ORDER BY id_menu DESC");
                            $query = "SELECT * FROM tb_menu";
                            $result = mysqli_query($koneksi, $query);
                            if (mysqli_num_rows($menu) > 0) {
                            while ($row = mysqli_fetch_array($menu)) {
                                ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $row['nama_kategori'] ?>
                                </td>
                                <td>
                                    <?php echo $row['nama_menu'] ?>
                                </td>
                                <td><a href="menu/<?php echo $row['gambar'] ?>" target="_blank">
                                        <img src="menu/<?php echo $row['gambar'] ?>" width="60px"></a></td>
                                <td>
                                    <?php echo $row['deskripsi'] ?>
                                </td>
                                <td>
                                    <a href="edit-menu.php?id=<?php echo $row['id_menu'] ?>">Edit</a> ||
                                    <a href="hapus-menu.php?idp=<?php echo $row['id_menu'] ?>"
                                        onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')">Hapus<a>
                                </td>
                            </tr>
                            <?php }
                            } else { ?>
                            <tr>
                                <td colspan="8">Tidak Ada Data</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--footer-->

        <footer>
        <div class="container">
            <center><p>&copy; <?php echo date("Y"); ?> Food. Hak Cipta Dilindungi</p><center>
        </div>
    </footer>

    </body>

    </html>