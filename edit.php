<?php
    session_start();
    include 'koneksi.php';

    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM buku WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);

    $query = mysqli_query($koneksi, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Edit</title>
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
            <h1>Form Edit Buku</h1>

            <form action="proses_edit.php" method="POST">
                <label>ID Buku</label>
                <input type="text" value="<?php echo $data['id']; ?>" class="form-input gray-input" readonly>
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                
                <div class="row">
                    <div class="col-md-6">
                        <label>Kode Buku</label>
                        <input type="text" name="kode_buku" value="<?php echo $data['kode_buku']; ?>" class="form-input">
                    </div>

                    <div class="col-md-6">
                        <label>Jumlah Stok</label>
                        <input type="number" name="stok" value="<?php echo $data['stok']; ?>" class="form-input">
                    </div>
                </div>

                <label>Judul Buku</label>
                <input type="text" name="judul" value="<?php echo $data['judul']; ?>" class="form-input">

                <label>Pengarang</label>
                <input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>" class="form-input">

                <label>Kategori</label>
                <select name="kategori" class="form-input">
                    <option value="Fiksi"
                    <?php
                    if($data['kategori'] == 'Fiksi'){
                        echo "selected";
                    }
                    ?>
                    >Fiksi</option>

                    <option value="Sains"
                    <?php
                    if($data['kategori'] == 'Sains'){
                        echo "selected";
                    }
                    ?>
                    >Sains</option>

                    <option value="Teknologi"
                    <?php
                    if($data['kategori'] == 'Teknologi'){
                        echo "selected";
                    }
                    ?>
                    >Teknologi</option>
                </select>

                <div class="button-box">
                    <a href="koleksi.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>

</body>
</html>