<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Kelola Chat - Admin</title>
<style>
  body{font-family:'Work Sans', Arial, sans-serif; background:#FDF6F3; margin:0;}
  .wrap{max-width:600px; margin:0 auto; padding:24px;}
  .item{display:block; background:#fff; border:1px solid #F0DED9; border-radius:10px; padding:14px 18px; margin-bottom:10px; color:#4A3B36; font-size:14px;}
</style>
</head>
<body>
<div class="wrap">
  <h2 style="color:#4A3B36;">Daftar Chat Pembeli</h2>
  <?php foreach ($buyers as $b): ?>
    <a href="/admin/chat/<?= $b['buyer_id'] ?>" class="item">👤 <?= esc($b['name']) ?></a>
  <?php endforeach; ?>
</div>
</body>
</html>