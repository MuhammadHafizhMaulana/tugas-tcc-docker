<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    if ($name && $email) {
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);
        header("Location: index.php");
        exit;
    }
}
?>

<h2>Tambah User</h2>
<form method="POST">
    Nama: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    <button type="submit">Simpan</button>
</form>
<a href="index.php">Kembali</a>
