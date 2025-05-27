<?php
require 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "User tidak ditemukan.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    if ($name && $email) {
        $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([$name, $email, $id]);
        header("Location: index.php");
        exit;
    }
}
?>

<h2>Edit User</h2>
<form method="POST">
    Nama: <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">Kembali</a>
