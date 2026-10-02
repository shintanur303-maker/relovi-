<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pengguna Diblokir - Relovié</title>

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

    .info {
        background: #FFFDFB;
        border: 1px solid #F0DED9;
        border-radius: 12px;
        padding: 18px;
        font-size: 13px;
        line-height: 1.6;
        color: #806F69;
        margin-bottom: 18px;
    }

    .empty {
        background: #FFFDFB;
        border: 1px solid #F0DED9;
        border-radius: 12px;
        padding: 50px 20px;
        text-align: center;
    }

    .empty-icon {
        font-size: 40px;
        margin-bottom: 14px;
    }

    .empty-title {
        font-size: 16px;
        font-weight: 600;
    }

    .empty-text {
        margin-top: 8px;
        font-size: 13px;
        color: #9A8780;
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
            Pengguna Diblokir
        </div>
    </div>

    <div class="info">
        Pengguna yang kamu blokir tidak dapat berinteraksi dengan
        kamu melalui fitur tertentu di Relovié. Daftar pengguna
        yang diblokir akan ditampilkan di halaman ini.
    </div>

    <div class="empty">

        <div class="empty-icon">
            🚫
        </div>

        <div class="empty-title">
            Belum ada pengguna yang diblokir
        </div>

        <div class="empty-text">
            Saat ini daftar pengguna yang kamu blokir masih kosong.
        </div>

    </div>

</div>

</body>
</html>