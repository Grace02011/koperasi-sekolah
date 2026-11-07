<?php
require_once "../config/database.php";

$product_code = trim($_POST['product_code'] ?? '');
$product_name = trim($_POST['product_name'] ?? '');
$category = $_POST['category'] ?? '';
$unit = $_POST['unit'] ?? '';
$price = $_POST['price'] ?? '';
$stock = $_POST['stock'] ?? '';
$entry_date = $_POST['entry_date'] ?? '';
$description = trim($_POST['description'] ?? '');

$categories = ['Food', 'Drink', 'Stationery', 'Uniform'];
$units = ['Pcs', 'Pack', 'Bottle'];

if (
    $product_code == '' ||
    $product_name == '' ||
    $category == '' ||
    $unit == '' ||
    $price == '' ||
    $stock == '' ||
    $entry_date == ''
) {
    die("Semua kolom wajib harus diisi.");
}

if (!in_array($category, $categories, true)) {
    die("Kategori tidak valid.");
}

if (!in_array($unit, $units, true)) {
    die("Satuan tidak valid.");
}

if (!is_numeric($price) || $price < 0) {
    die("Harga tidak boleh negatif.");
}

if (!filter_var($stock, FILTER_VALIDATE_INT) || $stock < 0) {
    die("Stok harus berupa angka bulat dan tidak boleh negatif.");
}

$check = mysqli_prepare(
    $conn,
    "SELECT product_id FROM products WHERE product_code = ?"
);

mysqli_stmt_bind_param($check, "s", $product_code);
mysqli_stmt_execute($check);

$result = mysqli_stmt_get_result($check);

if (mysqli_num_rows($result) > 0) {
    die("Kode barang sudah digunakan. Silakan gunakan kode lain.");
}

mysqli_stmt_close($check);

$sql = "INSERT INTO products
(product_code, product_name, category, unit, price, stock, entry_date, description)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssssdiss",
    $product_code,
    $product_name,
    $category,
    $unit,
    $price,
    $stock,
    $entry_date,
    $description
);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}

?>