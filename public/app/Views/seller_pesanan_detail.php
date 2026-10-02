<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pesanan - Relovié</title>

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

        .card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .card h2 {
            margin: 0 0 15px;
            color: #22344A;
            font-size: 18px;
        }

        .product {
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }

        .product img {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 10px;
            background: #eee;
        }

        .product-info {
            flex: 1;
        }

        .product-info h3 {
            margin: 0 0 10px;
            font-size: 19px;
            color: #222;
        }

        .product-info p {
            margin: 6px 0;
            color: #666;
            font-size: 14px;
        }

        .price {
            color: #22344A !important;
            font-weight: bold;
        }

        .status {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            background: #fff3cd;
            color: #856404;
            font-size: 12px;
            font-weight: bold;
        }

        .info-row {
            display: flex;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .label {
            width: 150px;
            color: #777;
        }

        .value {
            flex: 1;
            color: #333;
            font-weight: 500;
        }

        .total {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
            font-size: 17px;
            font-weight: bold;
            color: #22344A;
        }

        @media (max-width: 600px) {

            body {
                padding: 15px;
            }

            .product {
                flex-direction: column;
            }

            .product img {
                width: 100%;
                height: 220px;
            }

            .info-row {
                flex-direction: column;
                gap: 4px;
            }

            .label {
                width: auto;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <a href="/jual/pesanan" class="back">
        ← Kembali ke Pesanan
    </a>

    <div class="header">
        <h1>Detail Pesanan</h1>
        <p>Informasi lengkap pesanan dari pembeli.</p>
    </div>


    <!-- INFORMASI PESANAN -->

    <div class="card">

        <h2>Informasi Pesanan</h2>

        <div class="info-row">
            <div class="label">
                Nomor Pesanan
            </div>

            <div class="value">
                #<?= esc($order['id']) ?>
            </div>
        </div>

        <div class="info-row">
            <div class="label">
                Status
            </div>

            <div class="value">
                <span class="status">
                    <?= esc(
                        ucwords(
                            str_replace(
                                '_',
                                ' ',
                                $order['status']
                            )
                        )
                    ) ?>
                </span>
            </div>
        </div>

        <!-- AKSI PESANAN -->

        <?php if ($order['status'] === 'dikemas'): ?>

            <div style="
                margin-top:20px;
                padding-top:20px;
                border-top:1px solid #eee;
            ">

                <h3 style="
                    margin:0 0 10px;
                    color:#22344A;
                    font-size:16px;
                ">
                    Aksi Pesanan
                </h3>

                <form
                    action="/jual/pesanan/kirim/<?= $order['id'] ?>"
                    method="post"
                >
                    <?= csrf_field() ?>

                    <button
                        type="submit"
                        style="
                            background:#22344A;
                            color:white;
                            border:none;
                            padding:11px 18px;
                            border-radius:8px;
                            cursor:pointer;
                            font-weight:bold;
                        "
                    >
                        🚚 Kirim Pesanan
                    </button>
                </form>

            </div>


        <?php elseif ($order['status'] === 'dikirim'): ?>

            <div style="
                margin-top:20px;
                padding-top:20px;
                border-top:1px solid #eee;
            ">

                <h3 style="
                    margin:0 0 10px;
                    color:#22344A;
                    font-size:16px;
                ">
                    Status Pesanan
                </h3>

                <p style="color:#666; margin:0;">
                    Pesanan sedang dalam proses pengiriman kepada pembeli.
                </p>

            </div>


        <?php elseif ($order['status'] === 'selesai'): ?>

            <div style="
                margin-top:20px;
                padding-top:20px;
                border-top:1px solid #eee;
            ">

                <h3 style="
                    margin:0 0 10px;
                    color:#22344A;
                    font-size:16px;
                ">
                    Status Pesanan
                </h3>

                <p style="color:#666; margin:0;">
                    Pesanan telah selesai dan diterima oleh pembeli.
                </p>

            </div>


        <?php elseif ($order['status'] === 'pengembalian'): ?>

            <div style="
                margin-top:20px;
                padding-top:20px;
                border-top:1px solid #eee;
            ">

                <h3 style="
                    margin:0 0 10px;
                    color:#22344A;
                    font-size:16px;
                ">
                    Aksi Pengembalian
                </h3>

                <p style="color:#666;">
                    Pembeli mengajukan pengembalian untuk pesanan ini.
                </p>

                <div style="
                    display:flex;
                    gap:10px;
                    flex-wrap:wrap;
                    margin-top:15px;
                ">

                    <form
                        action="/jual/pesanan/pengembalian/setujui/<?= $order['id'] ?>"
                        method="post"
                    >
                        <?= csrf_field() ?>

                        <button
                            type="submit"
                            style="
                                background:#22344A;
                                color:white;
                                border:none;
                                padding:11px 18px;
                                border-radius:8px;
                                cursor:pointer;
                                font-weight:bold;
                            "
                        >
                            ✓ Setujui Pengembalian
                        </button>
                    </form>


                    <form
                        action="/jual/pesanan/pengembalian/tolak/<?= $order['id'] ?>"
                        method="post"
                    >
                        <?= csrf_field() ?>

                        <button
                            type="submit"
                            style="
                                background:#777;
                                color:white;
                                border:none;
                                padding:11px 18px;
                                border-radius:8px;
                                cursor:pointer;
                                font-weight:bold;
                            "
                        >
                            ✕ Tolak Pengembalian
                        </button>
                    </form>

                </div>

            </div>


        <?php elseif ($order['status'] === 'pengembalian_disetujui'): ?>

            <div style="
                margin-top:20px;
                padding-top:20px;
                border-top:1px solid #eee;
            ">

                <h3 style="
                    margin:0 0 10px;
                    color:#22344A;
                    font-size:16px;
                ">
                    Status Pengembalian
                </h3>

                <p style="color:#666; margin:0;">
                    Pengajuan pengembalian telah disetujui oleh penjual.
                </p>

            </div>


        <?php elseif ($order['status'] === 'pengembalian_ditolak'): ?>

            <div style="
                margin-top:20px;
                padding-top:20px;
                border-top:1px solid #eee;
            ">

                <h3 style="
                    margin:0 0 10px;
                    color:#22344A;
                    font-size:16px;
                ">
                    Status Pengembalian
                </h3>

                <p style="color:#666; margin:0;">
                    Pengajuan pengembalian telah ditolak oleh penjual.
                </p>

            </div>


        <?php elseif ($order['status'] === 'belum_dibayar'): ?>

            <div style="
                margin-top:20px;
                padding-top:20px;
                border-top:1px solid #eee;
            ">

                <h3 style="
                    margin:0 0 10px;
                    color:#22344A;
                    font-size:16px;
                ">
                    Status Pesanan
                </h3>

                <p style="color:#666; margin:0;">
                    Pesanan belum dibayar oleh pembeli.
                </p>

            </div>


        <?php elseif ($order['status'] === 'dibatalkan'): ?>

            <div style="
                margin-top:20px;
                padding-top:20px;
                border-top:1px solid #eee;
            ">

                <h3 style="
                    margin:0 0 10px;
                    color:#22344A;
                    font-size:16px;
                ">
                    Status Pesanan
                </h3>

                <p style="color:#666; margin:0;">
                    Pesanan ini telah dibatalkan.
                </p>

            </div>

        <?php endif; ?>

    </div>


    <!-- PRODUK -->

    <div class="card">

        <h2>Produk</h2>

        <div class="product">

            <?php if (! empty($order['product_photo'])): ?>

                <img
                    src="/uploads/products/<?= esc($order['product_photo']) ?>"
                    alt="<?= esc($order['product_name']) ?>"
                >

            <?php else: ?>

                <div style="
                    width:130px;
                    height:130px;
                    background:#eee;
                    border-radius:10px;
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
                    Kondisi:
                    <?= esc($order['condition']) ?>
                </p>

                <p>
                    Jumlah:
                    <?= esc($order['quantity']) ?>
                </p>

                <p class="price">
                    Harga:
                    Rp <?= number_format(
                        (float) $order['price'],
                        0,
                        ',',
                        '.'
                    ) ?>
                </p>

            </div>

        </div>

        <div class="total">

            <span>Total Pesanan</span>

            <span>
                Rp <?= number_format(
                    (float) $order['price'],
                    0,
                    ',',
                    '.'
                ) ?>
            </span>

        </div>

    </div>


    <!-- INFORMASI PEMBELI -->

    <div class="card">

        <h2>Informasi Pembeli</h2>

        <div class="info-row">

            <div class="label">
                Nama
            </div>

            <div class="value">
                <?= esc($order['buyer_name']) ?>
            </div>

        </div>

        <div class="info-row">

            <div class="label">
                Email
            </div>

            <div class="value">
                <?= esc($order['buyer_email']) ?>
            </div>

        </div>

        <div class="info-row">

            <div class="label">
                Nomor Telepon
            </div>

            <div class="value">
                <?= ! empty($order['buyer_phone'])
                    ? esc($order['buyer_phone'])
                    : '-' ?>
            </div>

        </div>

        <div class="info-row">

            <div class="label">
                Alamat
            </div>

            <div class="value">
                <?= ! empty($order['buyer_address'])
                    ? nl2br(esc($order['buyer_address']))
                    : '-' ?>
            </div>

        </div>

    </div>

</div>

</body>
</html>