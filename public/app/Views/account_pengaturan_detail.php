<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($judul ?? 'Pengaturan') ?> - Relovié</title>

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

        /* HEADER */
        .header {
            height: 70px;
            background: #ffffff;
            display: flex;
            align-items: center;
            padding: 0 24px;
            border-bottom: 1px solid #eeeeee;
        }

        .back {
            text-decoration: none;
            color: #333;
            font-size: 28px;
            margin-right: 20px;
            line-height: 1;
        }

        .header-title {
            font-size: 24px;
            font-weight: 600;
        }

        /* CONTENT */
        .content {
            padding: 28px 24px 50px;
        }

        .section {
            margin-bottom: 24px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            margin: 0;
            padding: 0 4px 12px;
        }

        .card {
            background: #ffffff;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid #e6e2df;
            margin-bottom: 20px;
        }

        .card-title {
            padding: 20px 22px;
            font-size: 18px;
            font-weight: 600;
            border-bottom: 1px solid #eeeeee;
        }

        /* PAYMENT ITEM */
        .payment-item {
            min-height: 82px;
            display: flex;
            align-items: center;
            padding: 18px 22px;
            text-decoration: none;
            color: #333;
            transition: background 0.2s;
        }

        .payment-item:hover {
            background: #faf8f7;
        }

        .payment-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: #f2eeec;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            margin-right: 16px;
            flex-shrink: 0;
        }

        .payment-info {
            flex: 1;
        }

        .payment-name {
            font-size: 17px;
            font-weight: 500;
        }

        .payment-description {
            margin-top: 5px;
            color: #888;
            font-size: 13px;
        }

        .arrow {
            font-size: 24px;
            color: #999;
            margin-left: 10px;
        }

        /* KARTU TERSIMPAN */

.saved-card {
    padding: 20px 22px;
    border-bottom: 1px solid #eeeeee;
}

.saved-card-top {
    display: flex;
    align-items: center;
}

.saved-card-icon {
    width: 48px;
    height: 48px;
    border-radius: 10px;
    background: #f2eeec;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 23px;
    margin-right: 16px;
    flex-shrink: 0;
}

.saved-card-info {
    flex: 1;
}

.saved-card-name {
    font-size: 17px;
    font-weight: 600;
}

.saved-card-number {
    color: #777;
    margin-top: 5px;
    font-size: 14px;
}

.saved-card-expiry {
    color: #999;
    margin-top: 4px;
    font-size: 13px;
}

.card-primary-badge {
    display: inline-block;
    margin-left: 7px;
    padding: 4px 9px;
    border-radius: 20px;
    background: #80665d;
    color: white;
    font-size: 11px;
    font-weight: 600;
}

        /* REKENING */
        .bank-item {
            padding: 20px 22px;
        }

        .bank-top {
            display: flex;
            align-items: center;
        }

        .bank-logo {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: #f2eeec;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #80665d;
            margin-right: 16px;
        }

        .bank-info {
            flex: 1;
        }

        .bank-name {
            font-size: 18px;
            font-weight: 500;
        }

        .bank-number {
            color: #777;
            margin-top: 5px;
            font-size: 14px;
        }

        .bank-status {
            display: inline-block;
            margin-top: 14px;
            margin-left: 64px;
            padding: 6px 12px;
            background: #f0eee9;
            color: #80665d;
            border-radius: 8px;
            font-size: 13px;
        }

        .primary-badge {
            display: inline-block;
            margin-left: 6px;
            padding: 6px 12px;
            background: #eeeae7;
            color: #555;
            border-radius: 8px;
            font-size: 13px;
        }

        /* TAMBAH */
        .add-item {
            min-height: 82px;
            display: flex;
            align-items: center;
            padding: 18px 22px;
            text-decoration: none;
            color: #80665d;
        }

        .add-icon {
            width: 48px;
            height: 48px;
            border: 1px dashed #aaa;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: #777;
            margin-right: 16px;
        }

        .add-text {
            font-size: 17px;
        }

        /* EMPTY */
        .empty {
            padding: 25px 22px;
            color: #888;
            font-size: 14px;
        }

        /* RESPONSIVE */
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

            .section-title {
                font-size: 18px;
            }

            .card-title {
                font-size: 17px;
            }

            .bank-action {
    margin-top: 10px;
}

.primary-link {
    color: #80665d;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
}

.primary-link:hover {
    text-decoration: underline;
}

.delete-link {
    margin-left: 15px;
    color: #b85c5c;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
}

.delete-link:hover {
    text-decoration: underline;
}

.primary-badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 20px;
    background: #80665d;
    color: white;
    font-size: 12px;
    font-weight: 600;
}
        }
    </style>
</head>

<body>

