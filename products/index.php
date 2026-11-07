<?php
require_once "../config/database.php";

$query = mysqli_query($conn, "SELECT * FROM products ORDER BY product_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="content">
    <h1>Data Barang</h1>

    <p>
        <a href="../index.php">Kembali ke Dashboard</a>
    </p>

    <p>
        <a href="create.php">Tambah Barang</a>
    </p>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        while ($data = mysqli_fetch_assoc($query)) {
        ?>

        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($data['product_code']); ?></td>
            <td><?php echo htmlspecialchars($data['product_name']); ?></td>
            <td><?php echo htmlspecialchars($data['category']); ?></td>
            <td><?php echo $data['price']; ?></td>
            <td><?php echo $data['stock']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $data['product_id']; ?>">Edit</a>
                |
                <a href="delete.php?id=<?php echo $data['product_id']; ?>">Hapus</a>
            </td>
        </tr>

        <?php } ?>

    </table>
</div>

</body>
</html>