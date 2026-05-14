<?php
    session_start();
    include 'koneksi.php';

    if(isset($_GET['kembalikan'])){
        $id = $_GET['kembalikan'];
        $ambil = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id='$id'");
        $data_pinjam = mysqli_fetch_assoc($ambil);
        $judul_buku = $data_pinjam['judul_buku'];

    mysqli_query($koneksi, "UPDATE peminjaman SET status='Dikembalikan' WHERE id='$id'"); 
    mysqli_query($koneksi, "UPDATE buku SET stok = stok + 1 WHERE judul='$judul_buku'");

    header("location: peminjaman.php");
    exit();
}

$query = mysqli_query($koneksi, "SELECT * FROM peminjaman");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Peminjaman</title>
</head>
<body>

    <!-- Navbar -->
    
    <nav class="navbar navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pustaka Digital</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="koleksi.php">Koleksi Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="peminjaman.php">Peminjaman</a>
                </li>
                </ul>
                <a href="index.php" class="btn btn-light">Keluar</a>
            </div>
        </div>
    </nav>

    <main class="main-container">

        <div class="title-section">
            <h1>Database Peminjaman</h1>
        </div>

        <div class="button-section">
            <a href="catat_pinjam.php" class="btn btn-secondary"> + Catat Peminjaman</a>
        </div>

        <!-- Table -->
        <section class="table-pinjam-section">
            <div class="table-header">
                <p>No</p>
                <p>Kode Peminjaman</p>
                <p>Peminjam</p>
                <p>Judul Buku</p>
                <p>Tanggal Pinjam</p>
                <p>Tanggal Kembali</p>
                <p>Status</p>
                <p>Aksi</p>
            </div>

           <?php
                while($data = mysqli_fetch_assoc($query)){
            ?>

            <div class="table-row">
                <p><?php echo $data['id']; ?></p>
                <p><?php echo $data['kode_peminjaman']; ?></p>
                <p><?php echo $data['nama_peminjam']; ?></p>
                <p><?php echo $data['judul_buku']; ?></p>
                <p><?php echo $data['tanggal_peminjaman']; ?></p>
                <p><?php echo $data['tanggal_pengembalian']; ?></p>
                <p><?php echo $data['status']; ?></p>
             
                <div class="action-box">
                    <?php 
                        if($data['status'] == 'Dipinjam'){
                    ?>

                    <a href="peminjaman.php?kembalikan=<?php echo $data['id']; ?>" class="btn btn-info">Kembalikan</a>
                    
                    <?php } else { ?>
                    
                    <button class="selesai-btn">Selesai</button>
                    
                    <?php } ?>
                </div>

            </div>

            <?php
            }
            ?>

        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>