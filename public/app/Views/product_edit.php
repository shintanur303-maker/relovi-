<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Produk - Relovié</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #F8F3F0;
            color: #4F403A;
        }

        .wrap {
            max-width: 900px;
            margin: 0 auto;
            padding: 30px 20px 60px;
        }

        .card {
            background: #FFFDFB;
            border: 1px solid #E6D5D0;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.04);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 6px;
            font-size: 26px;
            color: #5C4841;
        }

        .subtitle {
            margin-bottom: 25px;
            color: #8A7168;
            font-size: 13px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 600;
            color: #5C4841;
        }

        input,
        select,
        textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 11px 12px;
            border: 1px solid #DCC9C3;
            border-radius: 9px;
            background: #FFFFFF;
            color: #4F403A;
            font-size: 13px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #A67C74;
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .current-photo {
            margin-top: 10px;
        }

        .current-photo img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #E6D5D0;
        }

        .photo-note {
            margin-top: 7px;
            color: #9A8780;
            font-size: 11px;
        }

        .button-row {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .button {
            display: inline-block;
            border: none;
            padding: 12px 18px;
            border-radius: 9px;
            background: #A67C74;
            color: white;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        .button:hover {
            background: #916A61;
        }

        .button-secondary {
            background: #F2EAE7;
            color: #765F58;
        }

        .button-secondary:hover {
            background: #E9DEDA;
        }

        .alert {
            margin-bottom: 18px;
            padding: 12px 14px;
            border-radius: 9px;
            font-size: 13px;
        }

        .alert-error {
            background: #FBEAEA;
            color: #A74D4D;
            border: 1px solid #E9C8C8;
        }

        @media (max-width: 700px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .button-row {
                flex-direction: column;
            }

            .button {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="wrap">

    <div class="card">

        <h1>Edit Produk</h1>

        <div class="subtitle">
            Ubah informasi barang kamu lalu simpan perubahan.
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-error">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <form
            action="/produk/update/<?= $p['id'] ?>"
            method="post"
            enctype="multipart/form-data"
        >

            <?= csrf_field() ?>

            <div class="form-group">
                <label for="name">Nama Barang</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="<?= esc($p['name'] ?? '') ?>"
                    required
                >
            </div>

            <div class="grid">

                <div class="form-group">
                    <label for="price">Harga</label>

                    <input
                        type="number"
                        id="price"
                        name="price"
                        value="<?= esc($p['price'] ?? '') ?>"
                        min="0"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="category">Kategori</label>

                    <select
                        id="category"
                        name="category"
                        required
                    >
                        <option value="">Pilih kategori</option>

                        <?php
                        $categories = [
                            'Atasan',
                            'Bawahan',
                            'Outerwear',
                            'Sepatu',
                            'Tas',
                            'Elektronik',
                            'Aksesoris',
                        ];
                        ?>

                        <?php foreach ($categories as $category): ?>

                            <option
                                value="<?= esc($category) ?>"
                                <?= ($p['category'] ?? '') === $category ? 'selected' : '' ?>
                            >
                                <?= esc($category) ?>
                            </option>

                        <?php endforeach; ?>

                    </select>
                </div>

            </div>

            <div class="grid">

                <div class="form-group">
                    <label for="location">Lokasi</label>

                    <input
                        type="text"
                        id="location"
                        name="location"
                        value="<?= esc($p['location'] ?? '') ?>"
                    >
                </div>

                <div class="form-group">
                    <label for="size">Ukuran</label>

                    <select
                        id="size"
                        name="size"
                    >
                        <option value="">Pilih ukuran</option>

                        <?php
                        $sizes = [
                            'S',
                            'M',
                            'L',
                            'XL',
                            'All Size',
                        ];
                        ?>

                        <?php foreach ($sizes as $size): ?>

                            <option
                                value="<?= esc($size) ?>"
                                <?= ($p['size'] ?? '') === $size ? 'selected' : '' ?>
                            >
                                <?= esc($size) ?>
                            </option>

                        <?php endforeach; ?>

                    </select>
                </div>

            </div>

            <div class="grid">

                <div class="form-group">

                    <label for="payment_method">
                        Metode Pembayaran yang Diterima
                    </label>

                    <select
                        id="payment_method"
                        name="payment_method"
                    >
                        <option value="">Pilih metode pembayaran</option>

                        <?php
                        $paymentMethods = [
                            'Transfer',
                            'COD',
                            'Cicilan',
                        ];
                        ?>

                        <?php foreach ($paymentMethods as $method): ?>

                            <option
                                value="<?= esc($method) ?>"
                                <?= ($p['payment_method'] ?? '') === $method ? 'selected' : '' ?>
                            >
                                <?= esc($method) ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="form-group">

                    <label for="shipping_option">
                        Pilihan Pengiriman
                    </label>

                    <select
                        id="shipping_option"
                        name="shipping_option"
                    >
                        <option value="">Pilih pengiriman</option>

                        <?php
                        $shippingOptions = [
                            'Reguler',
                            'Instant',
                            'Same Day',
                            'Hemat Kargo',
                        ];
                        ?>

                        <?php foreach ($shippingOptions as $shipping): ?>

                            <option
                                value="<?= esc($shipping) ?>"
                                <?= ($p['shipping_option'] ?? '') === $shipping ? 'selected' : '' ?>
                            >
                                <?= esc($shipping) ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

            </div>

            <div class="form-group">

                <label for="condition">
                    Kondisi Barang
                </label>

                <select
                    id="condition"
                    name="condition"
                    required
                >

                    <option value="">Pilih kondisi</option>

                    <?php
                    $conditions = [
                        'Like New',
                        'Good',
                        'Fair',
                    ];
                    ?>

                    <?php foreach ($conditions as $condition): ?>

                        <option
                            value="<?= esc($condition) ?>"
                            <?= ($p['condition'] ?? '') === $condition ? 'selected' : '' ?>
                        >
                            <?= esc($condition) ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <div class="form-group">

                <label for="description">
                    Deskripsi Barang
                </label>

                <textarea
                    id="description"
                    name="description"
                    required
                ><?= esc($p['description'] ?? '') ?></textarea>

            </div>

            <div class="form-group">

                <label for="photo">
                    Foto Barang
                </label>

                <input
                    type="file"
                    id="photo"
                    name="photo"
                    accept="image/*"
                >

                <?php if (! empty($p['photo'])): ?>

                    <div class="current-photo">

                        <img
                            src="/uploads/products/<?= esc($p['photo']) ?>"
                            alt="Foto produk"
                        >

                        <div class="photo-note">
                            Foto saat ini. Pilih foto baru jika ingin menggantinya.
                        </div>

                    </div>

                <?php endif; ?>

            </div>

            <div class="button-row">

                <button
                    type="submit"
                    class="button"
                >
                    Simpan Perubahan
                </button>

                <a
                    href="/produk/<?= $p['id'] ?>"
                    class="button button-secondary"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>