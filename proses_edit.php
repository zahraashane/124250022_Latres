<?php
    include 'koneksi.php';

    $id = $_POST['id'];
    $kode_buku = $_POST['kode_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    
    $query = mysqli_query($koneksi,"UPDATE buku SET kode_buku='$kode_buku', judul='$judul', pengarang='$pengarang', kategori='$kategori', stok='$stok' WHERE id='$id'");

    header("location: koleksi.php");
    exit();
?>