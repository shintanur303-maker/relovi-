<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Alamat - Relovié</title>

<link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>

<script
    src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js">
</script>


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
    }

    .info {
        color: #8A7168;
        font-size: 13px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    label {
        display: block;
        font-size: 13px;
        margin-bottom: 7px;
        color: #5C4841;
    }

    input,
    select,
    textarea {
        width: 100%;
        border: 1px solid #E5D2CD;
        border-radius: 8px;
        padding: 12px;
        font-family: inherit;
        font-size: 14px;
        background: #fff;
        color: #4A3B36;
        outline: none;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: #A67C74;
    }

    textarea {
        min-height: 100px;
        resize: vertical;
    }

    #map {
    width: 100%;
    height: 300px;
    border-radius: 10px;
    border: 1px solid #E5D2CD;
    overflow: hidden;
}

    .button {
        width: 100%;
        border: none;
        background: #A67C74;
        color: white;
        padding: 13px;
        border-radius: 8px;
        font-family: inherit;
        font-size: 14px;
        cursor: pointer;
        margin-top: 8px;
    }

    .button:hover {
        background: #8F6860;
    }
</style>
</head>

<body>

<div class="wrap">

    <div class="header">
        <a href="/akun/pengaturan/alamat" class="back">&larr;</a>
        <div class="title">Tambah Alamat</div>
    </div>

    <div class="card">

    <form action="/akun/pengaturan/alamat/simpan" method="post">

        <div class="info">
            Isi alamat yang akan digunakan untuk menerima pesanan.
        </div>

        <div class="form-group">
            <label>Label Alamat</label>

            <select name="label">
                <option>Rumah</option>
                <option>Kampus</option>
                <option>Kantor</option>
                <option>Lainnya</option>
            </select>
        </div>

        <div class="form-group">
            <label>Nama Penerima</label>
            <input
                type="text"
                name="recipient_name"
                placeholder="Masukkan nama penerima"
            >
        </div>

        <div class="form-group">
            <label>No. Handphone</label>
            <input
                type="text"
                name="phone"
                placeholder="Masukkan nomor handphone"
            >
        </div>

        <div class="form-group">
            <label>Provinsi</label>
            <input
                type="text"
                name="province"
                placeholder="Contoh: Jawa Timur"
            >
        </div>

        <div class="form-group">
            <label>Kota/Kabupaten</label>
            <input
                type="text"
                name="city"
                placeholder="Contoh: Surabaya"
            >
        </div>

        <div class="form-group">
            <label>Kecamatan</label>
            <input
                type="text"
                name="village"
                placeholder="Masukkan kecamatan"
            >
        </div>

        <div class="form-group">
            <label>Kelurahan/Desa</label>
            <input
                type="text"
                name="village"
                placeholder="Masukkan kelurahan/desa"
            >
        </div>

        <div class="form-group">
            <label>Kode Pos</label>
            <input
                type="text"
                name="postal_code"
                placeholder="Masukkan kode pos"
            >
        </div>

        <div class="form-group">
            <label>Alamat Lengkap</label>

            <textarea
                name="full_address"
                placeholder="Nama jalan, nomor rumah, RT/RW, patokan, dan sebagainya"
            ></textarea>
        </div>

        <div class="form-group">
    <label>Lokasi di Peta</label>

    <div id="map"></div>

    <input type="hidden" name="latitude" id="latitude">
    <input type="hidden" name="longitude" id="longitude">
</div>

        <button type="submit" class="button">
            Simpan Alamat
        </button>

</form>

    </div>

</div>

<script>
    const map = L.map('map').setView([-7.2575, 112.7521], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    let marker;

    map.on('click', function(e) {

        const latitude = e.latlng.lat;
        const longitude = e.latlng.lng;

        // Simpan koordinat ke hidden input
        document.getElementById('latitude').value = latitude;
        document.getElementById('longitude').value = longitude;

        // Hapus marker lama
        if (marker) {
            map.removeLayer(marker);
        }

        // Buat marker baru
        marker = L.marker([latitude, longitude]).addTo(map);

        marker.bindPopup(
            'Lokasi dipilih<br>' +
            'Latitude: ' + latitude.toFixed(6) + '<br>' +
            'Longitude: ' + longitude.toFixed(6)
        ).openPopup();

    });
</script>

</body>
</html>