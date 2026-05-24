<?php
session_start();
require_once 'config/database.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int)$_GET['id'];

    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Produk berhasil dihapus.";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Gagal menghapus: " . $stmt->error;
        $_SESSION['message_type'] = "error";
    }

    $stmt->close();
} else {
    $_SESSION['message'] = "ID tidak valid.";
    $_SESSION['message_type'] = "error";
}

$conn->close();
header("Location: index.php");
exit();
?>
