<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Keranjang - Relovié</title>

<style>
  body{
    font-family:'Work Sans', Arial, sans-serif;
    background:#DCE9F4;
    margin:0;
  }

  .wrap{
    max-width:800px;
    margin:0 auto;
    padding:32px 24px;
  }

  h1{
    color:#22344A;
    font-family:Georgia, serif;
  }

  .back{
    display:inline-block;
    margin-bottom:20px;
    color:#2C4E6E;
    font-size:14px;
    text-decoration:none;
  }

  .notif{
    background:#DFF5E1;
    color:#1E7B34;
    padding:12px 16px;
    border-radius:8px;
    margin-bottom:20px;
    font-size:14px;
  }

  .cart-item{
    display:flex;
    gap:16px;
    background:#FBF9F5;
    border:1px solid #C7D6E4;
    border-radius:10px;
    padding:14px;
    margin-bottom:14px;
    align-items:center;
  }

  .cart-item img{
    width:70px;
    height:70px;
    object-fit:cover;
    border-radius:8px;
    background:#DCE9F4;
  }

  .cart-info{
    flex:1;
  }

  .cart-info .name{
    font-weight:600;
    color:#22344A;
  }

  .cart-info .price{
    color:#3F6A96;
    margin-top:4px;
  }

  .cart-info .qty{
    font-size:13px;
    color:#697A8C;
    margin-top:8px;
  }

  /* Tombol jumlah */
  .quantity-control{
    display:flex;
    align-items:center;
    gap:6px;
    margin-top:6px;
  }

  .quantity-btn{
    width:28px;
    height:28px;
    border:1px solid #B7C9D9;
    background:#FFFFFF;
    color:#2C4E6E;
    border-radius:6px;
    text-decoration:none;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
    line-height:1;
    transition:0.2s;
  }

  .quantity-btn:hover{
    background:#EAF2F8;
  }

  .quantity-number{
    min-width:28px;
    text-align:center;
    font-size:14px;
    color:#22344A;
    font-weight:600;
  }

  .item-checkbox{
  width:18px;
  height:18px;
  accent-color:#3F6A96;
  cursor:pointer;
  flex-shrink:0;
}

  .remove{
    color:#c0392b;
    font-size:13px;
    text-decoration:none;
  }

  .checkout-area{
  display:flex;
  justify-content:flex-end;
  margin-top:20px;
}

.checkout-btn{
  border:none;
  background:#3F6A96;
  color:#FFFFFF;
  padding:12px 28px;
  border-radius:8px;
  font-size:14px;
  font-weight:600;
  cursor:pointer;
  transition:0.2s;
}

.checkout-btn:hover{
  background:#2C4E6E;
}

  .remove:hover{
    text-decoration:underline;
  }
</style>
</head>

<body>

<div class="wrap">

  <a href="/" class="back">&larr; Kembali ke Beranda</a>

  <h1>Keranjang Saya</h1>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="notif">
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="notif" style="background:#FDECEC;color:#B42318;">
      <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>


  <?php if (! empty($items)): ?>
     <form action="/keranjang/checkout-pilihan" method="get">
    <?php foreach ($items as $item): ?>

      <div class="cart-item">

  <input
    type="checkbox"
    name="selected_items[]"
    value="<?= $item['id'] ?>"
    class="item-checkbox"
  >

        <img src="<?= $item['photo'] ? '/uploads/products/' . esc($item['photo']) : '' ?>">

        <div class="cart-info">

          <div class="name">
            <?= esc($item['name']) ?>
          </div>

          <div class="price">
            Rp<?= number_format($item['price'], 0, ',', '.') ?>
          </div>

          <div class="qty">
            Jumlah:
          </div>

          <div class="quantity-control">

            <!-- Kurangi jumlah -->
            <a
              href="/keranjang/jumlah/<?= $item['id'] ?>/minus"
              class="quantity-btn"
            >−</a>

            <!-- Jumlah sekarang -->
            <span class="quantity-number">
              <?= $item['quantity'] ?>
            </span>

            <!-- Tambah jumlah -->
            <a
              href="/keranjang/jumlah/<?= $item['id'] ?>/plus"
              class="quantity-btn"
            >+</a>

          </div>

        </div>

        <a
          href="/keranjang/hapus/<?= $item['id'] ?>"
          class="remove"
        >
          Hapus
        </a>

      </div>

    <?php endforeach; ?>

<div class="checkout-area">
  <button type="submit" class="checkout-btn">
    Checkout
  </button>
</div>

</form>

<?php else: ?>

    <p>Keranjang kamu masih kosong.</p>

  <?php endif; ?>

</div>

</body>
</html>