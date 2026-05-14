<?php
    include 'koneksi.php';

    $kode_peminjaman =$_POST['kode_peminjaman'];
    $nama_peminjam =$_POST['nama_peminjam'];
    $judul_buku =$_POST['judul_buku'];
    $tanggal_peminjaman =$_POST['tanggal_peminjaman'];
    $tanggal_pengembalian =$_POST['tanggal_pengembalian'];
    $status = "Dipinjam";

    mysqli_query($koneksi,"INSERT INTO peminjaman (kode_peminjaman,nama_peminjam,judul_buku,tanggal_peminjaman,tanggal_pengembalian,status) VALUES ('$kode_peminjaman','$nama_peminjam','$judul_buku','$tanggal_peminjaman','$tanggal_pengembalian','$status')");

    mysqli_query($koneksi, "UPDATE buku SET stok = stok - 1 WHERE judul='$judul_buku'");

    header("location: peminjaman.php");
?>