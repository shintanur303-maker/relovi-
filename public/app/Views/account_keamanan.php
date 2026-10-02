<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Akun & Keamanan - Relovié</title>

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
    }

    /* SECTION */
    .section {
        margin-top: 18px;
    }

    .section-title {
        font-size: 13px;
        color: #8A7168;
        margin: 0 0 8px 8px;
    }

    .card {
        background: #FFFDFB;
        border: 1px solid #F0DED9;
        border-radius: 12px;
        overflow: hidden;
    }

    /* INFO */
    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 17px 18px;
        border-bottom: 1px solid #F0DED9;
        font-size: 14px;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-label {
        color: #6E5A53;
    }

    .info-value {
        color: #8A7168;
        text-align: right;
        max-width: 55%;
        word-break: break-word;
    }

    /* FORM */
    .form-box {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        font-size: 13px;
        color: #6E5A53;
    }

    .form-group input {
        width: 100%;
        padding: 12px 13px;
        border: 1px solid #E2CCC6;
        border-radius: 8px;
        background: #FFFFFF;
        font-size: 14px;
        color: #4A3B36;
        outline: none;
    }

    .form-group input:focus {
        border-color: #A67C74;
    }

    .hint {
        font-size: 12px;
        color: #9A8780;
        margin-top: 5px;
    }

    .btn {
        width: 100%;
        border: none;
        border-radius: 8px;
        padding: 13px;
        background: #A67C74;
        color: white;
        font-size: 14px;
        cursor: pointer;
    }

    .btn:hover {
        background: #8F6860;
    }

    /* DANGER */
    .danger-card {
        background: #FFFDFB;
        border: 1px solid #E8C7C1;
        border-radius: 12px;
        padding: 20px;
    }

    .danger-title {
        font-size: 15px;
        font-weight: 600;
        color: #A33A32;
        margin-bottom: 7px;
    }

    .danger-text {
        font-size: 13px;
        line-height: 1.6;
        color: #7A625C;
        margin-bottom: 16px;
    }

    .danger-link {
        display: inline-block;
        color: #B03A32;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    /* ALERT */
    .alert {
        padding: 12px 14px;
        border-radius: 8px;
        margin-bottom: 15px;
        font-size: 13px;
    }

    .alert-success {
        background: #EAF6ED;
        color: #317342;
        border: 1px solid #CDE8D3;
    }

    .alert-error {
        background: #FCECEC;
        color: #A33A32;
        border: 1px solid #F0CACA;
    }

    @media (max-width: 600px) {
        .wrap {
            padding-left: 16px;
            padding-right: 16px;
        }

        .title {
            font-size: 20px;
        }

        .info-item {
            gap: 15px;
        }
    }
</style>
</head>

<body>

<div class="wrap">

    <!-- HEADER -->
    <div class="header">
        <a href="/akun/pengaturan" class="back">&larr;</a>
        <div class="title">Akun &amp; Keamanan</div>
    </div>


    <!-- PESAN -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>


    <!-- INFORMASI AKUN -->
    <div class="section">

        <div class="section-title">
            Informasi Akun
        </div>

        <div class="card">

            <div class="info-item">
                <span class="info-label">Nama</span>
                <span class="info-value">
                    <?= esc(session()->get('user_name')) ?>
                </span>
            </div>

            <div class="info-item">
                <span class="info-label">Email</span>
                <span class="info-value">
                    <?= esc($user['email'] ?? '-') ?>
                </span>
            </div>

            <div class="info-item">
                <span class="info-label">No. Handphone</span>
                <span class="info-value">
                    <?= esc($user['phone'] ?? '-') ?>
                </span>
            </div>

        </div>

    </div>


    <!-- GANTI PASSWORD -->
    <div class="section">

        <div class="section-title">
            Keamanan
        </div>

        <div class="card">

            <div class="form-box">

                <form action="/akun/pengaturan/keamanan" method="post">

                    <div class="form-group">
                        <label for="password_lama">
                            Password Lama
                        </label>

                        <input
                            type="password"
                            id="password_lama"
                            name="password_lama"
                            placeholder="Masukkan password lama"
                            required
                        >
                    </div>


                    <div class="form-group">
                        <label for="password_baru">
                            Password Baru
                        </label>

                        <input
                            type="password"
                            id="password_baru"
                            name="password_baru"
                            placeholder="Minimal 6 karakter"
                            required
                        >

                        <div class="hint">
                            Gunakan password yang sulit ditebak.
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="konfirmasi_password">
                            Konfirmasi Password Baru
                        </label>

                        <input
                            type="password"
                            id="konfirmasi_password"
                            name="konfirmasi_password"
                            placeholder="Masukkan kembali password baru"
                            required
                        >
                    </div>


                    <button type="submit" class="btn">
                        Simpan Password
                    </button>

                </form>

            </div>

        </div>

    </div>


    <!-- HAPUS AKUN -->
    <div class="section">

        <div class="section-title">
            Zona Berbahaya
        </div>

        <div class="danger-card">

            <div class="danger-title">
                Hapus Akun
            </div>

            <div class="danger-text">
                Menghapus akun akan menghapus akses kamu ke akun Relovié.
                Pastikan kamu sudah yakin sebelum melanjutkan.
            </div>

            <a href="/akun/pengaturan/hapus-akun" class="danger-link">
                Hapus Akun
            </a>

        </div>

    </div>

</div>

</body>
</html>