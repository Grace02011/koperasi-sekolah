<?php
require_once "config/database.php";

// Menghitung jumlah data
$total_products = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM products")
)['total'];

$total_suppliers = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM suppliers")
)['total'];

$total_employees = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM employees")
)['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Sekolah</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">

    <aside class="sidebar">
        <h2>Koperasi</h2>
        <p class="subtitle">Sistem Informasi</p>

        <nav>
            <a href="index.php" class="active">Dashboard</a>
            <a href="products/index.php">Products</a>
            <a href="suppliers/index.php">Suppliers</a>
            <a href="employees/index.php">Employees</a>
        </nav>
    </aside>

    <main class="content">

        <header>
            <h1>Dashboard</h1>
            <p>Informasi Koperasi Sekolah.</p>
        </header>

        <section class="cards">

            <div class="card">
                <h3>Total Products</h3>
                <h2><?= $total_products ?></h2>
                <p>Jumlah barang</p>
            </div>

            <div class="card">
                <h3>Total Suppliers</h3>
                <h2><?= $total_suppliers ?></h2>
                <p>Jumlah pemasok</p>
            </div>

            <div class="card">
                <h3>Total Employees</h3>
                <h2><?= $total_employees ?></h2>
                <p>Jumlah karyawan</p>
            </div>

        </section>

        <section class="welcome">
            <h2>Terkonek</h2>
            <p>
                Kalau muncul, tidak eror.
            </p>
        </section>

    </main>

</div>

</body>
</html>