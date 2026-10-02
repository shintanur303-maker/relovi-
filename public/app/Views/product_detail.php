<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= esc($p['name']) ?> - Relovié</title>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{ --navy:#394e7a; --denim-dark:#791d3c; --cream:#c9f1e9; --amber:#b99659; --ink:#3A2A20; --line:#5f0c2c; }
  *{box-sizing:border-box; margin:0; padding:0;}
  body{font-family:'Work Sans', sans-serif; background:#def2f8; color:var(--ink); line-height:1.6;}
  a{text-decoration:none; color:inherit;}
  .wrap{max-width:1000px; margin:0 auto; padding:28px 24px 60px;}
  .back{display:inline-block; margin-bottom:20px; color:var(--navy); font-size:14px;}
  .notif{background:#DFF5E1; color:#1E7B34; padding:12px 16px; border-radius:8px; margin-bottom:20px; font-size:14px;}
  .notif-err{background:#FBEAEA; color:#A67C74;}

  .detail-grid{display:grid; grid-template-columns:1fr 1fr; gap:36px; align-items:start;}
  .photo{width:100%; aspect-ratio:1/1; background:var(--cream); border-radius:14px; overflow:hidden; border:1px solid var(--line);}
  .photo img{width:100%; height:100%; object-fit:cover;}

  h1{font-family:'Fraunces', serif; font-size:26px; color:var(--navy); margin-top:6px;}
  .cond-badge{display:inline-block; background:var(--denim-dark); color:#fff; font-size:11px; font-weight:700; text-transform:uppercase; padding:4px 10px; border-radius:12px; letter-spacing:0.4px;}
  .price{font-family:'Fraunces', serif; font-size:28px; color:var(--navy); font-weight:700; margin-top:10px;}

  .spec-list{margin-top:18px; display:grid; grid-template-columns:1fr 1fr; gap:10px 18px; font-size:13.5px;}
  .spec-list div span{display:block;}
  .spec-list .label{color:#697A8C; font-size:11.5px; text-transform:uppercase; letter-spacing:0.3px;}
  .spec-list .value{font-weight:600; color:var(--ink); margin-top:2px;}

  .seller-box{display:flex; align-items:center; gap:12px; margin-top:22px; padding:14px; background:#FBF9F5; border:1px solid var(--line); border-radius:10px;}
  .seller-box{
    cursor:pointer;
    transition:0.2s;
}

.seller-box:hover{
    transform:translateY(-2px);
    box-shadow:0 4px 12px rgba(0,0,0,0.08);
}
  .seller-avatar{width:44px; height:44px; border-radius:50%; background:var(--navy); flex-shrink:0; overflow:hidden;}
  .seller-avatar img{width:100%; height:100%; object-fit:cover;}
  .seller-name{font-weight:600; color:var(--navy); font-size:14px;}
  .seller-rating{font-size:12.5px; color:var(--amber); margin-top:2px;}
  .seller-rating .muted{color:#8AA0B4;}

  .actions{display:flex; gap:10px; margin-top:22px; flex-wrap:wrap;}
  .actions a{flex:1; min-width:140px; text-align:center; padding:12px; border-radius:8px; font-size:14px; font-weight:600;}
  .btn-buy{background:var(--amber); color:var(--navy);}
  .btn-cart{background:#3F6A96; color:#fff;}
  .btn-chat{border:1.5px solid #A67C74; color:#A67C74;}
  .btn-wish{border:1.5px solid var(--denim-dark); color:var(--denim-dark); flex:0 0 auto; min-width:52px;}
  .btn-archive{border:1.5px solid var(--amber); color:#8a6d2f;}
  .btn-delete{border:1.5px solid #c0392b; color:#c0392b;}

  .desc-section, .review-section{margin-top:40px;}
  .desc-section h2, .review-section h2{font-family:'Fraunces', serif; font-size:19px; color:var(--navy); margin-bottom:10px;}
  .desc-section p{font-size:14px; white-space:pre-line;}

  .review-card{background:#FBF9F5; border:1px solid var(--line); border-radius:10px; padding:14px; margin-bottom:12px;}
  .review-card .stars{color:var(--amber); font-size:14px;}
  .review-card .reviewer{font-weight:600; font-size:13px; color:var(--navy); margin-top:4px;}
  .review-card .product-tag{font-size:11.5px; color:#697A8C;}
  .review-card .comment{font-size:13px; margin-top:6px;}
  .no-review{font-size:13.5px; color:#697A8C;}

  @media (max-width:760px){
    .detail-grid{grid-template-columns:1fr;}
    .spec-list{grid-template-columns:1fr 1fr;}
  }
</style>
</head>
<body>

<div class="wrap">
  <a href="/" class="back">&larr; Kembali ke Beranda</a>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="notif"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('error')): ?>
    <div class="notif notif-err"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <div class="detail-grid">
    <div class="photo">
      <?php if ($p['photo']): ?>
        <img src="/uploads/products/<?= esc($p['photo']) ?>">
      <?php endif; ?>
    </div>

    <div>
      <span class="cond-badge"><?= esc($p['condition']) ?></span>
      <h1><?= esc($p['name']) ?></h1>
      <div class="price">Rp<?= number_format($p['price'], 0, ',', '.') ?></div>

      <div class="spec-list">
        <div><span class="label">Kategori</span><span class="value"><?= esc($p['category']) ?></span></div>
        <div><span class="label">Ukuran</span><span class="value"><?= esc($p['size'] ?? '-') ?></span></div>
        <div><span class="label">Lokasi</span><span class="value"><?= esc($p['location'] ?? '-') ?></span></div>
        <div><span class="label">Metode Bayar</span><span class="value"><?= esc($p['payment_method'] ?? '-') ?></span></div>
        <div><span class="label">Pengiriman</span><span class="value"><?= esc($p['shipping_option'] ?? '-') ?></span></div>
        <div><span class="label">Status</span><span class="value"><?= esc(ucfirst($p['status'])) ?></span></div>
      </div>

      <a href="/toko/<?= $seller['id'] ?>" class="seller-box">

    <div class="seller-avatar">
        <?php if (! empty($seller['avatar'])): ?>
            <img src="/uploads/sellers/<?= esc($seller['avatar']) ?>">
        <?php endif; ?>
    </div>

    <div>
        <div class="seller-name">
            <?= esc($seller['shop_name'] ?? $seller['name']) ?>
        </div>

        <div class="seller-rating">
            <?php if ($ratingSummary['avg_rating']): ?>
                <?php $full = round($ratingSummary['avg_rating']); ?>

                <?= str_repeat('★', $full) . str_repeat('☆', 5 - $full) ?>

                <?= $ratingSummary['avg_rating'] ?>
                (<?= $ratingSummary['total_reviews'] ?> ulasan)

            <?php else: ?>

                <span class="muted">
                    Penjual baru · belum ada ulasan
                </span>

            <?php endif; ?>
        </div>
    </div>

</a>

      <div class="actions">
        <?php if ($isOwner): ?>
          <a
    href="/produk/edit/<?= $p['id'] ?>"
    style="
        display:block;
        margin-top:4px;
        border:1px solid #A67C74;
        color:#A67C74;
        background:transparent;
        text-align:center;
        padding:8px;
        border-radius:6px;
        font-size:13px;
        font-weight:600;
        text-decoration:none;
    "
>
    ✏️ Edit Produk
</a>
          <a href="/produk/arsipkan/<?= $p['id'] ?>" class="btn-archive">📦 Arsipkan</a>
          <a href="/produk/hapus/<?= $p['id'] ?>" class="btn-delete" onclick="return confirm('Hapus barang ini secara permanen?')">🗑️ Hapus</a>
        <?php elseif ($p['status'] === 'aktif'): ?>
          <a href="/checkout/langsung/<?= $p['id'] ?>" class="btn-buy">⚡ Beli Sekarang</a>
          <a href="/keranjang/tambah/<?= $p['id'] ?>" class="btn-cart">+ Keranjang</a>
          <a href="/wishlist/<?= $isWishlisted ? 'hapus' : 'tambah' ?>/<?= $p['id'] ?>" class="btn-wish"><?= $isWishlisted ? '❤️' : '♡' ?></a>
          <a href="/chat?product_id=<?= $p['id'] ?>" class="btn-chat">💬 Tanya Admin</a>
        <?php else: ?>
          <span style="color:#c0392b; font-weight:600; font-size:14px;">Barang ini sedang tidak tersedia.</span>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="desc-section">
    <h2>Deskripsi Barang</h2>
    <p><?= nl2br(esc($p['description'] ?: 'Penjual belum menambahkan deskripsi untuk barang ini.')) ?></p>
  </div>

  <div class="review-section">
    <h2>Ulasan untuk Penjual Ini</h2>
    <?php if (! empty($reviews)): ?>
      <?php foreach ($reviews as $r): ?>
        <div class="review-card">
          <div class="stars"><?= str_repeat('★', $r['rating']) . str_repeat('☆', 5 - $r['rating']) ?></div>
          <div class="reviewer"><?= esc($r['reviewer_name']) ?></div>
          <div class="product-tag">Membeli: <?= esc($r['product_name']) ?></div>
          <?php if (! empty($r['comment'])): ?>
            <div class="comment"><?= nl2br(esc($r['comment'])) ?></div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="no-review">Belum ada ulasan untuk penjual ini.</p>
    <?php endif; ?>
  </div>
</div>

</body>
</html>