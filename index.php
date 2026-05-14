<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body class="login-body">

    <section class="login-container">

        <div class="login-box">
            <div class="title-section">
                <h1>Pustaka Digital</h1>
                <p>Sistem Perpustakaan Nasional</p>
            </div>

            <!-- Error -->
            <?php
                if(isset($_SESSION['error'])){
            ?>

            <div class="error-box">
                <?php
                echo $_SESSION['error'];
                ?>
            </div>

            <?php
                unset($_SESSION['error']);
            }
            ?>

            <!-- Form -->
            <form action="proses_login.php" method="POST">
                    <label>Username</label>
                    <input
                    type="text"
                    name="username"
                    class="custom-input">

                    <label>Password</label>
                    <input
                    type="password"
                    name="password"
                    class="custom-input">

                <button type="submit" class="login-btn">
                    Masuk
                </button>
            </form>
        </div>

    </section>

</body>
</html>