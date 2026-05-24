<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Tambah Produk Baru</h2>
    <form action="store.php" method="POST">
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="name" required>
        </div>
        <div class="form-group">
            <label>Harga (Rp)</label>
            <input type="number" name="price" step="1000" required>
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stock" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn">Batal</a>
    </form>
</div>
</body>
</html>
