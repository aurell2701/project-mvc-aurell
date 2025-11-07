<?php ob_start(); ?>
<h1>Daftar Users</h1>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Dibuat Pada</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id'] ?? '') ?></td>
                    <td><?= htmlspecialchars($user['name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($user['Email'] ?? ($user['email'] ?? '')) ?></td>
                    <td><?= htmlspecialchars($user['created_at'] ?? '') ?></td>
                    <td><a href="/users/<?= htmlspecialchars($user['id'] ?? '') ?>">Lihat</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5">Belum ada data pengguna.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<?php $content = ob_get_clean(); ?>
<?php require __DIR__ . '/../layouts/main.php'; ?>