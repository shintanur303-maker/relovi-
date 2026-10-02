<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?= esc($judul) ?> - Relovié</title>

<style>

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
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
    line-height: 1;
}

.title {
    font-size: 22px;
    font-weight: 600;
}

.card {
    background: #FFFDFB;
    border: 1px solid #F0DED9;
    border-radius: 12px;
    padding: 22px;
    margin-top: 10px;
}

.card h2 {
    margin: 0;
    font-size: 19px;
    color: #4A3B36;
}

.card p {
    font-size: 14px;
    line-height: 1.7;
    color: #75645E;
    margin-top: 12px;
}

.info-list {
    margin-top: 18px;
    padding-left: 20px;
}

.info-list li {
    margin-bottom: 10px;
    font-size: 14px;
    line-height: 1.6;
    color: #5F514C;
}

.item {
    background: #FFFDFB;
    border: 1px solid #F0DED9;
    border-radius: 10px;
    padding: 16px 18px;
    margin-top: 10px;
}

.item-title {
    font-size: 14px;
    font-weight: 600;
}

.item-text {
    font-size: 13px;
    color: #82726C;
    margin-top: 5px;
    line-height: 1.6;
}

.highlight {
    background: #F9EFEB;
    border-radius: 10px;
    padding: 16px;
    margin-top: 18px;
    font-size: 13px;
    line-height: 1.6;
    color: #765C54;
}

@media (max-width: 600px) {

    .wrap {
        padding-left: 16px;
        padding-right: 16px;
    }

    .title {
        font-size: 20px;
    }

}

</style>

</head>

<body>

<div class="wrap">

    <div class="header">

        <a href="/akun/pengaturan" class="back">
            &larr;
        </a>

        <div class="title">
            <?= esc($judul) ?>
        </div>

    </div>


    <?php if ($slug === 'bantuan'): ?>

        <div class="card">

            <h2>
                Pusat Bantuan Relovié
            </h2>

            <p>
                Temukan informasi dan panduan mengenai penggunaan
                Relovié sebagai marketplace barang preloved.
            </p>

        </div>

        <div class="item">
            <div class="item-title">
                Belanja Barang
            </div>

            <div class="item-text">
                Cari produk, lihat detail barang, tambahkan ke keranjang,
                lalu lakukan checkout.
            </div>
        </div>

        <div class="item">
            <div class="item-title">
                Jual Barang
            </div>

            <div class="item-text">
                Pengguna dapat mengunggah barang preloved melalui
                fitur Jual Barang.
            </div>
        </div>

        <div class="item">
            <div class="item-title">
                Pesanan
            </div>

            <div class="item-text">
                Pantau status pesanan mulai dari pembayaran hingga
                pesanan selesai.
            </div>
        </div>

        <div class="item">
            <div class="item-title">
                Chat
            </div>

            <div class="item-text">
                Gunakan fitur chat untuk berkomunikasi mengenai
                produk dan transaksi.
            </div>
        </div>


    <?php elseif ($slug === 'peraturan'): ?>

        <div class="card">

            <h2>
                Peraturan Komunitas
            </h2>

            <p>
                Relovié dibuat sebagai ruang jual beli barang preloved
                yang aman, jujur, dan saling menghargai.
            </p>

            <ul class="info-list">

                <li>
                    Gunakan identitas dan informasi produk yang benar.
                </li>

                <li>
                    Jangan mengunggah barang terlarang atau ilegal.
                </li>

                <li>
                    Jangan melakukan penipuan atau memberikan informasi palsu.
                </li>

                <li>
                    Hormati pengguna lain dalam komunikasi dan transaksi.
                </li>

                <li>
                    Gunakan fitur Relovié sesuai tujuan penggunaannya.
                </li>

            </ul>

        </div>


    <?php elseif ($slug === 'kebijakan'): ?>

        <div class="card">

            <h2>
                Kebijakan Relovié
            </h2>

            <p>
                Kebijakan Relovié mengatur penggunaan platform,
                transaksi, komunikasi, dan perlindungan informasi pengguna.
            </p>

        </div>

        <div class="item">

            <div class="item-title">
                Transaksi
            </div>

            <div class="item-text">
                Setiap transaksi harus dilakukan melalui alur transaksi
                yang tersedia di Relovié.
            </div>

        </div>

        <div class="item">

            <div class="item-title">
                Produk
            </div>

            <div class="item-text">
                Informasi mengenai kondisi barang harus disampaikan
                secara jujur oleh penjual.
            </div>

        </div>

        <div class="item">

            <div class="item-title">
                Akun
            </div>

            <div class="item-text">
                Pengguna bertanggung jawab menjaga keamanan akun
                masing-masing.
            </div>

        </div>


    <?php elseif ($slug === 'nilai'): ?>

        <div class="card">

            <h2>
                Nilai Relovié
            </h2>

            <p>
                Nilai utama yang menjadi dasar Relovié dalam membangun
                pengalaman marketplace barang preloved.
            </p>

        </div>

        <div class="item">

            <div class="item-title">
                ♻️ Berkelanjutan
            </div>

            <div class="item-text">
                Mendorong penggunaan kembali barang agar memiliki
                umur yang lebih panjang.
            </div>

        </div>

        <div class="item">

            <div class="item-title">
                🤝 Kepercayaan
            </div>

            <div class="item-text">
                Mengutamakan kejujuran dan transparansi antara
                pembeli dan penjual.
            </div>

        </div>

        <div class="item">

            <div class="item-title">
                💡 Sederhana
            </div>

            <div class="item-text">
                Membuat proses jual beli barang preloved lebih mudah
                dipahami dan digunakan.
            </div>

        </div>

        <div class="item">

            <div class="item-title">
                🌱 Peduli
            </div>

            <div class="item-text">
                Mendukung kebiasaan menggunakan kembali barang
                daripada membuangnya terlalu cepat.
            </div>

        </div>


    <?php elseif ($slug === 'informasi'): ?>

        <div class="card">

            <h2>
                Tentang Relovié
            </h2>

            <p>
                Relovié adalah marketplace barang preloved yang
                mempertemukan pengguna untuk membeli dan menjual
                barang yang masih memiliki nilai guna.
            </p>

            <div class="highlight">

                <strong>Relovié</strong><br>

                Barang lama, cerita baru.

            </div>

        </div>

        <div class="item">

            <div class="item-title">
                Versi
            </div>

            <div class="item-text">
                Relovié 2026
            </div>

        </div>

        <div class="item">

            <div class="item-title">
                Platform
            </div>

            <div class="item-text">
                Marketplace barang preloved untuk kebutuhan
                jual beli pengguna.
            </div>

        </div>

    <?php endif; ?>

</div>

</body>
</html>