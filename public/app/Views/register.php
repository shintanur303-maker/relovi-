<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Akun</title>

<style>
body{
    font-family: Arial, Helvetica, sans-serif;
    background:#f1f3f4;
    margin:0;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.login-box{
    background:white;
    width:360px;
    padding:40px;
    border-radius:8px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
    text-align:center;
}

.logo{
    font-size:24px;
    font-weight:bold;
    color:#4285f4;
    margin-bottom:10px;
}

h2{
    margin:10px 0;
    font-weight:500;
}

p{
    color:#5f6368;
    font-size:14px;
}

.input-group{
    margin-top:20px;
    text-align:left;
}

input{
    width:100%;
    padding:12px;
    border:1px solid #dadce0;
    border-radius:4px;
    font-size:14px;
    outline:none;
    box-sizing:border-box;
}

input:focus{
    border-color:#4285f4;
}

.actions{
    margin-top:30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

button{
    background:#1a73e8;
    color:white;
    border:none;
    padding:10px 20px;
    border-radius:4px;
    font-size:14px;
    cursor:pointer;
}

button:hover{
    background:#1765cc;
}
</style>

</head>
<body>

<div class="login-box">

<div class="logo">Relovié</div>
<div class="input-group">
  <label style="font-size:13px; color:#4A3B36; display:block; margin-bottom:6px; text-align:left;">Daftar sebagai:</label>
  <select name="role" required>
    <option value="pembeli">Pembeli</option>
    <option value="penjual">Penjual</option>
  </select>
</div>
<h2>Daftar Akun</h2>
<p>Buat akun baru untuk mulai jual-beli</p>

<?php if (session()->getFlashdata('error')): ?>
    <p style="color:red; font-size:13px;"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>

<form action="/register" method="post">

<div class="input-group">
<input type="text" name="name" placeholder="Nama lengkap" required>
</div>

<div class="input-group">
<input type="email" name="email" placeholder="Email" required>
</div>

<div class="input-group">
<input type="password" name="password" placeholder="Password" required>
</div>

<div class="actions">
<a href="/login" style="font-size:14px;color:#1a73e8;text-decoration:none;">Sudah punya akun?</a>
<button type="submit">Daftar</button>
</div>

</form>

</div>

</body>
</html>