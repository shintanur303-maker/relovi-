<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Jual Barang - Relovié</title>
<style>
  body{font-family:'Work Sans', Arial, sans-serif; background:#DCE9F4; margin:0; padding:40px;}
  .form-box{max-width:480px; margin:0 auto; background:#FBF9F5; padding:32px; border-radius:12px; box-shadow:0 4px 16px rgba(34,52,74,0.12);}
  h2{color:#22344A; font-family:Georgia, serif;}
  label{display:block; margin-top:16px; font-size:14px; color:#22344A; font-weight:600;}
  input, select, textarea{width:100%; padding:10px; margin-top:6px; border:1px solid #C7D6E4; border-radius:6px; font-family:inherit; font-size:14px; box-sizing:border-box;}
  textarea{resize:vertical; min-height:80px;}
  button{margin-top:24px; background:#E2A03F; color:#22344A; border:none; padding:12px 24px; border-radius:6px; font-weight:600; cursor:pointer; font-size:14px;}
  button:hover{opacity:0.9;}
</style>
</head>
<body>

<div class="form-box">
  <h2>Jual Barangmu</h2>

  <?php if (session()->getFlashdata('error')): ?>
    <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
  <?php endif; ?>

  <form action="/jual" method="post" enctype="multipart/form-data">

    <label>Nama Barang</label>
    <input type="text" name="name" required>

    <label>Harga (Rp)</label>
    <input type="number" name="price" required>

    <label>Kategori</label>
    <select name="category" required>
      <option value="Atasan">Atasan</option>
      <option value="Bawahan">Bawahan</option>
      <option value="Outerwear">Outerwear</option>
      <option value="Sepatu">Sepatu</option>
      <option value="Tas">Tas</option>
      <option value="Elektronik">Elektronik</option>
      <option value="Aksesoris">Aksesoris</option>
    </select>

    <label>Kondisi</label>
    <select name="condition" required>
      <option value="Like New">Like New</option>
      <option value="Good">Good</option>
      <option value="Fair">Fair</option>
    </select>

    <label>Deskripsi</label>
    <textarea name="description" required></textarea>

    <label>Foto Barang</label>
    <input type="file" name="photo" accept="image/*" required>
<label>Ukuran</label>
<select name="size">
  <option value="S">S</option>
  <option value="M">M</option>
  <option value="L">L</option>
  <option value="XL">XL</option>
  <option value="All Size">All Size / Tidak Ada Ukuran</option>
</select>

<label>Lokasi</label>
<select name="location">
  <option value="Jabodetabek">Jabodetabek</option>
  <option value="Jawa Timur">Jawa Timur</option>
  <option value="Jawa Tengah">Jawa Tengah</option>
  <option value="DIY Yogyakarta">DIY Yogyakarta</option>
  <option value="Jawa Barat">Jawa Barat</option>
  <option value="Sumatra">Sumatra</option>
  <option value="Kalimantan">Kalimantan</option>
  <option value="Sulawesi">Sulawesi</option>
</select>

<label>Metode Pembayaran</label>
<select name="payment_method">
  <option value="Transfer">Transfer Bank</option>
  <option value="COD">COD (Bayar di Tempat)</option>
  <option value="Cicilan">Cicilan</option>
</select>

<label>Opsi Pengiriman</label>
<select name="shipping_option">
  <option value="Reguler">Reguler</option>
  <option value="Instant">Instant</option>
  <option value="Same Day">Same Day</option>
  <option value="Hemat Kargo">Hemat Kargo</option>
</select>
    <button type="submit">Unggah Barang</button>
  </form>
</div>

</body>
</html>