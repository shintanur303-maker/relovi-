<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Chat dengan <?= esc($seller['shop_name']) ?> - Relovié</title>
<style>
  body{font-family:'Work Sans', Arial, sans-serif; background:#FDF6F3; margin:0;}
  .wrap{max-width:600px; margin:0 auto; padding:24px;}
  .back{color:#A67C74; font-size:14px; display:inline-block; margin-bottom:16px;}
  .chat-box{background:#fff; border:1px solid #F0DED9; border-radius:12px; height:420px; overflow-y:auto; padding:16px; display:flex; flex-direction:column; gap:10px;}
  .bubble{max-width:75%; padding:10px 14px; border-radius:14px; font-size:14px;}
  .buyer{align-self:flex-end; background:#A67C74; color:#fff; border-bottom-right-radius:2px;}
  .seller{align-self:flex-start; background:#F0DED9; color:#4A3B36; border-bottom-left-radius:2px;}
  .empty{color:#8A7168; font-size:13px; text-align:center; margin-top:150px;}
  form{display:flex; gap:8px; margin-top:12px;}
  input[type=text]{flex:1; padding:12px; border:1px solid #F0DED9; border-radius:8px;}
  button{background:#A67C74; color:#fff; border:none; padding:0 20px; border-radius:8px; cursor:pointer;}
</style>
</head>
<body>
<div class="wrap">
  <a href="/toko/<?= $sellerId ?>" class="back">&larr; Kembali ke Toko</a>
  <h2 style="color:#4A3B36;">💬 Chat dengan <?= esc($seller['shop_name']) ?></h2>

  <div class="chat-box" id="chatBox">
    <?php if (empty($messages)): ?>
      <p class="empty">Mulai obrolan dengan penjual ini.</p>
    <?php endif; ?>
    <?php foreach ($messages as $m): ?>
      <div class="bubble <?= $m['sender'] === 'buyer' ? 'buyer' : 'seller' ?>"><?= esc($m['message']) ?></div>
    <?php endforeach; ?>
  </div>

  <form action="/toko/<?= $sellerId ?>/chat/kirim" method="post">
    <input type="text" name="message" placeholder="Tulis pesan ke penjual..." required>
    <button type="submit">Kirim</button>
  </form>
</div>
<script>
  const box = document.getElementById('chatBox');
  box.scrollTop = box.scrollHeight;
</script>
</body>
</html>