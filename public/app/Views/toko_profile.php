<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title><?= esc($seller['shop_name']) ?> - Relovié</title>
<style>
  body{font-family:'Work Sans', Arial, sans-serif; background:#DCE9F4; margin:0;}
  .wrap{max-width:1180px; margin:0 auto; padding:32px 24px;}
  .back{display:inline-block; margin-bottom:20px; color:#2C4E6E; font-size:14px; text-decoration:none;}

  .toko-header{display:flex; align-items:center; gap:18px; background:#FBF9F5; border:1px solid #C7D6E4; border-radius:12px; padding:24px; margin-bottom:28px;}
  .toko-avatar{width:72px; height:72px; border-radius:50%; background:#2C4E6E; flex-shrink:0; background-size:cover; background-position:center; display:flex; align-items:center; justify-content:center; color:#fff; font-size:28px; font-weight:600;}
  .toko-info h1{margin:0 0 4px; font-family:Georgia, serif; color:#22344A; font-size:22px;}
  .toko-info p{margin:0; color:#697A8C; font-size:14px;}
  .toko-info p.bio{margin-top:8px; color:#22344A; font-size:14px;}
  .badge-verified{display:inline-block; background:#4CAF50; color:#fff; font-size:11px; padding:2px 8px; border-radius:10px; margin-left:6px; vertical-align:middle;}

  .prod-grid{display:grid; grid-template-columns:repeat(4, 1fr); gap:20px;}
  .prod-card{background:#FBF9F5; border:1px solid #C7D6E4; border-radius:10px; overflow:hidden;}
  .prod-img{aspect-ratio:3/4; background:#DCE9F4;}
  .prod-img img{width:100%; height:100%; object-fit:cover; display:block;}
  .prod-body{padding:14px;}
  .prod-cond{font-size:11px; color:#2C4E6E; font-weight:600; text-transform:uppercase;}
  .prod-name{font-size:14px; font-weight:500; margin-top:4px;}
  .prod-price{font-size:15px; font-weight:600; color:#22344A; margin-top:6px;}
  @media (max-width:900px){ .prod-grid{grid-template-columns:repeat(2,1fr);} }
</style>
</head>
<body>

<div class="wrap">
  <a href="/" class="back">&larr; Kembali ke Beranda</a>

  <div class="toko-header">
    <?php if (! empty($seller['avatar'])): ?>
      <div class="toko-avatar" style="background-image:url('/uploads/sellers/<?= esc($seller['avatar']) ?>');"></div>
    <?php else: ?>
      <div class="toko-avatar"><?= strtoupper(substr($seller['shop_name'], 0, 1)) ?></div>
    <?php endif; ?>
    <div class="toko-info">
      <h1><?= esc($seller['shop_name']) ?> <span class="badge-verified">✔ Terverifikasi</span></h1>
      <p><?= esc($seller['city']) ?> · <?= count($products) ?> produk</p>
      <?php if (! empty($seller['shop_bio'])): ?>
        <p class="bio"><?= esc($seller['shop_bio']) ?></p>
      <?php endif; ?>

      <a href="/toko/<?= $seller['id'] ?>/chat"
         style="display:inline-block; margin-top:10px; background:#A67C74; color:#fff; padding:8px 16px; border-radius:6px; font-size:13px; text-decoration:none;">
        💬 Chat dengan Penjual
      </a>
    </div>
  </div>

  <h2 style="color:#22344A; font-family:Georgia, serif;">Produk dari toko ini</h2>

  <div class="prod-grid">
    <?php if (! empty($products)): ?>
      <?php foreach ($products as $p): ?>
        <div class="prod-card">
          <div class="prod-img">
            <?php if ($p['photo']): ?>
              <img src="/uploads/products/<?= esc($p['photo']) ?>">
            <?php endif; ?>
          </div>
          <div class="prod-body">
            <div class="prod-cond"><?= esc($p['condition']) ?></div>
            <div class="prod-name"><?= esc($p['name']) ?></div>
            <div class="prod-price">Rp<?= number_format($p['price'], 0, ',', '.') ?></div>
            <a href="/keranjang/tambah/<?= $p['id'] ?>"
               style="display:block; margin-top:10px; background:#A67C74; color:white; text-align:center; padding:8px; border-radius:6px; font-size:13px; text-decoration:none;">
              + Keranjang
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Toko ini belum mengunggah barang.</p>
    <?php endif; ?>
  </div>
</div>

</body>
</html>