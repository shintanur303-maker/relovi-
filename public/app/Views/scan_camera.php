<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cari dengan Foto - Relovié</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,700&family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --navy: #394e7a;
    --denim: #413924;
    --denim-dark: #791d3c;
    --sky: #def2f8;
    --cream: #c9f1e9;
    --amber: #b99659;
    --ink: #3A2A20;
    --line: #5f0c2c;
  }
  *{box-sizing:border-box; margin:0; padding:0;}
  body{font-family:'Work Sans', sans-serif; background:var(--sky); color:var(--ink); line-height:1.5;}
  h1,h2,h3{font-family:'Poppins', serif; font-weight:600; color:var(--navy);}
  a{text-decoration:none; color:inherit;}
  img{max-width:100%; display:block;}
  .wrap{max-width:1180px; margin:0 auto; padding:0 24px;}

  header{border-bottom:1px solid var(--line); background:var(--cream); position:sticky; top:0; z-index:50;}
  .navbar{display:flex; align-items:center; gap:28px; padding:18px 0;}
  .logo{font-family:'Poppins', serif; font-size:24px; font-weight:700; color:var(--navy); white-space:nowrap;}
  .navbar form{flex:1; display:flex; border:1.5px solid var(--denim); border-radius:6px; overflow:hidden;}
  .navbar input[type="search"]{flex:1; border:none; padding:10px 14px; font-family:inherit; font-size:14px; background:transparent; outline:none;}
  .navbar button{background:var(--denim); color:#fff; border:none; padding:0 18px; cursor:pointer; font-family:inherit; font-size:14px;}
  .nav-icons{display:flex; gap:18px; font-size:14px; color:var(--navy); white-space:nowrap;}
  .nav-icons a{border-bottom:1px solid transparent;}
  .nav-icons a:hover{border-color:var(--amber);}
  .nav-categories{display:flex; gap:26px; padding:10px 0; font-size:14px; border-top:1px solid var(--line); overflow-x:auto;}
  .nav-categories a{color:var(--navy); white-space:nowrap;}
  .btn-primary{background:var(--amber); color:var(--navy); padding:13px 26px; border-radius:6px; font-size:14px; font-weight:600; display:inline-block; border:none; cursor:pointer; font-family:inherit;}
  .btn-outline{border:1.5px solid var(--denim); color:var(--denim-dark); padding:13px 26px; border-radius:6px; font-size:14px; font-weight:500; display:inline-block; background:transparent; cursor:pointer; font-family:inherit;}

  /* --- Halaman scan --- */
  .scan-hero{padding:48px 0 64px;}
  .scan-inner{display:grid; grid-template-columns:0.9fr 1.1fr; gap:48px; align-items:start;}
  .scan-inner h1{font-size:34px; line-height:1.15; letter-spacing:-0.5px;}
  .scan-inner > div:first-child p{margin-top:14px; font-size:15px; max-width:38ch; color:#3D4C5C;}
  .scan-steps{margin-top:28px; display:flex; flex-direction:column; gap:14px;}
  .scan-steps li{list-style:none; display:flex; gap:10px; font-size:13.5px; color:var(--ink);}
  .scan-steps li span{font-size:16px; flex-shrink:0;}

  .camera-card{background:#FBF9F5; border-radius:14px; padding:24px; box-shadow:0 12px 24px rgba(34,52,74,0.15);}
  .camera-frame{position:relative; width:100%; max-width:420px; margin:0 auto; aspect-ratio:3/4; background:#1c1c1c; border-radius:10px; overflow:hidden;}
  video, canvas, #preview{width:100%; height:100%; object-fit:cover; display:block;}
  canvas, #preview{display:none;}
  .actions{display:flex; gap:10px; margin-top:18px; max-width:420px; margin-left:auto; margin-right:auto;}
  .actions button{flex:1;}
  #btnUlangi{display:none;}
  #btnKirim{background:var(--navy); color:#fff; display:none;}
  #status{margin-top:12px; font-size:13px; color:var(--navy); min-height:18px; text-align:center;}

  @media (max-width:900px){
    .scan-inner{grid-template-columns:1fr;}
  }

  footer{background:var(--navy); color:var(--cream); padding:48px 0 24px; margin-top:40px;}
  .footer-grid{display:grid; grid-template-columns:2fr 1fr 1fr 1fr; gap:32px; padding-bottom:32px; border-bottom:1px solid rgba(251,249,245,0.15);}
  .footer-grid h4{color:var(--cream); font-size:14px; margin-bottom:14px;}
  .footer-grid ul{list-style:none; font-size:13px; color:#B7C6D6;}
  .footer-grid li{margin-bottom:8px;}
  .footer-bottom{padding-top:20px; font-size:12px; color:#8AA0B4; display:flex; justify-content:space-between; flex-wrap:wrap; gap:8px;}
</style>
</head>
<body>

<header>
  <div class="wrap navbar">
    <a href="/" class="logo">Relovié</a>
    <form role="search" action="/" method="get" style="flex:1; display:flex; border:1.5px solid var(--denim); border-radius:6px; overflow:hidden;">
      <span style="padding:0 6px 0 14px; display:flex; align-items:center; color:var(--denim); font-size:15px;">🔍</span>
      <input type="search" name="cari" placeholder="Cari jaket, sepatu, hp bekas...">
      <button type="submit">Cari</button>
    </form>
    <a href="/scan" title="Cari pakai foto" style="display:flex; align-items:center; justify-content:center; width:38px; height:38px; border:1.5px solid var(--denim); border-radius:6px; font-size:16px; flex-shrink:0; background:var(--denim); color:#fff;">📷</a>
    <div class="nav-icons">
      <a href="/jual">Jual Barang</a>
      <a href="/wishlist">Wishlist</a>
      <a href="/keranjang">Keranjang</a>

      <?php if (session()->get('isLoggedIn')): ?>
        <a href="/akun" style="display:flex; align-items:center; gap:6px;">
          <span style="width:28px; height:28px; border-radius:50%; background:#A67C74; color:#fff; display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:600;">
            <?= strtoupper(substr(session()->get('user_name'), 0, 1)) ?>
          </span>
          <?= esc(session()->get('user_name')) ?>
        </a>
      <?php else: ?>
        <a href="/login">Akun</a>
      <?php endif; ?>
      <?php if (session()->get('user_role') === 'admin'): ?>
        <a href="/admin/seller" style="position:relative;">
          🔔 Notifikasi
          <?php if (($pendingSellerCount ?? 0) > 0): ?>
            <span style="position:absolute; top:-8px; right:-8px; background:#E05656; color:#fff; font-size:11px; width:20px; height:20px; border-radius:50%; display:flex; align-items:center; justify-content:center;">
              <?= $pendingSellerCount ?>
            </span>
          <?php endif; ?>
        </a>
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

<section class="scan-hero">
  <div class="wrap scan-inner">
    <div>
      <h1>Cari Barang dengan Foto</h1>
      <p>Nggak perlu ketik-ketik. Foto aja barang yang kamu cari, biar Relovié carikan yang sejenis buat kamu.</p>
      <ul class="scan-steps">
        <li><span>📷</span> Jepret foto barang yang mau dicari</li>
        <li><span>🤖</span> Sistem kenali jenis barangnya otomatis</li>
        <li><span>🛍️</span> Langsung diarahkan ke barang-barang serupa</li>
      </ul>
    </div>

    <div class="camera-card">
      <div class="camera-frame">
        <video id="video" autoplay playsinline></video>
        <canvas id="canvas"></canvas>
        <img id="preview" alt="Hasil foto">
      </div>

      <div id="status"></div>

      <div class="actions">
        <button id="btnJepret" class="btn-primary">📷 Jepret</button>
        <button id="btnUlangi" class="btn-outline">🔄 Ulangi</button>
        <button id="btnKirim">Cari Barang Mirip</button>
      </div>
    </div>
  </div>
</section>

<footer>
  <div class="wrap">
    <div class="footer-grid">
      <div>
        <div class="logo" style="color:var(--cream);">Relovié</div>
        <p style="font-size:13px; color:#B7C6D6; margin-top:12px; max-width:32ch;">Pasar barang preloved untuk lemari (dan laci gadget) yang lebih berumur panjang.</p>
      </div>
      <div><h4>Belanja</h4><ul><li>Kategori</li><li>Penjual</li><li>Promo</li></ul></div>
      <div><h4>Bantuan</h4><ul><li>FAQ</li><li>Kebijakan</li><li>Hubungi Kami</li></ul></div>
      <div><h4>Ikuti Kami</h4><ul><li>Instagram</li><li>TikTok</li></ul></div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 Relovié. Tugas Perancangan Portal — IIP FISIP Unair.</span>
      <span>Dibuat dengan HTML, CSS & JS</span>
    </div>
  </div>
</footer>

<script>
const video     = document.getElementById('video');
const canvas    = document.getElementById('canvas');
const preview   = document.getElementById('preview');
const btnJepret = document.getElementById('btnJepret');
const btnUlangi = document.getElementById('btnUlangi');
const btnKirim  = document.getElementById('btnKirim');
const statusEl  = document.getElementById('status');
let currentStream = null;

// 1. Nyalain kamera pas halaman dibuka
async function nyalakanKamera() {
  try {
    currentStream = await navigator.mediaDevices.getUserMedia({
      video: { facingMode: 'environment' } // pakai kamera belakang di HP kalau ada
    });
    video.srcObject = currentStream;
  } catch (err) {
    statusEl.textContent = 'Tidak bisa akses kamera: ' + err.message + ' (pastikan izin kamera diaktifkan, dan situs diakses lewat HTTPS/localhost).';
  }
}
nyalakanKamera();

// 2. Tombol jepret -> gambar frame video ke canvas
btnJepret.addEventListener('click', () => {
  canvas.width  = video.videoWidth;
  canvas.height = video.videoHeight;
  canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

  preview.src = canvas.toDataURL('image/jpeg', 0.9);

  video.style.display = 'none';
  preview.style.display = 'block';
  btnJepret.style.display = 'none';
  btnUlangi.style.display = 'inline-block';
  btnKirim.style.display = 'inline-block';

  // kamera dimatiin sementara biar hemat baterai/resource
  if (currentStream) currentStream.getTracks().forEach(t => t.stop());
});

// 3. Tombol ulangi -> balik ke live kamera
btnUlangi.addEventListener('click', () => {
  preview.style.display = 'none';
  video.style.display = 'block';
  btnUlangi.style.display = 'none';
  btnKirim.style.display = 'none';
  btnJepret.style.display = 'inline-block';
  nyalakanKamera();
});

// 4. Tombol kirim -> ubah hasil foto (dataURL) jadi file, submit ke server
btnKirim.addEventListener('click', async () => {
  statusEl.textContent = 'Menganalisis foto...';
  btnKirim.disabled = true;

  const blob = await (await fetch(canvas.toDataURL('image/jpeg', 0.9))).blob();
  const formData = new FormData();
  formData.append('photo', blob, 'scan.jpg');

  try {
    const res = await fetch('/scan/proses', { method: 'POST', body: formData });
    const data = await res.json();

    if (data.redirect) {
      window.location.href = data.redirect;
    } else {
      statusEl.textContent = data.message || 'Gagal mengenali barang, coba foto ulang dengan pencahayaan lebih terang.';
      btnKirim.disabled = false;
    }
  } catch (err) {
    statusEl.textContent = 'Terjadi kesalahan koneksi. Coba lagi.';
    btnKirim.disabled = false;
  }
});
</script>

</body>
</html>