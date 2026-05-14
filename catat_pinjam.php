<?php
    session_start();
    include 'koneksi.php';

    $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE stok > 0");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Catat Peminjaman</title>
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

    <!-- Main -->
    <div class="edit-container">
        <div class="edit-card">
            <h1>Form Data Peminjaman</h1>

            <form action="proses_pinjam.php" method="POST">
                
                <label>Kode Peminjam</label>
                <input type="text" name="kode_peminjaman" class="form-input">

                <label>Nama Peminjam</label>
                <input type="text" name="nama_peminjam" class="form-input">

                <label>Pilih Buku</label>
                <select name="judul_buku" class="form-input">
                    <option value="" selected disabled>Pilih Buku Tersedia</option>

                    <?php
                        while($data = mysqli_fetch_assoc($query)){
                    ?>

                    <option value="<?php echo $data['judul']; ?>">
        
                    <?php
                        echo $data['judul'];
                    ?>
                     - Stok:
                    <?php
                        echo $data['stok'];
                    ?>

                    </option>

                    <?php } ?>

                </select>
                
                <div class="row">
                    <div class="col-md-6">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="tanggal_peminjaman" class="form-input">
                    </div>

                    <div class="col-md-6">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tanggal_pengembalian" class="form-input">
                    </div>
                </div>

                <div class="button-box">
                    <a href="peminjaman.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>

</body>
</html>