<?php
session_start();
include'koneksi.php';
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
            <h3>Daftar Menu</h3>
            <div class="box">
            <p><a href="tambah-daftarmenu.php" class="btn" style="background-color:#f0a2d9;">Tambah Menu</a></p><br>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="40px">No</th>
                            <th>Kategori</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                    $no = 1;
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                    if(mysqli_num_rows($kategori) > 0 ) {
                    while($row = mysqli_fetch_array($kategori)){
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['nama_kategori'] ?></td>
                            <td>
                                <a href="edit-daftarmenu.php?id=<?php echo $row['id_kategori'] ?>">Edit</a> || 
                                <a href="proses-hapus.php?idk=<?php echo $row['id_kategori'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')">Hapus</a>
                            </td>
                        </tr>
                        <?php } }else{ ?>
                            <tr>
                                <td colspan="3">Tdak Ada Data</td>
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