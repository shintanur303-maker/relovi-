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

        .chat-container {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 14px;
            overflow: hidden;
        }

        .chat-header {
            padding: 18px 20px;
            border-bottom: 1px solid #eee;
        }

        .chat-header h2 {
            margin: 0;
            font-size: 19px;
        }

        .chat-header p {
            margin: 5px 0 0;
            color: #888;
            font-size: 13px;
        }

        .chat-box {
            padding: 20px;
            min-height: 400px;
            max-height: 550px;
            overflow-y: auto;
            background: #fafafa;
        }

        .bubble {
            max-width: 75%;
            padding: 11px 14px;
            margin-bottom: 12px;
            border-radius: 12px;
            font-size: 14px;
            line-height: 1.5;
            word-wrap: break-word;
        }

        .bubble.buyer {
            background: #eee;
            margin-right: auto;
            border-bottom-left-radius: 4px;
        }

        .bubble.seller {
            background: #A67C74;
            color: #fff;
            margin-left: auto;
            border-bottom-right-radius: 4px;
        }

        .empty-chat {
            text-align: center;
            color: #999;
            padding: 80px 20px;
            font-size: 14px;
        }

        .chat-form {
            display: flex;
            gap: 10px;
            padding: 15px;
            border-top: 1px solid #eee;
            background: #fff;
        }

        .chat-form input {
            flex: 1;
            height: 42px;
            padding: 0 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            font-family: inherit;
        }

        .chat-form input:focus {
            border-color: #A67C74;
        }

        .chat-form button {
            background: #A67C74;
            color: #fff;
            border: none;
            padding: 0 20px;
            border-radius: 8px;
            cursor: pointer;
            font-family: inherit;
        }

        .chat-form button:hover {
            opacity: .9;
        }
    </style>
</head>

<body>

<div class="wrap">

    <a href="/jual/chat" class="back">
        ← Kembali ke daftar chat
    </a>

    <div class="chat-container">

        <div class="chat-header">
            <h2>💬 Chat dengan Pembeli</h2>

            <p>
                Kamu sedang berbicara dengan pembeli.
            </p>
        </div>

        <div class="chat-box" id="chatBox">

            <?php if (! empty($messages)): ?>

                <?php foreach ($messages as $m): ?>

                    <div class="bubble <?= $m['sender'] === 'buyer' ? 'buyer' : 'seller' ?>">
                        <?= esc($m['message']) ?>
                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="empty-chat">
                    Belum ada pesan dalam percakapan ini.
                </div>

            <?php endif; ?>

        </div>

        <form
            action="/jual/chat/<?= esc($buyerId) ?>/balas"
            method="post"
            class="chat-form"
        >

            <input
                type="text"
                name="message"
                placeholder="Tulis balasan..."
                required
                autocomplete="off"
            >

            <button type="submit">
                Kirim
            </button>

        </form>

    </div>

</div>

<script>
    const chatBox = document.getElementById('chatBox');

    if (chatBox) {
        chatBox.scrollTop = chatBox.scrollHeight;
    }
</script>

</body>
</html>