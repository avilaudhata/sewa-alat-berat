<?php
require_once "functions.php";

checkCookieLogin();
checkUserLogin();

$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/img/logofinal.png" type="image/png">
    <title>Tambah Produk - Gerigi Hijau Perkasa</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a href="home" class="navbar-brand d-flex align-items-center" aria-label="navigation">
                <img src="assets/img/logofinal.png" alt="Icon Gerigi HIjau Perkasa" class="me-1"> Gerigi Hijau Perkasa
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="list" class="nav-link">List Produk</a>
                    </li>
                    <li class="nav-item">
                        <a href="create" class="nav-link active" aria-current="page">Tambah Produk</a>
                    </li>
                </ul>
                <div class="dropdown d-none d-lg-block">
                    <img src="assets/img/icon-user.png" alt="Icon User" class="btn dropdown-toggle p-0" data-bs-toggle="dropdown" aria-expanded="false">
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                        <li>
                            <button type="button" class="dropdown-item user-select-none pe-auto">
                                Signed in as <span class="fw-bold"><?= $username; ?></span>
                            </button>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a href="logout" class="dropdown-item link-warning fw-semibold">Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="text-light mb-3 user-select-none d-lg-none">
                    Signed in as <span class="fw-bold"><?= $username; ?></span>
                </div>
                <a href="logout" class="btn btn-warning mb-2 fw-semibold d-lg-none">Logout</a>
            </div>
        </div>
    </nav>

    <main class="container my-3 p-3 px-lg-5">
        <h1 class="text-center fs-3 fw-bold">Tambah Produk</h1>
        <h2 class="text-center fs-6 mb-4">Please enter the required information below</h2>
        <form action="" method="post" class="row justify-content-center g-3" enctype="multipart/form-data" autocomplete="off">
            <div class="col-md-12 col-lg-10">
                <label for="title" class="form-label">Nama Produk</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Nama Produk..." maxlength="255" autofocus required>
            </div>
            <div class="col-md-6 col-lg-5">
                <label for="Fungsi" class="form-label">Fungsi</label>
                <input type="text" name="Fungsi" id="Fungsi" class="form-control" placeholder="Fungsi..." maxlength="100" required>
            </div>
            <div class="col-md-6 col-lg-5">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-select" aria-label="category">
                    <option value="Baru">Baru</option>
                    <option value="Bekas">Bekas</option>
                </select>
            </div>
            <div class="col-md-12 col-lg-10">
                <label for="link" class="form-label">Link</label>
                <div class="input-group">
                    <div class="input-group-text">https://</div>
                    <input type="text" name="link" id="link" class="form-control" placeholder="ptfi.co.id/" maxlength="255" required>
                </div>
            </div>
            <div class="col-md-6 col-lg-5">
                <label for="cover" class="form-label">
                    Cover <span class="fw-light">(Optional)</span>
                </label>
                <input type="file" name="cover" id="cover" class="form-control" accept=".jpg, .jpeg, .png" onchange="validateUploadCover()">
                <div id="coverInfo" class="form-text">Maximum File Size: 1 MB, Format File: jpg, jpeg, png</div>
            </div>
            <div class="col-md-6 col-lg-5">
                <label class="form-label">Type</label>
                <div class="row align-items-center mt-md-2">
                    <div class="col-2 form-check form-check-inline ms-3">
                        <input type="radio" name="type" id="free" class="form-check-input" value="Free" checked>
                        <label for="free" class="form-check-label">Free</label>
                    </div>
                    <div class="col-2 form-check form-check-inline">
                        <input type="radio" name="type" id="paid" class="form-check-input" value="Paid">
                        <label for="paid" class="form-check-label">Paid</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-10 mt-4 text-center">
                <button type="submit" name="submit" class="btn btn-warning fw-semibold">Submit</button>
            </div>
        </form>
    </main>

    <footer class="bg-dark text-light px-0 py-4 p-sm-4">
        <div class="container d-flex justify-content-between align-items-center flex-column flex-md-row">
            <div>
                &copy; <?= date("Y") ?>
                <a href="https://github.com/avilaudhata" target="_blank" rel="noopener noreferrer" class="link-warning text-decoration-none fw-semibold">
                     Avila Udhata
                </a>
            </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.33/dist/sweetalert2.all.min.js" integrity="sha256-uGRHvDtVpBeFd7aKWnNdg7qIo+f+dQPlFRMSTqOq7o8=" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    <?php if (isset($_POST["submit"])): ?>
        <?php if (addEbook($_POST) > 0): ?>
        <script>
            Swal.fire('Success!', 'Produk has been added', 'success');
        </script>
        <?php else: ?>
        <script>
            Swal.fire('Error!', 'Gagal Untuk Tambah Produk. Try again!', 'error');
        </script>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
