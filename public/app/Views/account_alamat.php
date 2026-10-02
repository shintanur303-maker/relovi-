<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Alamat Saya - Relovié</title>

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

    .section-title {
        font-size: 13px;
        color: #8A7168;
        margin: 18px 0 8px 8px;
    }

    .card {
        background: #FFFDFB;
        border: 1px solid #F0DED9;
        border-radius: 12px;
        padding: 20px;
    }

    .empty {
        text-align: center;
        padding: 30px 15px;
        color: #8A7168;
        font-size: 14px;
    }

    .empty-icon {
        font-size: 38px;
        margin-bottom: 10px;
    }

    .add-button {
        display: block;
        width: 100%;
        text-align: center;
        text-decoration: none;
        background: #A67C74;
        color: white;
        padding: 13px;
        border-radius: 8px;
        margin-top: 15px;
        font-size: 14px;
    }

    .add-button:hover {
        background: #8F6860;
    }

    .badge {
    background: #A67C74;
    color: white;
    font-size: 11px;
    padding: 4px 8px;
    border-radius: 10px;
}
</style>
</head>

<body>

<div class="wrap">

    <div class="header">
        <a href="/akun/pengaturan" class="back">&larr;</a>
        <div class="title">Alamat Saya</div>
    </div>

    <div class="section-title">Daftar Alamat</div>

<?php if (! empty($addresses)): ?>

    <?php foreach ($addresses as $address): ?>

        <div class="card" style="margin-bottom: 15px;">

            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">

                <div style="font-size:15px; font-weight:600;">
                    <?= esc($address['label']) ?>
                </div>

                <?php if ($address['is_primary']): ?>
                    <span class="badge">Utama</span>
                <?php endif; ?>

            </div>

            <div style="font-size:14px; font-weight:600; margin-bottom:5px;">
                <?= esc($address['recipient_name']) ?>
            </div>

            <div style="font-size:13px; color:#8A7168; margin-bottom:8px;">
                <?= esc($address['phone']) ?>
            </div>

            <div style="font-size:13px; color:#5C4841; line-height:1.6;">
                <?= esc($address['full_address']) ?>
            </div>

            <div style="font-size:13px; color:#8A7168; margin-top:5px;">
    <?= esc($address['village']) ?>,
    <?= esc($address['district']) ?>,
    <?= esc($address['city']) ?>,
    <?= esc($address['province']) ?>
    <?= ! empty($address['postal_code']) ? ' ' . esc($address['postal_code']) : '' ?>
</div>

<?php if (! empty($address['latitude']) && ! empty($address['longitude'])): ?>

    <a
        href="https://www.openstreetmap.org/?mlat=<?= esc($address['latitude']) ?>&mlon=<?= esc($address['longitude']) ?>#map=17/<?= esc($address['latitude']) ?>/<?= esc($address['longitude']) ?>"
        target="_blank"
        style="
            display:inline-block;
            margin-top:12px;
            color:#A67C74;
            font-size:13px;
            text-decoration:none;
            font-weight:600;
        "
    >
        📍 Lihat Lokasi di Peta
    </a>

<?php endif; ?>

<?php if ($address['is_primary']): ?>

    <div style="margin-top:12px; font-size:12px; color:#A67C74; font-weight:600;">
        ✓ Alamat Utama
    </div>

<?php else: ?>

    <a
        href="/akun/pengaturan/alamat/utama/<?= $address['id'] ?>"
        style="
            display:inline-block;
            margin-top:12px;
            color:#A67C74;
            font-size:13px;
            text-decoration:none;
        "
    >
        Jadikan Alamat Utama
    </a>

<?php endif; ?>

</div>

    <?php endforeach; ?>

<?php else: ?>

    <div class="card">

        <div class="empty">
            <div class="empty-icon">📍</div>

            <div>
                Belum ada alamat yang tersimpan.
            </div>

        </div>

    </div>

<?php endif; ?>

<a href="/akun/pengaturan/alamat/tambah" class="add-button">
    + Tambah Alamat
</a>

        </div>

    </div>

</div>

</body>
</html>