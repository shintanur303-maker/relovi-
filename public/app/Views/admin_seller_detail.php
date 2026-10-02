<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Detail Penjual - Admin</title>
<style>
  body{font-family:'Work Sans', Arial, sans-serif; background:#FDF6F3; margin:0;}
  .wrap{max-width:600px; margin:0 auto; padding:24px;}
  .card{background:#fff; border:1px solid #F0DED9; border-radius:10px; padding:20px; color:#4A3B36;}
  .card h2{margin-top:0;}
  .row{margin-bottom:12px; font-size:14px;}
  .row b{display:block; color:#8A7A73; font-size:12px; text-transform:uppercase; margin-bottom:2px;}
  img.doc{max-width:100%; border-radius:8px; margin-top:6px; border:1px solid #F0DED9;}
  .actions{margin-top:20px; display:flex; gap:10px;}
  button{padding:10px 20px; border:none; border-radius:6px; font-weight:600; cursor:pointer; font-size:14px;}
  .btn-approve{background:#4CAF50; color:#fff;}
  .btn-reject{background:#E05656; color:#fff;}
  a.back{display:inline-block; margin-bottom:14px; color:#4A3B36; font-size:13px;}
</style>
</head>
<body>
<div class="wrap">
  <a class="back" href="/admin/seller">← Kembali ke daftar</a>

  <div class="card">
    <h2>🏪 <?= esc($seller['shop_name']) ?></h2>

    <div class="row"><b>Nama Akun</b><?= esc($seller['name']) ?></div>
    <div class="row"><b>Email</b><?= esc($seller['email']) ?></div>
    <div class="row"><b>Nomor WhatsApp</b><?= esc($seller['phone']) ?></div>
    <div class="row"><b>Kota</b><?= esc($seller['city']) ?></div>
    <div class="row"><b>Deskripsi Toko</b><?= esc($seller['shop_bio']) ?></div>
    <div class="row"><b>Status Saat Ini</b><?= esc($seller['verification_status']) ?></div>

    <?php if (! empty($seller['verification_document'])): ?>
      <div class="row">
        <b>Dokumen Bukti Kelayakan</b>
        <img class="doc" src="/uploads/sellers/<?= esc($seller['verification_document']) ?>" alt="Dokumen kelayakan">
      </div>
    <?php endif; ?>

    <?php if ($seller['verification_status'] === 'pending'): ?>
      <div class="actions">
        <form action="/admin/seller/<?= $seller['id'] ?>/approve" method="post">
          <button type="submit" class="btn-approve">✔ Setujui</button>
        </form>
        <form action="/admin/seller/<?= $seller['id'] ?>/reject" method="post">
          <button type="submit" class="btn-reject">✖ Tolak</button>
        </form>
      </div>
    <?php endif; ?>
  </div>
</div>
</body>
</html>