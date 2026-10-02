<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-Wallet - Relovié</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f6f4f3;
            color: #333;
        }

        .page {
            max-width: 760px;
            margin: 0 auto;
            min-height: 100vh;
        }

        .header {
            height: 70px;
            background: #fff;
            display: flex;
            align-items: center;
            padding: 0 24px;
            border-bottom: 1px solid #eee;
        }

        .back {
            text-decoration: none;
            color: #333;
            font-size: 28px;
            margin-right: 20px;
        }

        .header-title {
            font-size: 24px;
            font-weight: 600;
        }

        .content {
            padding: 28px 24px 50px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .card {
            background: #fff;
            border: 1px solid #e6e2df;
            border-radius: 14px;
            overflow: hidden;
            margin-bottom: 22px;
        }

        .wallet-item {
            display: flex;
            align-items: center;
            padding: 20px 22px;
            border-bottom: 1px solid #eee;
            text-decoration: none;
            color: #333;
        }

        .wallet-item:last-child {
            border-bottom: none;
        }

        .wallet-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: #f2eeec;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            margin-right: 16px;
        }

        .wallet-info {
            flex: 1;
        }

        .wallet-name {
            font-size: 17px;
            font-weight: 600;
        }

        .wallet-description {
            margin-top: 5px;
            font-size: 13px;
            color: #888;
        }

        .arrow {
            font-size: 24px;
            color: #999;
        }

        .info-box {
            background: #faf8f7;
            border: 1px solid #e6e2df;
            border-radius: 12px;
            padding: 16px;
            color: #777;
            font-size: 13px;
            line-height: 1.6;
        }

        @media (max-width: 600px) {
            .header {
                padding: 0 18px;
            }

            .header-title {
                font-size: 21px;
            }

            .content {
                padding: 22px 16px 40px;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <div class="header">
        <a href="/akun/pengaturan/rekening" class="back">‹</a>

        <div class="header-title">
            E-Wallet
        </div>
    </div>

    <div class="content">

        <div class="section-title">
            Pilih E-Wallet
        </div>

        <div class="card">

            <a href="#" class="wallet-item">
                <div class="wallet-icon">💙</div>

                <div class="wallet-info">
                    <div class="wallet-name">DANA</div>
                    <div class="wallet-description">
                        Tambahkan akun DANA
                    </div>
                </div>

                <div class="arrow">›</div>
            </a>

            <a href="#" class="wallet-item">
                <div class="wallet-icon">💚</div>

                <div class="wallet-info">
                    <div class="wallet-name">GoPay</div>
                    <div class="wallet-description">
                        Tambahkan akun GoPay
                    </div>
                </div>

                <div class="arrow">›</div>
            </a>

            <a href="#" class="wallet-item">
                <div class="wallet-icon">🟣</div>

                <div class="wallet-info">
                    <div class="wallet-name">OVO</div>
                    <div class="wallet-description">
                        Tambahkan akun OVO
                    </div>
                </div>

                <div class="arrow">›</div>
            </a>

            <a href="#" class="wallet-item">
                <div class="wallet-icon">🟠</div>

                <div class="wallet-info">
                    <div class="wallet-name">ShopeePay</div>
                    <div class="wallet-description">
                        Tambahkan akun ShopeePay
                    </div>
                </div>

                <div class="arrow">›</div>
            </a>

        </div>

        <div class="info-box">
            E-Wallet yang tersimpan dapat digunakan sebagai salah satu
            metode pembayaran saat checkout di Relovié.
        </div>

    </div>

</div>

</body>
</html>