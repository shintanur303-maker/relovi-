<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pembayaran - Relovié</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 700px;
            margin: auto;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #22344A;
            font-size: 14px;
        }

        .header {
            background: #22344A;
            color: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 24px;
        }

        .header p {
            margin: 0;
            opacity: 0.85;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 15px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .card h2 {
            margin-top: 0;
            font-size: 18px;
            color: #333;
        }

        .order-number {
            color: #777;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .row:last-child {
            border-bottom: none;
        }

        .label {
            color: #777;
            font-size: 14px;
        }

        .value {
            color: #333;
            font-size: 14px;
            font-weight: 600;
            text-align: right;
        }

        .total {
            margin-top: 10px;
            padding-top: 15px;
            border-top: 2px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total span:first-child {
            font-size: 15px;
            font-weight: bold;
        }

        .total-price {
            font-size: 20px;
            font-weight: bold;
            color: #A67C74;
        }

        .payment-option {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 10px;
        }

        .payment-option label {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .payment-option input {
            accent-color: #A67C74;
        }

        .button {
            display: block;
            width: 100%;
            box-sizing: border-box;
            border: none;
            background: #A67C74;
            color: white;
            padding: 13px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            margin-top: 20px;
        }

        .button:hover {
            opacity: 0.9;
        }

        .note {
            background: #fff8f5;
            border: 1px solid #f0ded9;
            color: #765f58;
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            line-height: 1.5;
            margin-top: 15px;
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

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .card {
                padding: 20px;
            }

            .row {
                flex-direction: column;
                gap: 5px;
            }

            .value {
                text-align: left;
            }

            .total {
                gap: 10px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <a href="/akun/pesanan" class="back">
        ← Kembali ke Pesanan
    </a>

    <div class="header">
        <h1>Pembayaran</h1>
        <p>Selesaikan pembayaran pesanan kamu di Relovié.</p>
    </div>

    <div class="card">

        <h2>Detail Pesanan</h2>

        <div class="order-number">
            Pesanan #<?= esc($order['id']) ?>
        </div>

        <div class="row">
            <div class="label">
                Produk
            </div>

            <div class="value">
                Produk #<?= esc($order['product_id']) ?>
            </div>
        </div>

        <div class="row">
            <div class="label">
                Jumlah
            </div>

            <div class="value">
                <?= esc($order['quantity']) ?> barang
            </div>
        </div>

        <div class="row">
            <div class="label">
                Total pembayaran
            </div>

            <div class="value">
                Rp <?= number_format(
                    (float) $order['price'],
                    0,
                    ',',
                    '.'
                ) ?>
            </div>
        </div>

        <div class="total">
            <span>Total</span>

            <span class="total-price">
                Rp <?= number_format(
                    (float) $order['price'],
                    0,
                    ',',
                    '.'
                ) ?>
            </span>
        </div>

    </div>

    <?php
    $paymentMethod = $order['payment_method'] ?? 'transfer';

    $paymentLabels = [
        'qris'     => 'QRIS Relovié',
        'transfer' => 'Transfer Bank',
        'ewallet'  => 'E-Wallet',
        'card'     => 'Kartu Debit / Kredit',
    ];

    $paymentLabel = $paymentLabels[$paymentMethod] ?? 'Transfer Bank';
?>

<div class="card">

    <h2>Metode Pembayaran</h2>

    <div class="payment-option" style="
        background:#FDF6F3;
        border-color:#A67C74;
    ">
        <div style="
            display:flex;
            align-items:center;
            gap:12px;
        ">

            <div style="
                width:42px;
                height:42px;
                border-radius:10px;
                background:#F2EAE7;
                display:flex;
                align-items:center;
                justify-content:center;
                font-size:20px;
            ">
                <?php
                    if ($paymentMethod === 'qris') {
                        echo '📱';
                    } elseif ($paymentMethod === 'transfer') {
                        echo '🏦';
                    } elseif ($paymentMethod === 'ewallet') {
                        echo '💰';
                    } elseif ($paymentMethod === 'card') {
                        echo '💳';
                    } else {
                        echo '💳';
                    }
                ?>
            </div>

            <div>
                <div style="
                    font-size:14px;
                    font-weight:600;
                    color:#333;
                ">
                    <?= esc($paymentLabel) ?>
                </div>

                <div style="
                    font-size:12px;
                    color:#777;
                    margin-top:4px;
                ">
                    Metode pembayaran yang dipilih saat checkout
                </div>
            </div>

        </div>
    </div>


    <?php if ($paymentMethod === 'qris'): ?>

        <div class="note" style="text-align:center;">

            <div style="
                font-size:16px;
                font-weight:600;
                color:#333;
            ">
                QRIS Relovié
            </div>

            <div style="
                font-size:12px;
                color:#777;
                margin-top:5px;
            ">
                Scan QR berikut untuk melakukan pembayaran
            </div>

            <img
    src="/assets/qris_relovie.jpg"
    alt="QRIS Relovié"
    class="qris-image"
    >



        </div>


    <?php elseif ($paymentMethod === 'transfer'): ?>

        <div class="note">

            <strong>Informasi Transfer</strong>

            <div style="
                margin-top:12px;
                padding:14px;
                background:white;
                border-radius:8px;
                line-height:1.7;
            ">
                <strong>Bank Relovié (Demo)</strong><br>
                No. Rekening: 1234 5678 9000<br>
                Atas Nama: Relovié
            </div>

        </div>


    <?php elseif ($paymentMethod === 'ewallet'): ?>

        <div class="note">

            <strong>E-Wallet</strong>

            <p style="margin:8px 0 12px;">
                Pembayaran tersedia melalui:
            </p>

            <div style="
                display:flex;
                flex-wrap:wrap;
                gap:8px;
            ">

                <span style="
                    background:#A67C74;
                    color:white;
                    padding:7px 12px;
                    border-radius:20px;
                    font-size:11px;
                    font-weight:600;
                ">
                    DANA
                </span>

                <span style="
                    background:#A67C74;
                    color:white;
                    padding:7px 12px;
                    border-radius:20px;
                    font-size:11px;
                    font-weight:600;
                ">
                    GoPay
                </span>

                <span style="
                    background:#A67C74;
                    color:white;
                    padding:7px 12px;
                    border-radius:20px;
                    font-size:11px;
                    font-weight:600;
                ">
                    OVO
                </span>

                <span style="
                    background:#A67C74;
                    color:white;
                    padding:7px 12px;
                    border-radius:20px;
                    font-size:11px;
                    font-weight:600;
                ">
                    ShopeePay
                </span>

            </div>

        </div>


    <?php elseif ($paymentMethod === 'card'): ?>

        <div class="note">

            <strong>Kartu Debit / Kredit</strong>

            <p style="margin-bottom:0;">
                Kartu yang telah tersimpan pada akun akan digunakan
                untuk proses pembayaran.
            </p>

        </div>

    <?php endif; ?>


    <form
    action="/akun/pesanan/bayar/<?= $order['id'] ?>"
    method="post"
    onsubmit="return confirmPembayaran();"
>

    <?= csrf_field() ?>

    <label style="
        display:flex;
        align-items:flex-start;
        gap:10px;
        margin-top:18px;
        padding:14px;
        background:#FFFDFB;
        border:1px solid #E6D5D0;
        border-radius:10px;
        cursor:pointer;
        font-size:13px;
        color:#5C4841;
        line-height:1.5;
    ">

        <input
            type="checkbox"
            id="sudah_bayar"
            required
            style="
                margin-top:3px;
                accent-color:#A67C74;
                width:17px;
                height:17px;
            "
        >

        <span>
            Saya sudah melakukan pembayaran sesuai
            metode pembayaran yang dipilih.
        </span>

    </label>

    <button type="submit" class="button">
        Konfirmasi Pembayaran
    </button>

</form>

</div>

</div>

<script>
function confirmPembayaran() {
    const checkbox = document.getElementById('sudah_bayar');

    if (!checkbox.checked) {
        alert('Silakan centang konfirmasi pembayaran terlebih dahulu.');
        return false;
    }

    return confirm(
        'Apakah kamu yakin sudah melakukan pembayaran?'
    );
}
</script>
</body>
</html>