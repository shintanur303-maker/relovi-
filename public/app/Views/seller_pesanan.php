<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesanan Masuk - Relovié</title>

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

        .back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #22344A;
            font-size: 14px;
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

        .order {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
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
            margin: 5px 0;
            color: #666;
            font-size: 14px;
        }

        .price {
            font-weight: bold;
            color: #22344A !important;
        }

        .empty {
            background: white;
            padding: 50px 20px;
            text-align: center;
            border-radius: 12px;
            color: #777;
        }

        .action {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .button {
            display: inline-block;
            background: #A67C74;
            color: white;
            text-decoration: none;
            border: none;
            padding: 10px 16px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .button:hover {
            opacity: 0.9;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .order-top {
                align-items: flex-start;
                flex-direction: column;
                gap: 10px;
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

    <a href="/akun" class="back">
        ← Kembali
    </a>

    <div class="header">
        <h1>Pesanan Masuk</h1>
        <p>Kelola pesanan dari pembeli di toko kamu.</p>
    </div>

    <?php if (empty($orders)): ?>

        <div class="empty">
            <h3>Belum ada pesanan</h3>
            <p>Pesanan dari pembeli akan muncul di halaman ini.</p>
        </div>

    <?php else: ?>

        <?php foreach ($orders as $order): ?>

            <div class="order">

                <div class="order-top">

                    <div class="order-id">
                        Pesanan #<?= esc($order['id']) ?>
                    </div>

                    <div class="status">
                        <?= esc(
                            ucwords(
                                str_replace(
                                    '_',
                                    ' ',
                                    $order['status']
                                )
                            )
                        ) ?>
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

                    </div>

                </div>

                <div class="action">

    <a
        href="/jual/pesanan/detail/<?= $order['id'] ?>"
        class="button"
    >
        Lihat Detail
    </a>

</div>

                <?php if ($order['status'] === 'dikemas'): ?>

                    <div class="action">

                        <form
                            action="/jual/pesanan/kirim/<?= $order['id'] ?>"
                            method="post"
                        >

                            <?= csrf_field() ?>

                            <button
                                type="submit"
                                class="button"
                            >
                                Tandai Sudah Dikirim
                            </button>

                        </form>

                    </div>

                <?php endif; ?>

                <?php if ($order['status'] === 'pengembalian'): ?>

    <div class="action">

        <p style="
            margin: 0 0 12px;
            color: #666;
            font-size: 13px;
        ">
            Pembeli mengajukan pengembalian untuk pesanan ini.
        </p>

        <form
            action="/jual/pesanan/pengembalian/setujui/<?= $order['id'] ?>"
            method="post"
            style="display:inline-block; margin-right:8px;"
        >

            <?= csrf_field() ?>

            <button
                type="submit"
                class="button"
            >
                Setujui Pengembalian
            </button>

        </form>

        <form
            action="/jual/pesanan/pengembalian/tolak/<?= $order['id'] ?>"
            method="post"
            style="display:inline-block;"
        >

            <?= csrf_field() ?>

            <button
                type="submit"
                class="button"
                style="background:#777;"
            >
                Tolak Pengembalian
            </button>

        </form>

    </div>

<?php endif; ?>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</div>

</body>
</html>