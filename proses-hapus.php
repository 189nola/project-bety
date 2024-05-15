<?php

include'koneksi.php';

if (isset($_GET['idk'])){
    $delete = mysqli_query($conn, "DELETE FROM tb_kategori WHERE id_kategori = '".$_GET['idk']."' ");
    echo'<script>window.location="daftarmenu.php"</script>';
}

if(isset($_GET['idp'])){
    $menu = mysqli_query($conn, "SELECT gambar_menu FROM tb_menu WHERE id_menu = '".$_GET['idp']."' ");
    $p = mysqli_fetch_object($menu);

    unlink('./menu/.'.$p->gambar);

    $delete = mysqli_query($conn, "DELETE FROM tb_menu WHERE id_menu = '".$_GET['idp']."' ");
    echo'<script>window.location="menu.php"</script>';
}

?>