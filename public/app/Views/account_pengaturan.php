<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pengaturan Akun - Relovié</title>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: 'Work Sans', Arial, sans-serif;
        background: #FDF6F3;
        color: #4A3B36;
    }

    .wrap {
        max-width: 700px;
        margin: 0 auto;
        padding: 0 24px 40px;
    }

    /* HEADER */
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
        color: #4A3B36;
    }

    /* SECTION */
    .section {
        margin-top: 18px;
    }

    .section-title {
        font-size: 13px;
        color: #8A7168;
        margin: 0 0 8px 8px;
        font-weight: 500;
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
        min-height: 58px;
        padding: 16px 18px;
        border-bottom: 1px solid #F0DED9;
        color: #4A3B36;
        text-decoration: none;
        font-size: 14px;
        transition: background 0.2s;
    }

    .menu-item:last-child {
        border-bottom: none;
    }

    .menu-item:hover {
        background: #FDF6F3;
    }

    .arrow {
        color: #A67C74;
        font-size: 22px;
        line-height: 1;
    }

    .subtitle {
        display: block;
        margin-top: 4px;
        color: #9A8780;
        font-size: 12px;
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

    <!-- HEADER -->
    <div class="header">
        <a href="/akun" class="back">&larr;</a>
        <div class="title">Pengaturan Akun</div>
    </div>


    <!-- AKUN SAYA -->
    <div class="section">

        <div class="section-title">
            Akun Saya
        </div>

        <div class="menu-list">

            <a href="/akun/pengaturan/keamanan" class="menu-item">
                <span>Akun &amp; Keamanan</span>
                <span class="arrow">&rsaquo;</span>
            </a>

            <a href="/akun/pengaturan/alamat" class="menu-item">
                <span>Alamat Saya</span>
                <span class="arrow">&rsaquo;</span>
            </a>

            <a href="/akun/pengaturan/rekening" class="menu-item">
                <span>Kartu / Rekening Bank</span>
                <span class="arrow">&rsaquo;</span>
            </a>

        </div>

    </div>


    <!-- PENGATURAN -->
    <div class="section">

        <div class="section-title">
            Pengaturan
        </div>

        <div class="menu-list">

            <a href="/akun/pengaturan/chat" class="menu-item">
                <span>Pengaturan Chat</span>
                <span class="arrow">&rsaquo;</span>
            </a>

            <a href="/akun/pengaturan/pesanan" class="menu-item">
                <span>Pengaturan Pesanan</span>
                <span class="arrow">&rsaquo;</span>
            </a>

            <a href="/akun/pengaturan/notifikasi" class="menu-item">
                <span>Pengaturan Notifikasi</span>
                <span class="arrow">&rsaquo;</span>
            </a>

            <a href="/akun/pengaturan/privasi" class="menu-item">
                <span>Pengaturan Privasi</span>
                <span class="arrow">&rsaquo;</span>
            </a>

            <a href="/akun/pengaturan/blokir" class="menu-item">
                <span>Pengguna Diblokir</span>
                <span class="arrow">&rsaquo;</span>
            </a>

            <a href="/akun/pengaturan/bahasa" class="menu-item">
                <span>
                    Bahasa / Language
                    <span class="subtitle">Bahasa Indonesia</span>
                </span>

                <span class="arrow">&rsaquo;</span>
            </a>

        </div>

    </div>


    <!-- BANTUAN -->
    <div class="section">

        <div class="section-title">
            Bantuan
        </div>

        <div class="menu-list">

            <a href="/akun/pengaturan/bantuan" class="menu-item">
                <span>Pusat Bantuan</span>
                <span class="arrow">&rsaquo;</span>
            </a>

            <a href="/akun/pengaturan/peraturan" class="menu-item">
                <span>Peraturan Komunitas</span>
                <span class="arrow">&rsaquo;</span>
            </a>

            <a href="/akun/pengaturan/kebijakan" class="menu-item">
                <span>Kebijakan</span>
                <span class="arrow">&rsaquo;</span>
            </a>

            <a href="/akun/pengaturan/nilai" class="menu-item">
                <span>Nilai Relovié</span>
                <span class="arrow">&rsaquo;</span>
            </a>

            <a href="/akun/pengaturan/informasi" class="menu-item">
                <span>Informasi</span>
                <span class="arrow">&rsaquo;</span>
            </a>

        </div>

    </div>

</div>

</body>
</html>