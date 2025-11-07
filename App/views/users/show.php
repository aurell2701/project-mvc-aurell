<?php ob_start(); ?>
<h1>Detail User</h1>

<?php if (!empty($user)): ?>
    <p><strong>ID:</strong> <?= htmlspecialchars($user['id'] ?? '') ?></p>
    <p><strong>Nama:</strong> <?= htmlspecialchars($user['name'] ?? '') ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($user['Email'] ?? ($user['email'] ?? '')) ?></p>
    <p><strong>Dibuat Pada:</strong> <?= htmlspecialchars($user['created_at'] ?? '') ?></p>
<?php else: ?>
    <p>Data user tidak ditemukan.</p>
<?php endif; ?>

<a href="/users">Kembali</a>

<?php $content = ob_get_clean(); ?>
<?php require __DIR__ . '/../layouts/main.php'; ?>