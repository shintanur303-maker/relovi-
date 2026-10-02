<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pengaturan Chat - Relovié</title>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #FDF6F3;
        color: #4A3B36;
    }

    .wrap {
        max-width: 700px;
        margin: 0 auto;
        padding: 0 24px 40px;
    }

    .header {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 28px 0 22px;
    }

    .back {
        text-decoration: none;
        color: #A67C74;
        font-size: 26px;
    }

    .title {
        font-size: 22px;
        font-weight: 600;
    }

    .section {
        margin-top: 18px;
    }

    .section-title {
        font-size: 13px;
        color: #8A7168;
        margin: 0 0 8px 8px;
    }

    .menu-list {
        background: #FFFDFB;
        border: 1px solid #F0DED9;
        border-radius: 12px;
        overflow: hidden;
    }

    .menu-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-height: 62px;
        padding: 16px 18px;
        border-bottom: 1px solid #F0DED9;
    }

    .menu-item:last-child {
        border-bottom: none;
    }

    .item-title {
        font-size: 14px;
        font-weight: 500;
    }

    .item-subtitle {
        margin-top: 4px;
        font-size: 12px;
        color: #9A8780;
    }

    .toggle {
        width: 44px;
        height: 24px;
        border-radius: 20px;
        background: #A67C74;
        position: relative;
        flex-shrink: 0;
    }

    .toggle::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        background: white;
        border-radius: 50%;
        top: 2px;
        right: 2px;
    }

    .info {
        margin-top: 18px;
        padding: 16px;
        background: #FFFDFB;
        border: 1px solid #F0DED9;
        border-radius: 12px;
        font-size: 13px;
        line-height: 1.6;
        color: #806F69;
    }

    @media (max-width: 600px) {
        .wrap {
            padding-left: 16px;
            padding-right: 16px;
        }

        .title {
            font-size: 20px;
        }
    }
</style>
</head>

<body>

<div class="wrap">

    <div class="header">
        <a href="/akun/pengaturan" class="back">&larr;</a>
        <div class="title">Pengaturan Chat</div>
    </div>

    <div class="section">

        <div class="section-title">
            Preferensi Chat
        </div>

        <div class="menu-list">

            <div class="menu-item">
                <div>
                    <div class="item-title">
                        Izinkan Pesan dari Penjual
                    </div>

                    <div class="item-subtitle">
                        Penjual dapat menghubungi kamu melalui chat.
                    </div>
                </div>

                <div class="toggle"></div>
            </div>

            <div class="menu-item">
                <div>
                    <div class="item-title">
                        Notifikasi Pesan Baru
                    </div>

                    <div class="item-subtitle">
                        Tampilkan pemberitahuan ketika ada pesan baru.
                    </div>
                </div>

                <div class="toggle"></div>
            </div>

            <div class="menu-item">
                <div>
                    <div class="item-title">
                        Notifikasi Penjual
                    </div>

                    <div class="item-subtitle">
                        Terima informasi terkait percakapan dengan penjual.
                    </div>
                </div>

                <div class="toggle"></div>
            </div>

        </div>

    </div>

    <div class="section">

        <div class="section-title">
            Privasi Chat
        </div>

        <div class="menu-list">

            <div class="menu-item">

                <div>
                    <div class="item-title">
                        Status Online
                    </div>

                    <div class="item-subtitle">
                        Izinkan pengguna lain melihat status online kamu.
                    </div>
                </div>

                <div class="toggle"></div>

            </div>

        </div>

    </div>

    <div class="info">
        Pengaturan ini digunakan untuk mengatur pengalaman chat di Relovié.
        Untuk saat ini pengaturan masih bersifat tampilan dan akan
        dikembangkan lebih lanjut agar tersimpan ke akun pengguna.
    </div>

</div>

</body>
</html>