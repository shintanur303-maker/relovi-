<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pengaturan Privasi - Relovié</title>

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
        line-height: 1;
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
        min-height: 64px;
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
        line-height: 1.4;
        max-width: 480px;
    }

    .toggle {
        width: 44px;
        height: 24px;
        border-radius: 20px;
        background: #A67C74;
        position: relative;
        flex-shrink: 0;
        margin-left: 15px;
    }

    .toggle::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        background: #fff;
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

        <div class="title">
            Pengaturan Privasi
        </div>
    </div>


    <div class="section">

        <div class="section-title">
            Privasi Akun
        </div>

        <div class="menu-list">

            <div class="menu-item">

                <div>
                    <div class="item-title">
                        Profil Dapat Dilihat
                    </div>

                    <div class="item-subtitle">
                        Izinkan pengguna lain melihat informasi dasar profil kamu.
                    </div>
                </div>

                <div class="toggle"></div>

            </div>

            <div class="menu-item">

                <div>
                    <div class="item-title">
                        Aktivitas Toko
                    </div>

                    <div class="item-subtitle">
                        Tampilkan aktivitas dan informasi toko kepada pengguna lain.
                    </div>
                </div>

                <div class="toggle"></div>

            </div>

        </div>

    </div>


    <div class="section">

        <div class="section-title">
            Interaksi
        </div>

        <div class="menu-list">

            <div class="menu-item">

                <div>
                    <div class="item-title">
                        Pesan dari Pengguna Lain
                    </div>

                    <div class="item-subtitle">
                        Izinkan pengguna lain menghubungi kamu melalui chat.
                    </div>
                </div>

                <div class="toggle"></div>

            </div>

            <div class="menu-item">

                <div>
                    <div class="item-title">
                        Tampilkan Status Online
                    </div>

                    <div class="item-subtitle">
                        Pengguna lain dapat melihat ketika kamu sedang aktif.
                    </div>
                </div>

                <div class="toggle"></div>

            </div>

        </div>

    </div>


    <div class="section">

        <div class="section-title">
            Data & Aktivitas
        </div>

        <div class="menu-list">

            <div class="menu-item">

                <div>
                    <div class="item-title">
                        Personalisasi Pengalaman
                    </div>

                    <div class="item-subtitle">
                        Gunakan aktivitas di Relovié untuk menyesuaikan pengalaman pengguna.
                    </div>
                </div>

                <div class="toggle"></div>

            </div>

        </div>

    </div>


    <div class="info">
        Pengaturan privasi membantu mengatur bagaimana informasi profil,
        aktivitas, dan interaksi kamu ditampilkan di Relovié.
    </div>

</div>

</body>
</html>