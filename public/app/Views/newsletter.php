<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Langganan Relovié</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,700&family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    :root{
        --navy:#394e7a;
        --denim:#413924;
        --cream:#c9f1e9;
        --sky:#def2f8;
        --amber:#b99659;
        --ink:#3A2A20;
        --line:#5f0c2c;
    }

    *{
        box-sizing:border-box;
        margin:0;
        padding:0;
    }

    body{
        font-family:'Work Sans', sans-serif;
        background:var(--sky);
        color:var(--ink);
        line-height:1.6;
    }

    a{
        text-decoration:none;
        color:inherit;
    }

    .page{
        max-width:900px;
        margin:0 auto;
        padding:40px 20px 70px;
    }

    .back{
        display:inline-block;
        color:var(--navy);
        font-size:14px;
        margin-bottom:24px;
    }

    .header-card{
        background:var(--cream);
        border:1px solid var(--line);
        border-radius:18px;
        padding:35px;
        text-align:center;
    }

    .header-icon{
        font-size:42px;
    }

    h1,h2,h3{
        font-family:'Fraunces', serif;
        color:var(--navy);
    }

    h1{
        font-size:32px;
        margin-top:10px;
    }

    .header-card p{
        margin-top:10px;
        color:#3D4C5C;
        font-size:14px;
    }

    .status{
        margin-top:22px;
        display:inline-flex;
        align-items:center;
        gap:8px;
        padding:8px 15px;
        border-radius:30px;
        background:#e5f6e9;
        color:#28733b;
        font-size:13px;
        font-weight:600;
    }

    .content{
        margin-top:20px;
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:20px;
    }

    .card{
        background:#fff;
        border:1px solid rgba(95,12,44,.25);
        border-radius:15px;
        padding:25px;
    }

    .card h2{
        font-size:20px;
        margin-bottom:16px;
    }

    .info-row{
        padding:12px 0;
        border-bottom:1px solid #eee;
        font-size:13px;
    }

    .info-row:last-child{
        border-bottom:none;
    }

    .info-label{
        color:#7b7b7b;
        font-size:12px;
    }

    .info-value{
        margin-top:3px;
        font-weight:600;
    }

    .benefit{
        display:flex;
        gap:12px;
        padding:10px 0;
        font-size:13px;
    }

    .benefit-icon{
        font-size:19px;
    }

    .preference{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:15px;
        padding:13px 0;
        border-bottom:1px solid #eee;
        font-size:13px;
    }

    .preference:last-child{
        border-bottom:none;
    }

    .switch{
        position:relative;
        width:44px;
        height:24px;
        flex-shrink:0;
    }

    .switch input{
        opacity:0;
        width:0;
        height:0;
    }

    .slider{
        position:absolute;
        inset:0;
        cursor:pointer;
        background:#ccc;
        border-radius:30px;
        transition:.2s;
    }

    .slider:before{
        content:"";
        position:absolute;
        width:18px;
        height:18px;
        left:3px;
        top:3px;
        background:white;
        border-radius:50%;
        transition:.2s;
    }

    .switch input:checked + .slider{
        background:var(--navy);
    }

    .switch input:checked + .slider:before{
        transform:translateX(20px);
    }

    .full{
        grid-column:1 / -1;
    }

    .newsletter-item{
        padding:15px 0;
        border-bottom:1px solid #eee;
    }

    .newsletter-item:last-child{
        border-bottom:none;
    }

    .newsletter-item h3{
        font-size:16px;
    }

    .newsletter-item p{
        font-size:13px;
        color:#667;
        margin-top:4px;
    }

    .btn{
        display:inline-block;
        border:none;
        cursor:pointer;
        border-radius:7px;
        padding:11px 18px;
        font-family:inherit;
        font-size:13px;
        font-weight:600;
    }

    .btn-primary{
        background:var(--amber);
        color:var(--navy);
    }

    .btn-danger{
        background:#f9e4e4;
        color:#a33b3b;
    }

    .actions{
        margin-top:20px;
        display:flex;
        gap:10px;
        flex-wrap:wrap;
    }

    .alert{
        margin-bottom:18px;
        padding:13px 16px;
        border-radius:9px;
        font-size:13px;
    }

    .alert-success{
        background:#e6f6ea;
        color:#28733b;
    }

    .alert-error{
        background:#fbeaea;
        color:#a33b3b;
    }

    .empty{
        text-align:center;
        padding:30px 10px;
    }

    .empty-icon{
        font-size:40px;
    }

    .empty p{
        margin:10px 0 20px;
        color:#667;
        font-size:13px;
    }

    @media(max-width:700px){
        .content{
            grid-template-columns:1fr;
        }

        .full{
            grid-column:auto;
        }

        h1{
            font-size:27px;
        }

        .header-card{
            padding:27px 20px;
        }
    }
</style>
</head>

<body>

