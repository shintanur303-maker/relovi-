<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pengaturan Pesanan - Relovié</title>

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
</style>
</head>

<body>

<div class="wrap">

    <div class="header">
        <a href="/akun/pengaturan" class="back">&larr;</a>
        <div class="title">Pengaturan Pesanan</div>
    </div>

    <div class="section">

        <div class="section-title">
            Preferensi Pesanan
        </div>

        <div class="menu-list">

            <div class="menu-item">
                <div>
                    <div class="item-title">
                        Notifikasi Status Pesanan
                    </div>

                    <div class="item-subtitle">
                        Terima pemberitahuan ketika status pesanan berubah.
                    </div>
                </div>

                <div class="toggle"></div>
            </div>

            <div class="menu-item">
                <div>
                    <div class="item-title">
                        Pengingat Pembayaran
                    </div>

                    <div class="item-subtitle">
                        Ingatkan saya ketika ada pesanan yang belum dibayar.
                    </div>
                </div>

                <div class="toggle"></div>
            </div>

            <div class="menu-item">
                <div>
                    <div class="item-title">
                        Pengingat Pesanan Selesai
                    </div>

                    <div class="item-subtitle">
                        Tampilkan pengingat untuk menyelesaikan pesanan.
                    </div>
                </div>

                <div class="toggle"></div>
            </div>

        </div>

    </div>

    <div class="section">

        <div class="section-title">
            Pengembalian & Komplain
        </div>

        <div class="menu-list">

            <div class="menu-item">
                <div>
                    <div class="item-title">
                        Notifikasi Pengembalian
                    </div>

                    <div class="item-subtitle">
                        Terima informasi mengenai proses pengembalian barang.
                    </div>
                </div>

                <div class="toggle"></div>
            </div>

        </div>

    </div>

    <div class="info">
        Pengaturan ini mengatur pemberitahuan dan preferensi yang
        berkaitan dengan pesanan di Relovié.
    </div>

</div>

</body>
</html>