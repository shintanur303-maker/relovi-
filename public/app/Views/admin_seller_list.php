<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Kelola Penjual - Admin</title>
<style>
  body{font-family:'Work Sans', Arial, sans-serif; background:#FDF6F3; margin:0;}
  .wrap{max-width:600px; margin:0 auto; padding:24px;}
  .item{display:block; background:#fff; border:1px solid #F0DED9; border-radius:10px; padding:14px 18px; margin-bottom:10px; color:#4A3B36; font-size:14px; text-decoration:none;}
  .item b{display:block; font-size:15px; margin-bottom:2px;}
  .item span{color:#8A7A73; font-size:12px;}
  .empty{color:#8A7A73; font-size:14px;}
</style>
</head>
<body>
<div class="wrap">
  <h2 style="color:#4A3B36;">Penjual Menunggu Verifikasi</h2>

  <?php if (session()->getFlashdata('success')): ?>
    <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
  <?php endif; ?>

  <?php if (empty($sellers)): ?>
    <p class="empty">Tidak ada pengajuan penjual baru saat ini.</p>
  <?php endif; ?>

  <?php foreach ($sellers as $s): ?>
    <a href="/admin/seller/<?= $s['id'] ?>" class="item">
      <b>🏪 <?= esc($s['shop_name']) ?></b>
      <span>oleh <?= esc($s['name']) ?> · <?= esc($s['city']) ?></span>
    </a>
  <?php endforeach; ?>
</div>
</body>
</html>