<?php
require_once "../config/database.php";

$id = $_GET['id'] ?? '';

if (!filter_var($id, FILTER_VALIDATE_INT)) {
    die("ID barang tidak valid.");
}

$sql = "SELECT * FROM products WHERE product_id = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$product = mysqli_fetch_assoc($result);

if (!$product) {
    die("Data barang tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="content">
    <h1>Edit Barang</h1>

    <form action="update.php" method="POST">

        <input type="hidden" name="product_id"
               value="<?php echo $product['product_id']; ?>">

        <p>Kode Barang</p>
        <input type="text" name="product_code"
               maxlength="10" required
               value="<?php echo htmlspecialchars($product['product_code']); ?>">

        <p>Nama Barang</p>
        <input type="text" name="product_name"
               maxlength="100" required
               value="<?php echo htmlspecialchars($product['product_name']); ?>">

        <p>Kategori</p>
        <select name="category" required>
            <?php
            $categories = ['Food', 'Drink', 'Stationery', 'Uniform'];

            foreach ($categories as $category) {
                $selected = ($product['category'] == $category)
                    ? 'selected' : '';

                echo "<option value='$category' $selected>$category</option>";
            }
            ?>
        </select>

        <p>Satuan</p>

        <?php
        $units = ['Pcs', 'Pack', 'Bottle'];

        foreach ($units as $unit) {
            $checked = ($product['unit'] == $unit)
                ? 'checked' : '';

            echo "<label>";
            echo "<input type='radio' name='unit' value='$unit' $checked>";
            echo $unit;
            echo "</label> ";
        }
        ?>

        <p>Harga</p>
        <input type="number" name="price"
               min="0" step="0.01" required
               value="<?php echo $product['price']; ?>">

        <p>Stok</p>
        <input type="number" name="stock"
               min="0" required
               value="<?php echo $product['stock']; ?>">

        <p>Tanggal Masuk</p>
        <input type="date" name="entry_date" required
               value="<?php echo $product['entry_date']; ?>">

        <p>Deskripsi</p>
        <textarea name="description"><?php
            echo htmlspecialchars($product['description']);
        ?></textarea>

        <br><br>

        <button type="submit">Simpan</button>
        <a href="index.php">Batal</a>

    </form>
</div>

</body>
</html>