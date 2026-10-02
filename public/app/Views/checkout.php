<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Checkout - Relovié</title>

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
            padding: 0 24px 50px;
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

        .card {
            background: #FFFDFB;
            border: 1px solid #F0DED9;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
        }

        .section-title {
            font-size: 13px;
            color: #8A7168;
            margin-bottom: 10px;
        }

        .address-name {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .address-phone {
            font-size: 13px;
            color: #8A7168;
            margin-bottom: 8px;
        }

        .address-text {
            font-size: 13px;
            line-height: 1.6;
            color: #5C4841;
        }

        .change-address {
            display: inline-block;
            margin-top: 12px;
            color: #A67C74;
            font-size: 13px;
            text-decoration: none;
            font-weight: 600;
        }

        .empty {
            text-align: center;
            color: #8A7168;
            font-size: 14px;
            padding: 15px 0;
        }

        .button {
            display: block;
            width: 100%;
            text-align: center;
            text-decoration: none;
            background: #A67C74;
            color: white;
            padding: 13px;
            border-radius: 8px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        .button:hover {
            background: #8F6860;
        }

        /* METODE PEMBAYARAN */

.payment-method-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.payment-method {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px;
    border: 1px solid #E6D5D0;
    border-radius: 10px;
    background: #FFFDFB;
    cursor: pointer;
    transition: 0.2s;
}

.payment-method:hover {
    background: #FDF6F3;
    border-color: #A67C74;
}

.payment-method input {
    width: 18px;
    height: 18px;
    accent-color: #A67C74;
    flex-shrink: 0;
}

.payment-icon {
    width: 42px;
    height: 42px;
    border-radius: 9px;
    background: #F2EAE7;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}

.payment-info {
    flex: 1;
}

.payment-name {
    font-size: 14px;
    font-weight: 600;
}

.payment-description {
    font-size: 12px;
    color: #8A7168;
    margin-top: 3px;
}

.qris-box {
    display: none;
    margin-top: 14px;
    padding: 18px;
    border-radius: 12px;
    background: #F9F3F0;
    border: 1px solid #E6D5D0;
    text-align: center;
}

.qris-title {
    font-size: 15px;
    font-weight: 600;
}

.qris-subtitle {
    margin-top: 5px;
    font-size: 12px;
    color: #8A7168;
}

.qris-image {
    display: block;
    width: 100%;
    max-width: 360px;
    height: auto;
    margin: 20px auto 15px;
    border-radius: 12px;
    background: #fff;
    border: 1px solid #eee;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.qris-label {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    background: #A67C74;
    color: #fff;
    font-size: 11px;
    font-weight: 600;
}

.payment-note {
    margin-top: 10px;
    font-size: 11px;
    color: #9A8780;
    line-height: 1.5;
}
    </style>
</head>

<body>

<div class="wrap">

    <div class="header">
        <a href="/keranjang" class="back">&larr;</a>
        <div class="title">Checkout</div>
    </div>

    <div class="card">

        <div class="section-title">
            Alamat Pengiriman
        </div>

        <?php if (! empty($address)): ?>

            <div class="address-name">
                <?= esc($address['recipient_name']) ?>
            </div>

            <div class="address-phone">
                <?= esc($address['phone']) ?>
            </div>

            <div class="address-text">
                <?= esc($address['full_address']) ?><br>

                <?= esc($address['village']) ?>,
                <?= esc($address['district']) ?>,
                <?= esc($address['city']) ?>,
                <?= esc($address['province']) ?>

                <?= ! empty($address['postal_code'])
                    ? ' ' . esc($address['postal_code'])
                    : '' ?>
            </div>

            <a
                href="/akun/pengaturan/alamat"
                class="change-address"
            >
                Ubah Alamat
            </a>

        <?php else: ?>

            <div class="empty">
                Belum ada alamat utama.
            </div>

            <a
                href="/akun/pengaturan/alamat/tambah"
                class="button"
            >
                + Tambah Alamat
            </a>

        <?php endif; ?>

    </div>

    <?php if (! empty($address)): ?>

    <div class="card">

        <div class="section-title">
            Ringkasan Pesanan
        </div>

        <?php foreach ($items as $item): ?>

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        padding:10px 0;
        border-bottom:1px solid #F0DED9;
    ">

        <div>
            <div style="
                font-size:14px;
                font-weight:600;
            ">
                <?= esc($item['name']) ?>
            </div>

            <div style="
                font-size:12px;
                color:#8A7168;
                margin-top:4px;
            ">
                <?= esc($item['quantity']) ?> barang
            </div>
        </div>

        <div style="
            font-size:14px;
            font-weight:600;
            color:#5C4841;
        ">
            Rp <?= number_format(
                $item['price'] * $item['quantity'],
                0,
                ',',
                '.'
            ) ?>
        </div>

    </div>

<?php endforeach; ?>

    </div>

    <form
    action="<?= session()->get('checkout_cart_items')
        ? '/keranjang/checkout-pilihan/konfirmasi'
        : '/keranjang/checkout/konfirmasi' ?>"
    method="post"
>
    <?= csrf_field() ?>

    <div class="card">

        <div class="section-title">
            Metode Pembayaran
        </div>

        <div class="payment-method-list">

            <label class="payment-method">

                <input
                    type="radio"
                    name="payment_method"
                    value="qris"
                    checked
                    onchange="showPaymentMethod('qris')"
                >

                <div class="payment-icon">
                    📱
                </div>

                <div class="payment-info">

                    <div class="payment-name">
                        QRIS Relovié
                    </div>

                    <div class="payment-description">
                        Bayar dengan aplikasi pembayaran yang mendukung QRIS
                    </div>

                </div>

            </label>


            <label class="payment-method">

                <input
                    type="radio"
                    name="payment_method"
                    value="transfer"
                    onchange="showPaymentMethod('transfer')"
                >

                <div class="payment-icon">
                    🏦
                </div>

                <div class="payment-info">

                    <div class="payment-name">
                        Transfer Bank
                    </div>

                    <div class="payment-description">
                        Transfer melalui rekening bank
                    </div>

                </div>

            </label>


            <label class="payment-method">

                <input
                    type="radio"
                    name="payment_method"
                    value="ewallet"
                    onchange="showPaymentMethod('ewallet')"
                >

                <div class="payment-icon">
                    💰
                </div>

                <div class="payment-info">

                    <div class="payment-name">
                        E-Wallet
                    </div>

                    <div class="payment-description">
                        DANA, GoPay, OVO, atau ShopeePay
                    </div>

                </div>

            </label>


            <label class="payment-method">

                <input
                    type="radio"
                    name="payment_method"
                    value="card"
                    onchange="showPaymentMethod('card')"
                >

                <div class="payment-icon">
                    💳
                </div>

                <div class="payment-info">

                    <div class="payment-name">
                        Kartu Debit / Kredit
                    </div>

                    <div class="payment-description">
                        Gunakan kartu yang tersimpan
                    </div>

                </div>

            </label>

        </div>


        <!-- QRIS -->

        <div id="payment-qris" class="qris-box" style="display:block;">

    <div class="qris-title">
        QRIS Relovié
    </div>

    <div class="qris-subtitle">
        Scan QRIS berikut untuk melakukan pembayaran
    </div>

    <img
        src="/assets/qris_relovie.jpeg"
        alt="QRIS Relovié"
        class="qris-image"
    >

</div>

        <!-- TRANSFER -->

        <div id="payment-transfer" class="qris-box">

            <div class="qris-title">
                Transfer Bank
            </div>

            <div class="qris-subtitle">
                Pembayaran transfer akan diarahkan ke rekening Relovié.
            </div>

            <div style="
                margin-top:16px;
                padding:14px;
                background:#fff;
                border-radius:10px;
                font-size:13px;
                line-height:1.7;
            ">
                <strong>Bank Relovié (Demo)</strong><br>
                No. Rekening: 1234 5678 9000<br>
                Atas Nama: Relovié
            </div>

        </div>


        <!-- E-WALLET -->

        <div id="payment-ewallet" class="qris-box">

            <div class="qris-title">
                E-Wallet
            </div>

            <div class="qris-subtitle">
                Pilih e-wallet yang tersedia untuk simulasi pembayaran.
            </div>

            <div style="
                margin-top:16px;
                display:flex;
                justify-content:center;
                flex-wrap:wrap;
                gap:8px;
            ">

                <span class="qris-label">DANA</span>
                <span class="qris-label">GoPay</span>
                <span class="qris-label">OVO</span>
                <span class="qris-label">ShopeePay</span>

            </div>

        </div>


        <!-- KARTU -->

        <div id="payment-card" class="qris-box">

            <div class="qris-title">
                Kartu Debit / Kredit
            </div>

            <div class="qris-subtitle">
                Gunakan kartu yang sudah tersimpan di akun kamu.
            </div>

            <div style="
                margin-top:16px;
                padding:14px;
                background:#fff;
                border-radius:10px;
                font-size:13px;
            ">
                💳 Kartu yang tersimpan akan digunakan
                saat pembayaran.
            </div>

        </div>

    </div>


    <button
        type="submit"
        class="button"
    >
        Buat Pesanan
    </button>

</form>

<?php endif; ?>

</div>

<script>

function showPaymentMethod(method) {

    const boxes = [
        'qris',
        'transfer',
        'ewallet',
        'card'
    ];

    boxes.forEach(function (item) {

        const box = document.getElementById(
            'payment-' + item
        );

        if (box) {
            box.style.display = 'none';
        }

    });

    const activeBox = document.getElementById(
        'payment-' + method
    );

    if (activeBox) {
        activeBox.style.display = 'block';
    }

}

</script>

</body>
</html>