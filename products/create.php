<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="content">
    <h1>Form Tambah Barang</h1>

    <form action="store.php" method="POST">

        <p>
            Kode Barang:<br>
            <input type="text" name="product_code" maxlength="10" required>
        </p>

        <p>
            Nama Barang:<br>
            <input type="text" name="product_name" maxlength="100" required>
        </p>

        <p>
            Kategori:<br>
            <select name="category" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Food">Food</option>
                <option value="Drink">Drink</option>
                <option value="Stationery">Stationery</option>
                <option value="Uniform">Uniform</option>
            </select>
        </p>

        <p>
            Satuan:<br>
            <input type="radio" name="unit" value="Pcs" required> Pcs
            <input type="radio" name="unit" value="Pack"> Pack
            <input type="radio" name="unit" value="Bottle"> Bottle
        </p>

        <p>
            Harga:<br>
            <input type="number" name="price" min="0" step="0.01" required>
        </p>

        <p>
            Stok:<br>
            <input type="number" name="stock" min="0" required>
        </p>

        <p>
            Tanggal Masuk:<br>
            <input type="date" name="entry_date" required>
        </p>

        <p>
            Deskripsi:<br>
            <textarea name="description"></textarea>
        </p>

        <button type="submit">Simpan</button>
        <a href="index.php">Batal</a>

    </form>
</div>

</body>
</html>