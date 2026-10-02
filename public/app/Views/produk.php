<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Semua Produk - Relovié</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root{
  --navy: #3F4E68;
  --denim: #6B625A;
  --denim-dark: #8B6470;
  --sky: #F7F3EE;
  --cream: #FFFDFC;
  --amber: #C9A66B;
  --ink: #4F4A46;
  --line: #E5DDD4;

  --rose-soft: #E7D4D2;
  --rose: #B98282;
  --beige: #F1E4D6;
  --green-soft: #DDE7DE;
}
  }
  *{box-sizing:border-box; margin:0; padding:0;}
  body{font-family:'Poppins', sans-serif; background:var(--sky); color:var(--ink); line-height:1.5;}
  h1,h2,h3{font-family:'Poppins', serif; font-weight:600; color:var(--navy);}
  a{text-decoration:none; color:inherit;}
  img{max-width:100%; display:block;}
  .wrap{max-width:1180px; margin:0 auto; padding:0 24px;}

  header{border-bottom:1px solid var(--line); background:var(--cream); position:sticky; top:0; z-index:50;}
  .navbar{display:flex; align-items:center; gap:28px; padding:18px 0;}
  .logo{font-family:'Fraunces', serif; font-size:24px; font-weight:700; color:var(--navy); white-space:nowrap;}
  .navbar form{flex:1; display:flex; border:1.5px solid var(--denim); border-radius:6px; overflow:hidden;}
  .navbar input[type="search"]{flex:1; border:none; padding:10px 14px; font-family:inherit; font-size:14px; background:transparent; outline:none;}
  .navbar button{background:var(--denim); color:#fff; border:none; padding:0 18px; cursor:pointer; font-family:inherit; font-size:14px;}
  .nav-icons{display:flex; gap:18px; font-size:14px; color:var(--navy); white-space:nowrap;}
  .nav-categories{display:flex; gap:26px; padding:10px 0; font-size:14px; border-top:1px solid var(--line); overflow-x:auto;}
  .nav-categories a{color:var(--navy); white-space:nowrap;}

  .page-head{padding:32px 0 8px;}
  .page-head h1{font-size:28px;}
  .page-head p{color:#697A8C; font-size:14px; margin-top:6px;}

  /* =========================
   FILTER SIDEBAR
   ========================= */

.catalog-layout{
  display:grid;
  grid-template-columns:220px 1fr;
  gap:28px;
  align-items:start;
}

.filter-sidebar{
  background:#FFFDFC;
  border:1px solid var(--line);
  border-radius:12px;
  padding:18px;
  position:sticky;
  top:100px;
}

.filter-sidebar h3{
  font-size:17px;
  color:var(--navy);
  margin-bottom:18px;
}

.filter-group{
  padding-bottom:16px;
  margin-bottom:16px;
  border-bottom:1px solid var(--line);
}

.filter-group:last-child{
  border-bottom:none;
  margin-bottom:0;
  padding-bottom:0;
}

.filter-label{
  display:block;
  font-size:13px;
  font-weight:600;
  color:var(--ink);
  margin-bottom:8px;
}

.filter-sidebar select{
  width:100%;
  background:#FAF8F5;
  border:1px solid #D8CEC6;
  color:var(--ink);
  padding:9px 10px;
  border-radius:7px;
  font-family:inherit;
  font-size:12px;
  outline:none;
}

.filter-sidebar select:focus{
  border-color:var(--rose);
  box-shadow:0 0 0 3px rgba(185,130,130,.10);
}

.filter-sidebar select option{
  color:var(--ink);
  background:#fff;
}

.filter-reset{
  display:block;
  width:100%;
  text-align:center;
  margin-top:14px;
  padding:9px 10px;
  border:1px solid var(--rose);
  border-radius:7px;
  color:var(--rose);
  font-size:12px;
  font-weight:600;
}

.filter-reset:hover{
  background:var(--rose-soft);
}

.catalog-products{
  min-width:0;
}

  .section{padding:36px 0 60px;}

  .prod-grid{display:grid; grid-template-columns:repeat(4, 1fr); gap:20px;}
  .prod-card{background:var(--cream); border:1px solid var(--line); border-radius:10px; overflow:hidden; transition:transform .2s, box-shadow .2s;}
  .prod-card:hover{transform:translateY(-6px); box-shadow:0 14px 24px rgba(34,52,74,0.15);}
  .prod-img{aspect-ratio:3/4; background:var(--sky);}
  .prod-body{padding:14px;}
  .prod-cond{font-size:11px; color:var(--denim-dark); font-weight:600; text-transform:uppercase; letter-spacing:0.4px;}
  .prod-name{font-size:14px; font-weight:500; margin-top:4px;}
  .prod-price{font-size:15px; font-weight:600; color:var(--navy); margin-top:6px;}
  .prod-meta{font-size:12px; color:#697A8C; margin-top:4px;}

  footer{background:var(--navy); color:var(--cream); padding:32px 0; text-align:center; font-size:12px;}

  @media (max-width:900px){
  .catalog-layout{
    grid-template-columns:1fr;
  }

  .filter-sidebar{
    position:static;
  }

  .prod-grid{
    grid-template-columns:repeat(2,1fr);
  }
}
</style>
</head>
<body>

<header>
  <div class="wrap navbar">
    <a href="/" class="logo">Relovié</a>
    <form role="search">
      <input type="search" placeholder="Cari jaket, sepatu, hp bekas...">
      <button type="submit">Cari</button>
    </form>
    <div class="nav-icons">
      <a href="/jual">Jual Barang</a>
      <a href="/wishlist">Wishlist</a>
      <a href="/keranjang">Keranjang</a>
      <?php if (session()->get('isLoggedIn')): ?>
        <a href="/akun">Akun</a>
      <?php else: ?>
        <a href="/login">Akun</a>
      <?php endif; ?>
    </div>
  </div>
  <div class="wrap nav-categories">
    <a href="/kategori/Atasan">Atasan</a>
    <a href="/kategori/Bawahan">Bawahan</a>
    <a href="/kategori/Outerwear">Outerwear</a>
    <a href="/kategori/Sepatu">Sepatu</a>
    <a href="/kategori/Tas">Tas</a>
    <a href="/kategori/Elektronik">Elektronik</a>
    <a href="/kategori/Aksesoris">Aksesoris</a>
  </div>
</header>

<div class="wrap page-head">
  <a href="/" style="font-size:13px; color:var(--denim-dark);">&larr; Kembali ke Beranda</a>
  <h1>Semua Produk</h1>
  <p><?= count($products) ?> barang ditemukan</p>
</div>

<div class="filter-bar">
  <div class="wrap">
    <form method="get" action="/produk" style="display:flex; gap:14px; flex-wrap:wrap; align-items:center;">
      <select name="kategori" onchange="this.form.submit()">
        <option value="">Kategori</option>
        <option value="Atasan" <?= ($f['kategori'] ?? '') === 'Atasan' ? 'selected' : '' ?>>Atasan</option>
        <option value="Bawahan" <?= ($f['kategori'] ?? '') === 'Bawahan' ? 'selected' : '' ?>>Bawahan</option>
        <option value="Outerwear" <?= ($f['kategori'] ?? '') === 'Outerwear' ? 'selected' : '' ?>>Outerwear</option>
        <option value="Sepatu" <?= ($f['kategori'] ?? '') === 'Sepatu' ? 'selected' : '' ?>>Sepatu</option>
        <option value="Tas" <?= ($f['kategori'] ?? '') === 'Tas' ? 'selected' : '' ?>>Tas</option>
        <option value="Elektronik" <?= ($f['kategori'] ?? '') === 'Elektronik' ? 'selected' : '' ?>>Elektronik</option>
        <option value="Aksesoris" <?= ($f['kategori'] ?? '') === 'Aksesoris' ? 'selected' : '' ?>>Aksesoris</option>
      </select>
      <select name="ukuran" onchange="this.form.submit()">
        <option value="">Ukuran</option>
        <option value="S">S</option><option value="M">M</option><option value="L">L</option><option value="XL">XL</option>
        <option value="All Size">All Size</option>
      </select>
      <select name="kondisi" onchange="this.form.submit()">
        <option value="">Kondisi</option>
        <option value="Like New">Like New</option>
        <option value="Good">Good</option>
        <option value="Fair">Fair</option>
      </select>
      <select name="harga" onchange="this.form.submit()">
        <option value="">Harga</option>
        <option value="bawah50">Di bawah 50rb</option>
        <option value="50-300">50rb–300rb</option>
        <option value="atas300">Di atas 300rb</option>
      </select>
      <select name="lokasi" onchange="this.form.submit()">
        <option value="">Lokasi</option>
        <option value="Jabodetabek">Jabodetabek</option>
        <option value="Jawa Timur">Jawa Timur</option>
        <option value="Jawa Tengah">Jawa Tengah</option>
        <option value="Jawa Barat">Jawa Barat</option>
        <option value="Sumatra">Sumatra</option>
      </select>
      <select name="pembayaran" onchange="this.form.submit()">
        <option value="">Metode Bayar</option>
        <option value="Transfer">Transfer</option>
        <option value="COD">COD</option>
        <option value="Cicilan">Cicilan</option>
      </select>
      <select name="pengiriman" onchange="this.form.submit()">
        <option value="">Pengiriman</option>
        <option value="Reguler">Reguler</option>
        <option value="Instant">Instant</option>
        <option value="Same Day">Same Day</option>
        <option value="Hemat Kargo">Hemat Kargo</option>
      </select>
      <select name="rating" onchange="this.form.submit()">
        <option value="">Rating</option>
        <option value="4">⭐ 4 ke atas</option>
        <option value="3">⭐ 3 ke atas</option>
      </select>
      <select name="urutkan" onchange="this.form.submit()">
        <option value="">Urutkan</option>
        <option value="terbaru">Terbaru</option>
        <option value="termurah">Termurah</option>
        <option value="termahal">Termahal</option>
      </select>
      <?php if (! empty($f)): ?>
        <a href="/produk" style="color:#fff; font-size:12px; text-decoration:underline;">Reset Filter</a>
      <?php endif; ?>
    </form>
  </div>
</div>

<section class="section">
  <div class="wrap">
    <div class="prod-grid">
      <?php if (! empty($products)): ?>
        <?php foreach ($products as $p): ?>
          <?php
            $isOwner = session()->get('isLoggedIn') && session()->get('user_id') == ($p['user_id'] ?? null);
            $isWishlisted = session()->get('isLoggedIn')
              ? (new \App\Models\WishlistModel())->isWishlisted(session()->get('user_id'), $p['id'])
              : false;
          ?>
          <div class="prod-card">
            <div class="prod-img" style="position:relative;">
              <a href="/produk/<?= $p['id'] ?>" style="display:block; width:100%; height:100%;">
                <?php if (! empty($p['photo'])): ?>
                  <img src="/uploads/products/<?= esc($p['photo']) ?>" style="width:100%;height:100%;object-fit:cover;">
                <?php endif; ?>
              </a>
              <?php if (! $isOwner): ?>
                <a href="/wishlist/<?= $isWishlisted ? 'hapus' : 'tambah' ?>/<?= $p['id'] ?>"
                   style="position:absolute; top:8px; right:8px; width:30px; height:30px; background:rgba(255,255,255,0.9); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:15px;">
                  <?= $isWishlisted ? '❤️' : '♡' ?>
                </a>
              <?php endif; ?>
            </div>
            <div class="prod-body">
              <a href="/produk/<?= $p['id'] ?>" style="color:inherit; text-decoration:none; display:block;">
                <div class="prod-cond"><?= esc($p['condition'] ?? '-') ?></div>
                <div class="prod-name"><?= esc($p['name'] ?? '-') ?></div>
                <div class="prod-price">Rp<?= number_format($p['price'] ?? 0, 0, ',', '.') ?></div>
                <div class="prod-meta"><?= esc($p['category'] ?? '-') ?> · <?= esc($p['location'] ?? '-') ?></div>
              </a>
              <hr style="border:none; border-top:1px solid var(--line); margin:10px 0 8px;">
              <?php if ($isOwner): ?>
                <a href="/produk/arsipkan/<?= $p['id'] ?>" style="display:block; margin-top:4px; border:1px solid var(--amber); color:#8a6d2f; text-align:center; padding:8px; border-radius:6px; font-size:13px;">📦 Arsipkan</a>
                <a href="/produk/hapus/<?= $p['id'] ?>" onclick="return confirm('Hapus barang ini secara permanen?')" style="display:block; margin-top:6px; border:1px solid #c0392b; color:#c0392b; text-align:center; padding:8px; border-radius:6px; font-size:13px;">🗑️ Hapus</a>
              <?php else: ?>
                <a href="/checkout/langsung/<?= $p['id'] ?>" style="display:block; margin-top:4px; background:var(--amber); color:var(--navy); text-align:center; padding:8px; border-radius:6px; font-size:13px; font-weight:600;">⚡ Beli Sekarang</a>
                <a href="/keranjang/tambah/<?= $p['id'] ?>" style="display:block; margin-top:6px; background:#3F6A96; color:#fff; text-align:center; padding:8px; border-radius:6px; font-size:13px;">+ Keranjang</a>
                <a href="/chat?product_id=<?= $p['id'] ?>" style="display:block; margin-top:6px; border:1px solid #A67C74; color:#A67C74; text-align:center; padding:8px; border-radius:6px; font-size:13px;">💬 Tanya Admin</a>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>Belum ada barang yang cocok dengan filter ini.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<footer>
  <div class="wrap">© 2026 Relovié. Tugas Perancangan Portal — IIP FISIP Unair.</div>
</footer>

</body>
</html>