<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Bahasa - Relovié</title>

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

    .language-list {
        background: #FFFDFB;
        border: 1px solid #F0DED9;
        border-radius: 12px;
        overflow: hidden;
    }

    .language-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px;
        border-bottom: 1px solid #F0DED9;
    }

    .language-item:last-child {
        border-bottom: none;
    }

    .language-name {
        font-size: 14px;
        font-weight: 500;
    }

    .language-subtitle {
        margin-top: 4px;
        font-size: 12px;
        color: #9A8780;
    }

    .radio {
        width: 22px;
        height: 22px;
        border: 2px solid #CDBAB3;
        border-radius: 50%;
        position: relative;
    }

    .radio.active {
        border-color: #A67C74;
    }

    .radio.active::after {
        content: '';
        position: absolute;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #A67C74;
        top: 4px;
        left: 4px;
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
            Bahasa / Language
        </div>
    </div>

    <div class="section">

        <div class="section-title">
            Pilih Bahasa
        </div>

        <div class="language-list">

            <div class="language-item">
                <div>
                    <div class="language-name">
                        Bahasa Indonesia
                    </div>

                    <div class="language-subtitle">
                        Gunakan Relovié dalam Bahasa Indonesia
                    </div>
                </div>

                <div class="radio active"></div>
            </div>

            <div class="language-item">
                <div>
                    <div class="language-name">
                        English
                    </div>

                    <div class="language-subtitle">
                        Use Relovié in English
                    </div>
                </div>

                <div class="radio"></div>
            </div>

        </div>

    </div>

    <div class="info">
        Bahasa Indonesia saat ini digunakan sebagai bahasa utama
        antarmuka Relovié. Pilihan bahasa dapat dikembangkan lebih
        lanjut agar tersimpan sebagai preferensi akun.
    </div>

</div>

</body>
</html>