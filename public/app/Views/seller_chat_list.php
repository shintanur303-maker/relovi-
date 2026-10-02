<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Chat Pembeli — Relovié</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f7f4;
            color: #333;
        }

        .wrap {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #666;
            font-size: 14px;
        }

        h1 {
            margin: 0 0 25px;
            font-size: 28px;
        }

        .buyer-card {
            display: block;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 18px 20px;
            margin-bottom: 12px;
            text-decoration: none;
            color: #333;
            transition: .2s;
        }

        .buyer-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 18px rgba(0,0,0,.06);
        }

        .buyer-name {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .buyer-info {
            font-size: 13px;
            color: #888;
        }

        .empty {
            background: #fff;
            border-radius: 12px;
            padding: 45px 20px;
            text-align: center;
            color: #888;
        }

        .empty-icon {
            font-size: 42px;
            margin-bottom: 10px;
        }

        .empty h3 {
            margin: 5px 0 8px;
            color: #555;
        }

        .empty p {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="wrap">

    <a href="/" class="back">
        ← Kembali ke Beranda
    </a>

    <h1>💬 Chat Pembeli</h1>

    <?php if (! empty($buyers)): ?>

        <?php foreach ($buyers as $buyer): ?>

            <a
                href="/jual/chat/<?= esc($buyer['buyer_id']) ?>"
                class="buyer-card"
            >

                <div class="buyer-name">
                    <?= esc($buyer['name'] ?? 'Pembeli') ?>
                </div>

                <div class="buyer-info">
                    Klik untuk melihat percakapan dengan pembeli ini
                </div>

            </a>

        <?php endforeach; ?>

    <?php else: ?>

        <div class="empty">

            <div class="empty-icon">
                💬
            </div>

            <h3>Belum ada chat</h3>

            <p>
                Percakapan dengan pembeli akan muncul di sini.
            </p>

        </div>

    <?php endif; ?>

</div>

</body>
</html>