<div class="page">

    <!-- HEADER -->
    <div class="header">

        <a href="/akun/pengaturan" class="back">
            ‹
        </a>

        <div class="header-title">
            Rekening Bank / Kartu
        </div>

    </div>


    <div class="content">

        <!-- KARTU -->
        <div class="section">

            <div class="section-title">
                Kartu Kredit / Debit
            </div>

            <div class="card">

    <?php if (! empty($bankCards)): ?>

        <?php foreach ($bankCards as $card): ?>

            <div class="saved-card">

                <div class="saved-card-top">

                    <div class="saved-card-icon">
                        💳
                    </div>

                    <div class="saved-card-info">

                        <div class="saved-card-name">
                            <?= esc($card['card_name']) ?>

                            <?php if ($card['is_primary']): ?>
                                <span class="card-primary-badge">
                                    Utama
                                </span>
                            <?php endif; ?>

                        </div>

                        <div class="saved-card-number">
                            <?= esc($card['card_type']) ?>
                            •••• <?= esc($card['last_four']) ?>
                        </div>

                        <div class="saved-card-expiry">
                            Berlaku sampai <?= esc($card['expiry_month']) ?>/<?= esc($card['expiry_year']) ?>
                        </div>

                    </div>

                    <div class="arrow">
                        ›
                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>


    <!-- TAMBAH KARTU -->

    <a href="/akun/pengaturan/kartu/tambah" class="payment-item">

        <div class="payment-icon">
            💳
        </div>

        <div class="payment-info">

            <div class="payment-name">
                Tambah Kartu Baru
            </div>

            <div class="payment-description">
                Tambahkan kartu untuk pembayaran
            </div>

        </div>

        <div class="arrow">
            ›
        </div>

    </a>

</div>

        </div>


        <!-- REKENING BANK -->
        <div class="section">

            <div class="section-title">
                Rekening Bank
            </div>

            <div class="card">

                <?php if (! empty($bankAccounts)): ?>

    <?php foreach ($bankAccounts as $bank): ?>

        <div class="bank-item">

            <div class="bank-top">

                <div class="bank-logo">
                    <?= esc(strtoupper(substr($bank['bank_name'], 0, 4))) ?>
                </div>

                <div class="bank-info">

                    <div class="bank-name">
                        <?= esc($bank['bank_name']) ?>
                    </div>

                    <div class="bank-number">

                        •••• <?= esc(substr($bank['account_number'], -4)) ?>

                    </div>

                </div>

                <div class="arrow">
                    ›
                </div>

            </div>


            <div class="bank-action">

    <?php if ($bank['is_primary']): ?>

        <span class="primary-badge">
            Utama
        </span>

    <?php else: ?>

        <a
            href="/akun/pengaturan/rekening/utama/<?= $bank['id'] ?>"
            class="primary-link"
            onclick="return confirm('Jadikan rekening ini sebagai rekening utama?')"
        >
            Jadikan Rekening Utama
        </a>

    <?php endif; ?>

    <a
        href="/akun/pengaturan/rekening/hapus/<?= $bank['id'] ?>"
        class="delete-link"
        onclick="return confirm('Yakin ingin menghapus rekening ini?')"
    >
        Hapus
    </a>

</div>

        </div>

    <?php endforeach; ?>

<?php else: ?>

    <div class="empty">
        Belum ada rekening bank yang ditambahkan.
    </div>

<?php endif; ?>


                <!-- TAMBAH REKENING -->
                <a href="/akun/pengaturan/rekening/tambah" class="add-item">

                    <div class="add-icon">
                        +
                    </div>

                    <div class="add-text">
                        Tambah Rekening Bank
                    </div>

                </a>

            </div>

        </div>


        <!-- PEMBAYARAN LAIN -->
        <div class="section">

            <div class="section-title">
                Metode Pembayaran Lain
            </div>

            <div class="card">

                <a href="/akun/pengaturan/ewallet" class="payment-item">

                    <div class="payment-icon">
                        💰
                    </div>

                    <div class="payment-info">

                        <div class="payment-name">
                            E-Wallet
                        </div>

                        <div class="payment-description">
                            Tambahkan metode pembayaran lainnya
                        </div>

                    </div>

                    <div class="arrow">
                        ›
                    </div>

                </a>

            </div>

        </div>


        <!-- PENGATURAN -->
        <div class="section">

            <div class="section-title">
                Pengaturan Pembayaran
            </div>

            <div class="card">

                <a href="#" class="payment-item">

                    <div class="payment-icon">
                        ⚙
                    </div>

                    <div class="payment-info">

                        <div class="payment-name">
                            Pengaturan Pembayaran
                        </div>

                        <div class="payment-description">
                            Kelola preferensi pembayaran kamu
                        </div>

                    </div>

                    <div class="arrow">
                        ›
                    </div>

                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>