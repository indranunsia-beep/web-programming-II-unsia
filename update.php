<?php
session_start();
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];
    $name = trim($_POST['name']);
    $price = (float)$_POST['price'];
    $stock = (int)$_POST['stock'];

    $stmt = $conn->prepare("UPDATE products SET name = ?, price = ?, stock = ? WHERE id = ?");
    $stmt->bind_param("sdii", $name, $price, $stock, $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Produk berhasil diperbarui.";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
        $_SESSION['message_type'] = "error";
    }

    $stmt->close();
    $conn->close();
    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
