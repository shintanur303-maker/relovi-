<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

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
}

input:focus{
    border-color:#4285f4;
}

.link{
    margin-top:10px;
    font-size:14px;
}

.link a{
    color:#1a73e8;
    text-decoration:none;
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

<h2>Login</h2>
<p>Gunakan akun Anda</p>

<form action="/login" method="post">

<div class="input-group">
<input type="email" name="email" placeholder="Email atau nomor telepon" required>
</div>

<div class="input-group">
<input type="password" name="password" placeholder="Masukkan password" required>
</div>

<div class="link">
<a href="#">Lupa email?</a>
</div>

<div class="actions">
<a href="/register" style="font-size:14px;color:#1a73e8;text-decoration:none;">Buat akun</a>
<button type="submit">Berikutnya</button>
</div>

</form>

</div>

</body>
</html>