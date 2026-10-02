<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Akun Saya - Relovié</title>
<style>
  body{font-family:'Work Sans', Arial, sans-serif; background:#FDF6F3; margin:0;}
  .wrap{max-width:700px; margin:0 auto; padding:32px 24px;}
  .back{display:inline-block; margin-bottom:20px; color:#A67C74; font-size:14px;}
  .profile-card{display:flex; align-items:center; gap:16px; background:#FFFDFB; border:1px solid #F0DED9; border-radius:12px; padding:20px; margin-bottom:20px;}
  .avatar-big{width:56px; height:56px; border-radius:50%; background:#A67C74; color:#fff; display:flex; align-items:center; justify-content:center; font-size:22px; font-weight:600;}
  .profile-name{font-weight:600; color:#4A3B36; font-size:16px;}
  .profile-role{font-size:12px; color:#8A7168; text-transform:capitalize;}
  .menu-list{background:#FFFDFB; border:1px solid #F0DED9; border-radius:12px; overflow:hidden;}
  .menu-item{display:flex; justify-content:space-between; align-items:center; padding:16px 20px; border-bottom:1px solid #F0DED9; color:#4A3B36; font-size:14px;}
  .menu-item:last-child{border-bottom:none;}
  .menu-item:hover{background:#FDF6F3;}
  .badge{background:#A67C74; color:#fff; font-size:11px; padding:2px 8px; border-radius:10px;}
  .logout{color:#c0392b; text-align:center; padding:16px; font-size:14px; display:block;}
</style>
</head>
<body>

<div class="wrap">
  <a href="/" class="back">&larr; Kembali ke Beranda</a>

  <div class="profile-card">
    <div class="avatar-big"><?= strtoupper(substr(session()->get('user_name'), 0, 1)) ?></div>
    <div>
      <div class="profile-name"><?= esc(session()->get('user_name')) ?></div>
      <div class="profile-role"><?= esc(session()->get('user_role')) ?></div>
    </div>
  </div>

  <div class="menu-list">
    <div class="menu-list">
    <?php if (session()->get('user_role') === 'penjual'): ?>
      <a href="/jual" class="menu-item"><span>📦 Barang Saya (<?= count($myProducts) ?>)</span> <span>&rsaquo;</span></a>
      <a href="/jual/pesanan" class="menu-item">
    <span>📋 Pesanan Masuk</span>
    <span>&rsaquo;</span>
  </a>
      <a href="/jual/chat" class="menu-item"><span>💬 Chat Pembeli</span> <span>&rsaquo;</span></a>
    <?php endif; ?>
    <a href="/keranjang" class="menu-item"><span>🛒 Keranjang</span> <span class="badge"><?= $cartCount ?></span></a>
    <a href="/chat" class="menu-item"><span>💬 Chat dengan Admin</span> <span>&rsaquo;</span></a>
    <a href="/akun/pesanan" class="menu-item"><span>📄 Riwayat Pesanan</span> <span>&rsaquo;</span></a>
    <a href="/wishlist" class="menu-item">
  <span>❤️ Wishlist</span>

  <span>
    <?php if (! empty($wishlistCount) && $wishlistCount > 0): ?>
      <span class="badge"><?= esc($wishlistCount) ?></span>
    <?php endif; ?>

    &rsaquo;
  </span>
</a>
    <a href="/akun/profil" class="menu-item"><span>⚙️ Edit Profil</span> <span>&rsaquo;</span></a>
    <a href="/akun/pengaturan" class="menu-item">
  <span>⚙️ Pengaturan Akun</span>
  <span>&rsaquo;</span>
</a>
    <?php if (session()->get('user_role') === 'admin'): ?>
      <a href="/admin/chat" class="menu-item"><span>🛠️ Kelola Chat (Admin)</span> <span>&rsaquo;</span></a>
    <?php endif; ?>
  </div>

  <a href="/logout" class="logout">Keluar Akun</a>
</div>

</body>
</html>