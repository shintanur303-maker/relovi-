<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Daftar Jadi Penjual - Relovié</title>
<style>
  body{font-family:'Work Sans', Arial, sans-serif; background:#DCE9F4; margin:0; padding:40px;}
  .form-box{max-width:480px; margin:0 auto; background:#FBF9F5; padding:32px; border-radius:12px; box-shadow:0 4px 16px rgba(34,52,74,0.12);}
  h2{color:#22344A; font-family:Georgia, serif;}
  p.desc{color:#697A8C; font-size:14px; margin-top:-8px;}
  label{display:block; margin-top:16px; font-size:14px; color:#22344A; font-weight:600;}
  input, select, textarea{width:100%; padding:10px; margin-top:6px; border:1px solid #C7D6E4; border-radius:6px; font-family:inherit; font-size:14px; box-sizing:border-box;}
  textarea{resize:vertical; min-height:80px;}
  button{margin-top:24px; background:#E2A03F; color:#22344A; border:none; padding:12px 24px; border-radius:6px; font-weight:600; cursor:pointer; font-size:14px;}
  button:hover{opacity:0.9;}
  small{display:block; margin-top:4px; color:#697A8C; font-size:12px;}
</style>
</head>
<body>

<div class="form-box">
  <h2>Daftar Jadi Penjual</h2>
  <p class="desc">Lengkapi profil tokomu. Setelah dikirim, tim Relovié akan memverifikasi kelayakan sebelum toko kamu tampil di "Penjual Terpercaya".</p>

  <?php if (session()->getFlashdata('error')): ?>
    <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
  <?php endif; ?>

  <form action="/jadi-penjual" method="post" enctype="multipart/form-data">

    <label>Nama Toko</label>
    <input type="text" name="shop_name" placeholder="Contoh: Thrift by Rina" required>

    <label>Deskripsi Toko</label>
    <textarea name="shop_bio" placeholder="Ceritakan sedikit tentang tokomu"></textarea>

    <label>Nomor WhatsApp</label>
    <input type="text" name="phone" placeholder="08xxxxxxxxxx" required>

    <label>Kota</label>
    <input type="text" name="city" placeholder="Contoh: Jakarta" required>

    <label>Foto Profil Toko (opsional)</label>
    <input type="file" name="avatar" accept="image/*">

    <label>Dokumen Bukti Kelayakan</label>
    <input type="file" name="verification_document" accept="image/*,.pdf" required>
    <small>Contoh: foto KTP atau foto stok barang yang akan dijual. Dipakai admin untuk verifikasi, tidak ditampilkan ke publik.</small>

    <button type="submit">Kirim Pengajuan</button>
  </form>
</div>

</body>
</html>