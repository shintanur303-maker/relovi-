<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Kartu - Relovié</title>

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

        .security-note {
            background: #ffffff;
            border: 1px solid #e6e2df;
            border-radius: 14px;
            padding: 18px 20px;
            margin-bottom: 20px;
            color: #666;
            font-size: 14px;
            line-height: 1.6;
        }

        .security-title {
            color: #80665d;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .card {
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid #e6e2df;
            padding: 22px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d8d3d0;
            border-radius: 9px;
            font-size: 15px;
            outline: none;
            background: #ffffff;
        }

        input:focus {
            border-color: #80665d;
        }

        .form-row {
            display: flex;
            gap: 14px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .agreement {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            margin: 8px 0 24px;
            font-size: 13px;
            color: #666;
            line-height: 1.5;
        }

        .agreement input {
            width: auto;
            margin-top: 3px;
        }

        .save-button {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 14px;
            background: #80665d;
            color: #ffffff;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
        }

        .save-button:hover {
            opacity: 0.9;
        }

        .note {
            margin-top: 14px;
            color: #999;
            font-size: 12px;
            line-height: 1.5;
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

            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <!-- HEADER -->
    <div class="header">

        <a href="/akun/pengaturan/rekening" class="back">
            ‹
        </a>

        <div class="header-title">
            Tambah Kartu
        </div>

    </div>


    <div class="content">

        <!-- INFORMASI KEAMANAN -->
        <div class="security-note">

            <div class="security-title">
                🔒 Informasi Kartu
            </div>

            Informasi kartu digunakan untuk membantu proses pembayaran
            di Relovié. Jangan membagikan informasi kartu kepada orang lain.

        </div>


        <!-- FORM -->
        <div class="card">

            <form action="/akun/pengaturan/kartu/simpan" method="post">

                <?= csrf_field() ?>

                <div class="form-group">

                    <label for="card_number">
                        Nomor Kartu
                    </label>

                    <input
                        type="text"
                        id="card_number"
                        name="card_number"
                        placeholder="Masukkan nomor kartu"
                        maxlength="19"
                        inputmode="numeric"
                        required
                    >

                </div>


                <div class="form-row">

                    <div class="form-group">

                        <label for="expiry">
                            Tanggal Kedaluwarsa
                        </label>

                        <input
                            type="text"
                            id="expiry"
                            name="expiry"
                            placeholder="BB/TT"
                            maxlength="5"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="cvv">
                            CVV
                        </label>

                        <input
                            type="password"
                            id="cvv"
                            name="cvv"
                            placeholder="CVV"
                            maxlength="4"
                            inputmode="numeric"
                            required
                        >

                    </div>

                </div>


                <div class="form-group">

                    <label for="card_name">
                        Nama di Kartu
                    </label>

                    <input
                        type="text"
                        id="card_name"
                        name="card_name"
                        placeholder="Masukkan nama sesuai kartu"
                        required
                    >

                </div>


                <label class="agreement">

                    <input
                        type="checkbox"
                        required
                    >

                    <span>
                        Saya menyetujui syarat dan ketentuan
                        penggunaan kartu di Relovié.
                    </span>

                </label>


                <button
                    type="submit"
                    class="save-button"
                >
                    Simpan Kartu
                </button>


                <div class="note">
                    Demi keamanan, CVV tidak akan disimpan oleh Relovié.
                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>