<?php
session_start();
require_once 'config/database.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = (int)$_GET['id'];

// Ambil data produk berdasarkan id
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $_SESSION['message'] = "Data tidak ditemukan.";
    $_SESSION['message_type'] = "error";
    header("Location: index.php");
    exit();
}

$product = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Edit Produk</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
        </div>
        <div class="form-group">
            <label>Harga (Rp)</label>
            <input type="number" name="price" value="<?= $product['price'] ?>" step="1000" required>
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stock" value="<?= $product['stock'] ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="index.php" class="btn">Batal</a>
    </form>
</div>
</body>
</html>
