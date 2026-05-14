<?php
    session_start();
    include 'koneksi.php';

    $kode_buku = $_POST['kode_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];

    $query = mysqli_query($koneksi,"INSERT INTO buku(kode_buku, judul, pengarang, kategori, stok)
    VALUES('$kode_buku','$judul','$pengarang','$kategori','$stok')");

    header("location: koleksi.php");
    exit();
?>