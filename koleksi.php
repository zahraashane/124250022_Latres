<?php
    session_start();
    include 'koneksi.php';

    if(!isset($_SESSION['login'])){
        header("location: index.php");
        exit();
}

$query = mysqli_query($koneksi, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Koleksi</title>
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
            <h1>Koleksi Buku</h1>
        </div>

        <div class="button-section">
            <button type="button" class="add-btn" data-bs-toggle="modal" data-bs-target="#tambahkoleksi">
                + Tambah Koleksi
            </button>
        </div>

        <!-- Table -->
        <section class="table-section">
            <div class="table-header">
                <p>ID</p>
                <p>Kode Buku</p>
                <p>Judul</p>
                <p>Pengarang</p>
                <p>Kategori</p>
                <p>Stok</p>
                <p>Status</p>
                <p>Aksi</p>
            </div>

           <?php
                while($data = mysqli_fetch_assoc($query)){
            ?>

            <div class="table-row">
                <p><?php echo $data['id']; ?></p>
                <p><?php echo $data['kode_buku']; ?></p>
                <p><?php echo $data['judul']; ?></p>
                <p><?php echo $data['pengarang']; ?></p>
                <p><?php echo $data['kategori']; ?></p>
                <p><?php echo $data['stok']; ?></p>
                
                <p>
                    <?php
                    if($data['stok'] == 0){
                        echo "Habis";
                    }elseif($data['stok'] <= 5){
                        echo "Menipis";
                    }else{
                        echo "Tersedia";
                    }
                    ?>
                </p>

                <div class="action-box">
                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-success">Edit</a>
                    <a href="hapus.php?id=<?php echo $data['id']; ?>"class="btn btn-warning" onclick="return confirm
                    ('Yakin ingin menghapus data ini?')">Hapus</a>
                </div>

            </div>

            <?php
            }
            ?>

        </section>

        <!-- Modal -->
        <div class="modal fade" id="tambahkoleksi" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
            
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Koleksi Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
        
                <div class="modal-body">

                <div class="row">
                <div class="col-md-6">
                    <form action="proses_tambah.php" method="POST">
                    <label>Kode Buku</label>
                    <input type="text" name="kode_buku" class="form-input" required>
                </div>
                <div class="col-md-6">
                    <label>Jumlah Stok</label>
                    <input type="text" name="stok" class="form-input" required>
                </div>
                </div>

                    <label>Judul Buku</label>
                    <input type="text" name="judul" class="form-input" required>

                    <label>Pengarang</label>
                    <input type="text" name="pengarang" class="form-input" required>

                    <label>Kategori</label>
                    <select name="kategori" class="form-input">
                        <option value="Fiksi">Fiksi</option>
                        <option value="Sains">Sains</option>
                        <option value="Teknologi">Teknologi</option>
                    </select>

                    <div class="modal-button">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>

                    </form>

                </div>
                </div>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>