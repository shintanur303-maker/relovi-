<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produk Diarsipkan - Relovié</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f3ec;
            color: #3a2a20;
        }

        .wrap {
            width: 90%;
            max-width: 1100px;
            margin: 0 auto;
        }

        .header {
            padding: 28px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd2c8;
        }

        .header h1 {
            margin: 0;
            font-size: 26px;
        }

        .back {
            text-decoration: none;
            color: #6f4e37;
            font-weight: 600;
        }

        .message {
            margin-top: 20px;
            padding: 12px 16px;
            border-radius: 8px;
            background: #efe4d5;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-top: 28px;
        }

        .card {
            background: #fff;
            border: 1px solid #e1d6cc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 14px rgba(0,0,0,0.04);
        }

        .image {
            height: 220px;
            background: #eee;
        }

        .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .body {
            padding: 14px;
        }

        .name {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .price {
            font-size: 16px;
            font-weight: 700;
            color: #6f4e37;
            margin-bottom: 8px;
        }

        .meta {
            font-size: 12px;
            color: #777;
            margin-bottom: 12px;
        }

        .btn {
            display: block;
            text-align: center;
            text-decoration: none;
            padding: 9px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid #6f4e37;
            color: #6f4e37;
        }

        .empty {
            margin-top: 35px;
            text-align: center;
            color: #777;
        }

        @media (max-width: 900px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="wrap">

    <div class="header">
        <h1>📦 Produk Diarsipkan</h1>

        <a href="/" class="back">
            ← Kembali ke Beranda
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="message">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="message">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <?php if (! empty($products)): ?>

        <div class="grid">

            <?php foreach ($products as $p): ?>

                <div class="card">

                    <div class="image">

                        <?php if (! empty($p['photo'])): ?>

                            <img
                                src="/uploads/products/<?= esc($p['photo']) ?>"
                                alt="<?= esc($p['name']) ?>"
                            >

                        <?php endif; ?>

                    </div>

                    <div class="body">

                        <div class="name">
                            <?= esc($p['name']) ?>
                        </div>

                        <div class="price">
                            Rp<?= number_format($p['price'] ?? 0, 0, ',', '.') ?>
                        </div>

                        <div class="meta">
                            <?= esc($p['category'] ?? '-') ?>
                            ·
                            <?= esc($p['location'] ?? '-') ?>
                        </div>

                        <a
                            href="/produk/aktifkan/<?= $p['id'] ?>"
                            onclick="return confirm('Aktifkan kembali produk ini?')"
                            class="btn"
                        >
                            ↩ Aktifkan Kembali
                        </a>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    <?php else: ?>

        <div class="empty">
            <h3>Belum ada produk yang diarsipkan.</h3>
            <p>Produk yang kamu arsipkan akan muncul di halaman ini.</p>
        </div>

    <?php endif; ?>

</div>

</body>
</html>