<div class="page">

    <a href="/" class="back">← Kembali ke Relovié</a>

    <?php if (session()->getFlashdata('newsletter_success')): ?>
        <div class="alert alert-success">
            ✓ <?= esc(session()->getFlashdata('newsletter_success')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('newsletter_error')): ?>
        <div class="alert alert-error">
            ⚠ <?= esc(session()->getFlashdata('newsletter_error')) ?>
        </div>
    <?php endif; ?>

    <div class="header-card">

        <div class="header-icon">💌</div>

        <h1>Langganan Relovié</h1>

        <p>
            Atur informasi apa saja yang ingin kamu dapatkan
            dari Relovié.
        </p>

        <?php if ($subscriber && $subscriber['status'] === 'active'): ?>

            <div class="status">
                ● Langganan Aktif
            </div>

        <?php endif; ?>

    </div>

    <?php if ($subscriber && $subscriber['status'] === 'active'): ?>

        <div class="content">

            <!-- INFORMASI LANGGANAN -->
            <div class="card">

                <h2>📋 Informasi Langganan</h2>

                <div class="info-row">
                    <div class="info-label">Email</div>
                    <div class="info-value">
                        <?= esc($subscriber['email']) ?>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">Status</div>
                    <div class="info-value">
                        Aktif
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">Mulai berlangganan</div>
                    <div class="info-value">
                        <?= date('d F Y', strtotime($subscriber['subscribed_at'])) ?>
                    </div>
                </div>

            </div>

            <!-- YANG DIDAPAT -->
            <div class="card">

                <h2>🎁 Yang Kamu Dapatkan</h2>

                <div class="benefit">
                    <span class="benefit-icon">🆕</span>
                    <span>Informasi barang baru</span>
                </div>

                <div class="benefit">
                    <span class="benefit-icon">🔥</span>
                    <span>Flash sale Relovié</span>
                </div>

                <div class="benefit">
                    <span class="benefit-icon">💸</span>
                    <span>Promo dan penawaran</span>
                </div>

                <div class="benefit">
                    <span class="benefit-icon">✨</span>
                    <span>Rekomendasi barang</span>
                </div>

            </div>

            <!-- PREFERENSI -->
            <div class="card full">

                <h2>⚙️ Preferensi Notifikasi</h2>

                <form action="/newsletter/preferences" method="post">

                    <?= csrf_field() ?>

                    <div class="preference">
                        <span>
                            🆕 Barang baru
                        </span>

                        <label class="switch">
                            <input
                                type="checkbox"
                                name="notify_new_items"
                                value="1"
                                <?= $subscriber['notify_new_items'] ? 'checked' : '' ?>
                            >
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="preference">
                        <span>
                            💸 Promo dan diskon
                        </span>

                        <label class="switch">
                            <input
                                type="checkbox"
                                name="notify_promo"
                                value="1"
                                <?= $subscriber['notify_promo'] ? 'checked' : '' ?>
                            >
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="preference">
                        <span>
                            🔥 Flash sale
                        </span>

                        <label class="switch">
                            <input
                                type="checkbox"
                                name="notify_flash_sale"
                                value="1"
                                <?= $subscriber['notify_flash_sale'] ? 'checked' : '' ?>
                            >
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="preference">
                        <span>
                            ✨ Rekomendasi produk
                        </span>

                        <label class="switch">
                            <input
                                type="checkbox"
                                name="notify_recommendation"
                                value="1"
                                <?= $subscriber['notify_recommendation'] ? 'checked' : '' ?>
                            >
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="actions">

                        <button type="submit" class="btn btn-primary">
                            Simpan Preferensi
                        </button>

                    </div>

                </form>

            </div>

            <!-- NEWSLETTER TERBARU -->
            <div class="card full">

                <h2>📬 Newsletter Terbaru</h2>

                <div class="newsletter-item">
                    <h3>✨ Koleksi Baru Minggu Ini</h3>
                    <p>
                        Temukan berbagai barang preloved terbaru
                        yang baru saja hadir di Relovié.
                    </p>
                </div>

                <div class="newsletter-item">
                    <h3>🔥 Promo Relovié</h3>
                    <p>
                        Dapatkan informasi mengenai promo dan
                        penawaran menarik dari Relovié.
                    </p>
                </div>

                <div class="newsletter-item">
                    <h3>👗 Tips Berburu Barang Preloved</h3>
                    <p>
                        Tips memilih barang preloved berkualitas
                        sebelum melakukan pembelian.
                    </p>
                </div>

            </div>

            <!-- BERHENTI LANGGANAN -->
            <div class="card full">

                <h2>🔕 Kelola Langganan</h2>

                <p style="font-size:13px; color:#667;">
                    Kalau kamu tidak ingin menerima informasi
                    newsletter Relovié lagi, kamu bisa berhenti
                    berlangganan kapan saja.
                </p>

                <div class="actions">

                    <form
                        action="/newsletter/unsubscribe"
                        method="post"
                        onsubmit="return confirm('Yakin ingin berhenti berlangganan?');"
                    >

                        <?= csrf_field() ?>

                        <button type="submit" class="btn btn-danger">
                            Berhenti Berlangganan
                        </button>

                    </form>

                </div>

            </div>

        </div>

    <?php else: ?>

        <div class="card" style="margin-top:20px; text-align:center;">

            <div class="empty">

                <div class="empty-icon">📭</div>

                <h2>Belum Berlangganan</h2>

                <p>
                    Kamu belum menjadi subscriber newsletter Relovié.
                    Yuk, daftar untuk mendapatkan informasi terbaru.
                </p>

                <a href="/" class="btn btn-primary">
                    Berlangganan Sekarang
                </a>

            </div>

        </div>

    <?php endif; ?>

</div>

</body>
</html>