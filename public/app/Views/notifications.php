<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Notifikasi — Relovié</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f7f4;
            margin: 0;
            padding: 30px;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
        }

        .read-all {
            text-decoration: none;
            font-size: 13px;
            color: #333;
        }

        .notification {
            background: white;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 10px;
            border: 1px solid #eee;
        }

        .notification.unread {
            border-left: 4px solid #333;
        }

        .notification-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .notification-message {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }

        .notification-time {
            font-size: 12px;
            color: #999;
            margin-top: 8px;
        }

        .empty {
            background: white;
            border-radius: 12px;
            padding: 40px;
            text-align: center;
            color: #888;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <h1>🔔 Notifikasi</h1>

        <?php if (($unreadCount ?? 0) > 0): ?>
            <a
                href="/notifikasi/baca-semua"
                class="read-all"
            >
                Tandai semua sudah dibaca
            </a>
        <?php endif; ?>

    </div>

    <?php if (! empty($notifications)): ?>

        <?php foreach ($notifications as $notification): ?>

            <a
                href="/notifikasi/baca/<?= $notification['id'] ?>"
                style="text-decoration:none; color:inherit;"
            >

                <div
                    class="notification <?= $notification['is_read'] == 0 ? 'unread' : '' ?>"
                >

                    <div class="notification-title">

                        <?php if ($notification['is_read'] == 0): ?>
                            ●
                        <?php endif; ?>

                        <?= esc($notification['title']) ?>

                    </div>

                    <div class="notification-message">
                        <?= esc($notification['message']) ?>
                    </div>

                    <div class="notification-time">
                        <?= esc($notification['created_at']) ?>
                    </div>

                </div>

            </a>

        <?php endforeach; ?>

    <?php else: ?>

        <div class="empty">
            <div style="font-size:40px;">🔔</div>

            <h3>Belum ada notifikasi</h3>

            <p>
                Notifikasi aktivitas kamu akan muncul di sini.
            </p>
        </div>

    <?php endif; ?>

</div>

</body>
</html>