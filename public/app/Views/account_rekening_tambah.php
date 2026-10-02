<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Rekening Bank - Relovié</title>

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
            max-width: 700px;
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
            margin-right: 18px;
        }

        .header-title {
            font-size: 22px;
            font-weight: 600;
        }

        .content {
            padding: 25px 20px 50px;
        }

        .card {
            background: #fff;
            border: 1px solid #e5e1df;
            border-radius: 14px;
            padding: 24px;
        }

        .field {
            margin-bottom: 20px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        .field input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d8d3d0;
            border-radius: 9px;
            font-size: 15px;
            outline: none;
        }

        .field input:focus {
            border-color: #80665d;
        }

        .button {
            width: 100%;
            border: none;
            background: #80665d;
            color: #fff;
            padding: 14px;
            border-radius: 9px;
            font-size: 16px;
            cursor: pointer;
        }

        .button:hover {
            background: #6f574f;
        }

        .info {
            color: #888;
            font-size: 13px;
            line-height: 1.5;
            margin-bottom: 22px;
        }
    </style>
</head>

<body>

<div class="page">

    <div class="header">

        <a href="/akun/pengaturan/rekening" class="back">
            ‹
        </a>

        <div class="header-title">
            Tambah Rekening Bank
        </div>

    </div>


    <div class="content">

        <div class="card">

    <p class="info">
        Masukkan informasi rekening bank yang akan
        digunakan untuk menerima pembayaran di Relovié.
    </p>

    <?php if (session()->getFlashdata('error')): ?>

        <div style="
            background:#fff1f1;
            color:#c0392b;
            padding:12px;
            border-radius:8px;
            margin-bottom:18px;
        ">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('errors')): ?>

        <div style="
            background:#fff1f1;
            color:#c0392b;
            padding:12px;
            border-radius:8px;
            margin-bottom:18px;
        ">

            <?php foreach (session()->getFlashdata('errors') as $error): ?>

                <div>
                    <?= esc($error) ?>
                </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>


    <form
        action="/akun/pengaturan/rekening/simpan"
        method="post"
    >

        <?= csrf_field() ?>


        <div class="field">

            <label for="bank_name">
                Nama Bank
            </label>

            <input
                type="text"
                id="bank_name"
                name="bank_name"
                value="<?= old('bank_name') ?>"
                placeholder="Contoh: BRI"
                required
            >

        </div>


        <div class="field">

            <label for="account_name">
                Nama Pemilik Rekening
            </label>

            <input
                type="text"
                id="account_name"
                name="account_name"
                value="<?= old('account_name') ?>"
                placeholder="Nama sesuai rekening"
                required
            >

        </div>


        <div class="field">

            <label for="account_number">
                Nomor Rekening
            </label>

            <input
                type="text"
                id="account_number"
                name="account_number"
                value="<?= old('account_number') ?>"
                placeholder="Masukkan nomor rekening"
                required
            >

        </div>


        <button
            type="submit"
            class="button"
        >
            Simpan Rekening
        </button>

    </form>

</div>

</body>
</html>