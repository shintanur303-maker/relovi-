<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesanan Saya - Relovié</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .header {
            background: #22344A;
            color: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 24px;
        }

        .header p {
            margin: 0;
            opacity: 0.85;
        }

        .filter {
            background: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .filter a {
            display: inline-block;
            text-decoration: none;
            color: #333;
            padding: 8px 14px;
            border-radius: 6px;
            margin-right: 5px;
            margin-bottom: 5px;
            background: #f1f1f1;
            font-size: 14px;
        }

        .filter a.active {
            background: #22344A;
            color: white;
        }

        .order {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }

        .order-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .order-id {
            font-size: 13px;
            color: #777;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #fff3cd;
            color: #856404;
            font-size: 12px;
            font-weight: bold;
        }

        .product {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .product img {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 8px;
            background: #eee;
        }

        .product-info {
            flex: 1;
        }

        .product-info h3 {
            margin: 0 0 8px;
            font-size: 17px;
        }

        .product-info p {
            margin: 4px 0;
            color: #666;
            font-size: 14px;
        }

        .price {
            font-weight: bold;
            color: #22344A;
        }

        .empty {
            background: white;
            padding: 50px 20px;
            text-align: center;
            border-radius: 12px;
            color: #777;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #22344A;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .order-top {
                align-items: flex-start;
                gap: 10px;
                flex-direction: column;
            }

            .product img {
                width: 75px;
                height: 75px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <a href="/akun" class="back">← Kembali ke Akun</a>

    <div class="header">
        <h1>Pesanan Saya</h1>
        <p>Kelola dan lihat status pesanan kamu di Relovié.</p>
    </div>

    <div class="filter">

        <a href="/akun/pesanan"
           class="<?= empty($statusAktif) ? 'active' : '' ?>">
            Semua
        </a>

        <a href="/akun/pesanan?status=belum_dibayar"
           class="<?= $statusAktif === 'belum_dibayar' ? 'active' : '' ?>">
            Belum Dibayar
        </a>

        <a href="/akun/pesanan?status=dikemas"
           class="<?= $statusAktif === 'dikemas' ? 'active' : '' ?>">
            Dikemas
        </a>

        <a href="/akun/pesanan?status=dikirim"
           class="<?= $statusAktif === 'dikirim' ? 'active' : '' ?>">
            Dikirim
        </a>

        <a href="/akun/pesanan?status=selesai"
           class="<?= $statusAktif === 'selesai' ? 'active' : '' ?>">
            Selesai
        </a>

        <a href="/akun/pesanan?status=pengembalian"
           class="<?= $statusAktif === 'pengembalian' ? 'active' : '' ?>">
            Pengembalian
        </a>

        <a href="/akun/pesanan?status=pengembalian_disetujui"
   class="<?= $statusAktif === 'pengembalian_disetujui' ? 'active' : '' ?>">
    Pengembalian Disetujui
</a>

<a href="/akun/pesanan?status=pengembalian_ditolak"
   class="<?= $statusAktif === 'pengembalian_ditolak' ? 'active' : '' ?>">
    Pengembalian Ditolak
</a>

        <a href="/akun/pesanan?status=dibatalkan"
           class="<?= $statusAktif === 'dibatalkan' ? 'active' : '' ?>">
            Dibatalkan
        </a>

    </div>


    <?php if (empty($orders)): ?>

        <div class="empty">
            <h3>Belum ada pesanan</h3>
            <p>Pesanan yang kamu lakukan akan muncul di halaman ini.</p>
        </div>

    <?php else: ?>

        <?php foreach ($orders as $order): ?>

            <div class="order">

                <div class="order-top">

                    <div class="order-id">
                        Pesanan #<?= esc($order['id']) ?>
                    </div>

                    <div class="status">
                        <?= esc(ucwords(str_replace('_', ' ', $order['status']))) ?>
                    </div>

                </div>


                <div class="product">

                    <?php if (! empty($order['product_photo'])): ?>

                        <img
                            src="/uploads/products/<?= esc($order['product_photo']) ?>"
                            alt="<?= esc($order['product_name']) ?>"
                        >

                    <?php else: ?>

                        <div style="
                            width:90px;
                            height:90px;
                            background:#eee;
                            border-radius:8px;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            color:#999;
                            font-size:12px;
                            text-align:center;
                        ">
                            Tidak ada foto
                        </div>

                    <?php endif; ?>


                    <div class="product-info">

                        <h3>
                            <?= esc($order['product_name']) ?>
                        </h3>

                        <p>
                            Kategori:
                            <?= esc($order['category']) ?>
                        </p>

                        <p>
                            Jumlah:
                            <?= esc($order['quantity']) ?>
                        </p>

                        <p class="price">
                            Rp <?= number_format(
                                (float) $order['price'],
                                0,
                                ',',
                                '.'
                            ) ?>
                        </p>

                        <?php
    $paymentLabels = [
        'qris'     => 'QRIS Relovié',
        'transfer' => 'Transfer Bank',
        'ewallet'  => 'E-Wallet',
        'card'     => 'Kartu Debit / Kredit',
    ];

    $paymentIcons = [
        'qris'     => '📱',
        'transfer' => '🏦',
        'ewallet'  => '💰',
        'card'     => '💳',
    ];

    $paymentMethod = $order['payment_method'] ?? 'transfer';
?>

<div style="
    display:inline-flex;
    align-items:center;
    gap:7px;
    margin-top:8px;
    padding:6px 10px;
    background:#FDF6F3;
    border:1px solid #E6D5D0;
    border-radius:20px;
    font-size:12px;
    color:#765F58;
">
    <span>
        <?= $paymentIcons[$paymentMethod] ?? '💳' ?>
    </span>

    <span>
        <?= esc($paymentLabels[$paymentMethod] ?? 'Transfer Bank') ?>
    </span>
</div>

                        <?php if ($order['status'] === 'belum_dibayar'): ?>

    <a
        href="/akun/pesanan/bayar/<?= $order['id'] ?>"
        style="
            display:inline-block;
            margin-top:10px;
            padding:9px 16px;
            background:#A67C74;
            color:white;
            text-decoration:none;
            border-radius:7px;
            font-size:13px;
            font-weight:600;
        "
    >
        Bayar Sekarang
    </a>

<?php endif; ?>

<?php if ($order['status'] === 'dikirim'): ?>
    <a
        href="/akun/pesanan/selesai/<?= $order['id'] ?>"
        style="
            display:inline-block;
            margin-top:10px;
            padding:10px 16px;
            background:#A67C74;
            color:#fff;
            text-decoration:none;
            border-radius:8px;
            font-size:13px;
        "
    >
        Pesanan Diterima
    </a>
<?php endif; ?>

<?php if ($order['status'] === 'selesai'): ?>
    <a
        href="/akun/pesanan/pengembalian/<?= $order['id'] ?>"
        style="
            display:inline-block;
            margin-top:10px;
            padding:10px 16px;
            background:#A67C74;
            color:#fff;
            text-decoration:none;
            border-radius:8px;
            font-size:13px;
        "
    >
        Ajukan Pengembalian
    </a>
<?php endif; ?>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</div>

</body>
</html>