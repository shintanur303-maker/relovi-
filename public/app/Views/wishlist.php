<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Wishlist - Relovié</title>
<style>
  body{font-family:'Work Sans', Arial, sans-serif; background:#DCE9F4; margin:0;}
  .wrap{max-width:900px; margin:0 auto; padding:32px 24px;}
  h1{color:#22344A; font-family:Georgia, serif;}
  .sub{color:#697A8C; font-size:14px; margin-top:4px;}
  .back{display:inline-block; margin-bottom:20px; color:#2C4E6E; font-size:14px; text-decoration:none;}
  .notif{background:#DFF5E1; color:#1E7B34; padding:12px 16px; border-radius:8px; margin-bottom:20px; font-size:14px;}
  .wish-item{display:flex; gap:16px; background:#FBF9F5; border:1px solid #C7D6E4; border-radius:10px; padding:14px; margin-bottom:14px; align-items:center;}
  .wish-item img{width:80px; height:80px; object-fit:cover; border-radius:8px; background:#DCE9F4;}
  .wish-info{flex:1;}
  .wish-info .cond{font-size:11px; color:#791d3c; font-weight:600; text-transform:uppercase;}
  .wish-info .name{font-weight:600; color:#22344A; margin-top:2px;}
  .wish-info .price{color:#3F6A96; margin-top:4px; font-weight:600;}
  .wish-info .meta{font-size:12px; color:#697A8C; margin-top:2px;}
  .wish-actions{display:flex; flex-direction:column; gap:6px; min-width:150px;}
  .wish-actions a{display:block; text-align:center; padding:8px 10px; border-radius:6px; font-size:12.5px; text-decoration:none;}
  .btn-view{background:#3F6A96; color:#fff;}
  .btn-remove{color:#c0392b; font-size:12px;}
  .empty{text-align:center; padding:60px 20px; background:#FBF9F5; border-radius:10px; border:1px solid #C7D6E4;}
  .empty a{display:inline-block; margin-top:14px; background:#b99659; color:#22344A; padding:10px 20px; border-radius:6px; text-decoration:none; font-weight:600; font-size:13px;}
</style>
</head>
<body>

<div class="wrap">
  <a href="/" class="back">&larr; Kembali ke Beranda</a>
  <h1>Wishlist Saya</h1>
  <p class="sub"><?= count($items) ?> barang tersimpan</p>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="notif"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <div style="margin-top:20px;">
    <?php if (! empty($items)): ?>
      <?php foreach ($items as $item): ?>
        <div class="wish-item">
          <img src="<?= $item['photo'] ? '/uploads/products/' . esc($item['photo']) : '' ?>">
          <div class="wish-info">
            <div class="cond"><?= esc($item['condition']) ?></div>
            <div class="name"><?= esc($item['name']) ?></div>
            <div class="price">Rp<?= number_format($item['price'], 0, ',', '.') ?></div>
            <div class="meta"><?= esc($item['category']) ?> · <?= esc($item['location'] ?? '-') ?></div>
          </div>
          <div class="wish-actions">
            <a href="/produk/<?= $item['id'] ?>" class="btn-view">Lihat Detail</a>
            <a href="/wishlist/hapus/<?= $item['id'] ?>" class="btn-remove">🗑️ Hapus dari Wishlist</a>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="empty">
        <p>Wishlist kamu masih kosong — simpan barang yang kamu incar biar nggak lupa.</p>
        <a href="/">Lihat Barang Preloved</a>
      </div>
    <?php endif; ?>
  </div>
</div>

</body>
</html>