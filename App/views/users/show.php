<?php ob_start(); ?>
<h1>User Details</h1>

<?php if (!empty($user)): ?>
    <p><strong>ID:</strong> <?= htmlspecialchars($user['id'] ?? '') ?></p>
    <p><strong>Name:</strong> <?= htmlspecialchars($user['name'] ?? '') ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($user['Email'] ?? ($user['email'] ?? '')) ?></p>
    <p><strong>Created At:</strong> <?= htmlspecialchars($user['created_at'] ?? '') ?></p>
<?php else: ?>
    <p>User data not found.</p>
<?php endif; ?>

<a href="/users">Back</a>

<?php $content = ob_get_clean(); ?>
<?php require __DIR__ . '/../layouts/main.php'; ?>