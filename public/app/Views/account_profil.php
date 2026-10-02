<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ubah Profil - Relovié</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #F5F6F8;
            color: #2B2B2B;
        }

        .header {
            background: #FFFFFF;
            height: 72px;
            display: flex;
            align-items: center;
            position: relative;
            border-bottom: 1px solid #EEEEEE;
        }

        .back {
            position: absolute;
            left: 24px;
            color: #A67C74;
            text-decoration: none;
            font-size: 30px;
            line-height: 1;
        }

        .title {
            width: 100%;
            text-align: center;
            font-size: 24px;
            font-weight: 500;
        }

        .wrap {
            max-width: 800px;
            margin: 0 auto;
            padding: 18px 16px 50px;
        }

        .card {
            background: #FFFFFF;
            border-radius: 14px;
            margin-bottom: 16px;
            overflow: hidden;
        }

        /* FOTO PROFIL */

        .profile-photo-section {
            text-align: center;
            padding: 30px 20px 25px;
        }

        .profile-photo {
            width: 105px;
            height: 105px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid #DDDDDD;
            background: #EEEEEE;
        }

        .photo-placeholder {
            width: 105px;
            height: 105px;
            border-radius: 50%;
            background: #E8E8E8;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #999999;
            font-size: 40px;
        }

        .change-photo {
            display: block;
            margin-top: 12px;
            color: #555555;
            font-size: 16px;
            text-decoration: none;
            cursor: pointer;
        }

        .change-photo:hover {
            color: #A67C74;
        }

        /* BARIS PROFIL */

        .profile-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 72px;
            padding: 0 24px;
            border-bottom: 1px solid #EEEEEE;
            gap: 20px;
        }

        .profile-row:last-child {
            border-bottom: none;
        }

        .row-label {
            font-size: 16px;
            color: #333333;
            flex-shrink: 0;
        }

        .row-value {
            flex: 1;
            text-align: right;
            color: #555555;
            font-size: 15px;
            word-break: break-word;
        }

        /* FORM */

        .form-section {
            padding: 24px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: 600;
            color: #555555;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #DDDDDD;
            border-radius: 8px;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333333;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #A67C74;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        .save-button {
            width: 100%;
            border: none;
            background: #A67C74;
            color: #FFFFFF;
            padding: 14px;
            border-radius: 9px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
        }

        .save-button:hover {
            background: #8F6860;
        }

        .success {
            background: #EAF7EE;
            color: #247A42;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .error {
            background: #FDECEC;
            color: #B42318;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .address-box {
            line-height: 1.6;
            color: #666666;
        }

        @media (max-width: 600px) {

            .header {
                height: 64px;
            }

            .back {
                left: 18px;
                font-size: 28px;
            }

            .title {
                font-size: 21px;
            }

            .profile-row {
                padding: 0 20px;
            }

            .row-label {
                font-size: 15px;
            }

            .row-value {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

<div class="header">

    <a href="/akun" class="back">
        &larr;
    </a>

    <div class="title">
        Ubah Profil
    </div>

</div>


<div class="wrap">

    <?php if (session()->getFlashdata('success')): ?>

        <div class="success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <!-- FOTO PROFIL -->

    <div class="card">

        <div class="profile-photo-section">

            <?php if (! empty($user['avatar'])): ?>

                <img
                    src="/uploads/avatars/<?= esc($user['avatar']) ?>"
                    class="profile-photo"
                    alt="Foto Profil"
                >

            <?php else: ?>

                <div class="photo-placeholder">
                    👤
                </div>

            <?php endif; ?>

            <label
                for="avatar"
                class="change-photo"
            >
                ✎ Ubah
            </label>

        </div>

    </div>


    <!-- FORM PROFIL -->

    <form
        action="/akun/profil"
        method="post"
        enctype="multipart/form-data"
    >

        <?= csrf_field() ?>


        <div class="card">

            <div class="form-section">

                <div class="form-group">

                    <label class="form-label">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="<?= esc($user['name'] ?? '') ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Bio
                    </label>

                    <textarea
                        name="shop_bio"
                        placeholder="Tulis bio singkat kamu..."
                    ><?= esc($user['shop_bio'] ?? '') ?></textarea>

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Jenis Kelamin
                    </label>

                    <select name="gender">

                        <option value="">
                            Pilih jenis kelamin
                        </option>

                        <option
                            value="Laki-laki"
                            <?= ($user['gender'] ?? '') === 'Laki-laki' ? 'selected' : '' ?>
                        >
                            Laki-laki
                        </option>

                        <option
                            value="Perempuan"
                            <?= ($user['gender'] ?? '') === 'Perempuan' ? 'selected' : '' ?>
                        >
                            Perempuan
                        </option>

                    </select>

                </div>


                <div class="form-group">

                    <label class="form-label">
                        No. Handphone
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="<?= esc($user['phone'] ?? '') ?>"
                        placeholder="Masukkan nomor handphone"
                    >

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="<?= esc($user['email'] ?? '') ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Alamat
                    </label>

                    <textarea
                        name="address"
                        placeholder="Masukkan alamat lengkap kamu..."
                    ><?= esc($user['address'] ?? '') ?></textarea>

                </div>


                <!-- INPUT FOTO -->

                <div class="form-group">

                    <label class="form-label">
                        Foto Profil
                    </label>

                    <input
                        type="file"
                        id="avatar"
                        name="avatar"
                        accept="image/jpeg,image/png,image/webp"
                    >

                </div>


                <button
                    type="submit"
                    class="save-button"
                >
                    Simpan Perubahan
                </button>

            </div>

        </div>

    </form>

</div>

</body>
</html>