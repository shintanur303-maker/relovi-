<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Chat dengan Admin - Relovié</title>
<style>
  body{font-family:'Work Sans', Arial, sans-serif; background:#FDF6F3; margin:0;}
  .wrap{max-width:600px; margin:0 auto; padding:24px;}
  .back{color:#A67C74; font-size:14px; display:inline-block; margin-bottom:16px;}
  .chat-box{background:#fff; border:1px solid #F0DED9; border-radius:12px; height:420px; overflow-y:auto; padding:16px; display:flex; flex-direction:column; gap:10px;}
  .bubble{max-width:75%; padding:10px 14px; border-radius:14px; font-size:14px;}
  .buyer{align-self:flex-end; background:#A67C74; color:#fff; border-bottom-right-radius:2px;}
  .admin{align-self:flex-start; background:#F0DED9; color:#4A3B36; border-bottom-left-radius:2px;}
  form{display:flex; gap:8px; margin-top:12px;}
  input[type=text]{flex:1; padding:12px; border:1px solid #F0DED9; border-radius:8px;}
  button{background:#A67C74; color:#fff; border:none; padding:0 20px; border-radius:8px; cursor:pointer;}
</style>
</head>
<body>
<div class="wrap">
  <a href="/akun" class="back">&larr; Kembali ke Akun</a>
  <h2 style="color:#4A3B36;">Chat dengan Admin</h2>
  <?php if ($productName): ?>
    <p style="font-size:13px; color:#8A7168;">Terkait produk: <strong><?= esc($productName) ?></strong></p>
  <?php endif; ?>

  <div class="chat-box" id="chatBox">
    <?php foreach ($messages as $m): ?>
      <div class="bubble <?= $m['sender'] === 'buyer' ? 'buyer' : 'admin' ?>"><?= esc($m['message']) ?></div>
    <?php endforeach; ?>
  </div>

  <form action="/chat/kirim" method="post">
    <input type="hidden" name="product_id">
    <input type="text" name="message" placeholder="Tulis pesan..." required>
    <button type="submit">Kirim</button>
  </form>
</div>
<script>
  const box = document.getElementById('chatBox');
  box.scrollTop = box.scrollHeight;
</script>
</body>
</html>