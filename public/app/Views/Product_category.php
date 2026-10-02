<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title><?= esc($categoryName) ?> - Relovié</title>
<style>
  body{font-family:'Work Sans', Arial, sans-serif; background:#DCE9F4; margin:0;}
  .wrap{max-width:1180px; margin:0 auto; padding:32px 24px;}
  h1{color:#22344A; font-family:Georgia, serif; margin-bottom:24px;}
  .back{display:inline-block; margin-bottom:20px; color:#2C4E6E; font-size:14px; text-decoration:none;}
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
  <h1>Kategori: <?= esc($categoryName) ?></h1>

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

  <a href="/chat?product_id=<?= $p['id'] ?>"
     style="display:block; margin-top:6px; border:1px solid #A67C74; color:#A67C74; text-align:center; padding:8px; border-radius:6px; font-size:13px; text-decoration:none;">
    💬 Tanya Admin
  </a>
</div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Belum ada barang di kategori ini.</p>
    <?php endif; ?>
  </div>
</div>

</body>
</html>