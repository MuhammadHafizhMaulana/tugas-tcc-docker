<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Daftar User</h2>
<a href="create.php">Tambah User</a>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th><th>Nama</th><th>Email</th><th>Aksi</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user['id'] ?></td>
        <td><?= htmlspecialchars($user['name']) ?></td>
        <td><?= htmlspecialchars($user['email']) ?></td>
        <td>
            <a href="update.php?id=<?= $user['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Hapus user ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
