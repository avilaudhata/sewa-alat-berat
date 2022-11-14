<?php
require_once "functions.php";

checkCookieLogin();
checkUserLogin();
checkUserRole();
checkUrlId();

$username = $_SESSION["username"];
$id = $_GET["id"];
$produk = query("SELECT * FROM produk WHERE id = $id");
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
    <title> Update Produk - Gerigi Hijau Perkasa</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" aria-label="navigation">
        <div class="container">
            <a href="home" class="navbar-brand d-flex align-items-center">
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
                        <a href="create" class="nav-link">Tambah Produk</a>
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
        <h1 class="text-center fs-3 fw-bold"> Update Produk</h1>
        <h2 class="text-center fs-6 mb-4">Please enter the required information below</h2>
        <form action="" method="post" class="row justify-content-center" enctype="multipart/form-data" autocomplete="off">
            <div class="col-md-3 text-center">
                <figure class="figure">
                    <img src="assets/img/<?= $produk["cover"]; ?>" alt="<?= $produk["cover"]; ?>" class="figure-img img-thumbnail">
                    <figcaption class="figure-caption">
                        <input type="text" name="oldCover" id="oldCover" class="form-control-plaintext text-center" value="<?= $produk["cover"]; ?>" readonly>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-9">
                <div class="row g-3">
                    <div class="col-md-2">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" name="id" id="id" class="form-control" value="<?= $produk["id"]; ?>" readonly>
                    </div>
                    <div class="col-md-10">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?= $produk["title"]; ?>" maxlength="255" autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="Fungsi" class="form-label">Fungsi</label>
                        <input type="text" name="Fungsi" id="Fungsi" class="form-control" value="<?= $produk["Fungsi"]; ?>" maxlength="100">
                    </div>
                    <div class="col-md-6">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select" aria-label="category">
                            <option <?php if ($produk["category"] === "Baru"): ?>selected<?php endif; ?> value="Baru">Baru</option>
                            <option <?php if ($produk["category"] === "Bekas"): ?>selected<?php endif; ?> value="Bekas">Bekas</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" name="link" id="link" class="form-control" value="<?= $produk["link"]; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Type</label>
                        <div class="row align-items-center mt-md-2">
                            <div class="col-2 form-check form-check-inline ms-3">
                                <input type="radio" name="type" id="free" class="form-check-input" <?= $produk["type"] === "Free" ? "checked" : ""; ?> value="Free">
                                <label for="free" class="form-check-label">Free</label>
                            </div>
                            <div class="col-2 form-check form-check-inline">
                                <input type="radio" name="type" id="paid" class="form-check-input" <?= $produk["type"] === "Paid" ? "checked" : ""; ?> value="Paid">
                                <label for="paid" class="form-check-label">Paid</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="cover" class="form-label">
                            Cover <span class="fw-light">(Optional)</span>
                        </label>
                        <input type="file" name="cover" id="cover" class="form-control" accept=".jpg, .jpeg, .png" onchange="validateUploadCover()">
                        <div id="coverInfo" class="form-text">Maximum File Size: 1 MB, Format File: jpg, jpeg, png</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <div class="row align-items-center mt-md-2">
                            <div class="col-3 form-check form-check-inline ms-3">
                                <input type="radio" name="status" id="Tersedia" class="form-check-input" <?= $produk["status"] === "Tersedia" ? "checked" : ""; ?> value="Tersedia">
                                <label for="Tersedia" class="form-check-label">Tersedia</label>
                            </div>
                            <div class="col-3 form-check form-check-inline">
                                <input type="radio" name="status" id="Tidak Tersedia" class="form-check-input" <?= $produk["status"] === "Tidak Tersedia" ? "checked" : ""; ?> value="Tidak Tersedia">
                                <label for="Tidak Tersedia" class="form-check-label">Tidak Tersedia</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4 text-center">
                        <button type="submit" name="submit" class="btn btn-warning fw-semibold">Submit</button>
                    </div>
                </div>
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
        <?php $result = updateEbook($_POST); ?>
        <?php if ($result > 0): ?>
        <script>
            let timerInterval;
            Swal.fire({
                title: 'Success!',
                html: 'Produk has been updated. <b>Wait a second!</b>',
                icon: 'success',
                allowOutsideClick: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                    clearInterval(timerInterval);
                },
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = window.location.href;
                }
            });
        </script>
        <?php elseif ($result === 0): ?>
        <script>
            Swal.fire('No Updates!', 'Data eBook not changed', 'warning');
        </script>
        <?php else: ?>
        <script>
            Swal.fire('Error!', 'Failed to  Update Produk. Try again!', 'error');
        </script>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
