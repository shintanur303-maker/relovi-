<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Relovié — Pasar Barang Preloved</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root{
  --navy: #3F4E68;
  --denim: #6B625A;
  --denim-dark: #8B6470;
  --sky: #F7F3EE;
  --cream: #FFFDFC;
  --amber: #C9A66B;
  --ink: #4F4A46;
  --line: #E5DDD4;

  --rose-soft: #E7D4D2;
  --rose: #B98282;
  --beige: #F1E4D6;
  --green-soft: #DDE7DE;
}
  *{box-sizing:border-box; margin:0; padding:0;}
  body{
    font-family:'Poppins', sans-serif;
    background:var(--sky);
    color:var(--ink);
    line-height:1.5;
  }
  h1,h2,h3{
    font-family:'Poppins', sans-serif;
    font-weight:600;
    color:var(--navy);
}
  a{text-decoration:none; color:inherit;}
  img{max-width:100%; display:block;}
  .wrap{max-width:1180px; margin:0 auto; padding:0 24px;}

  /* =========================
   NAVBAR RELOVIÉ
   ========================= */

header{
    border-bottom:1px solid var(--line);
    background:var(--cream);
    position:sticky;
    top:0;
    z-index:50;
}

.navbar{
    display:flex;
    align-items:center;
    gap:24px;
    min-height:68px;
    padding:14px 0;
}

.logo{
    font-family:'Poppins', sans-serif;
    font-size:26px;
    font-weight:700;
    color:var(--navy);
    white-space:nowrap;
    letter-spacing:-0.5px;
}

.navbar form{
    flex:1;
    max-width:570px;
    height:42px;
    display:flex;
    border:1px solid #D8CEC6;
    border-radius:9px;
    overflow:hidden;
    background:#FAF8F5;
}

.navbar input[type="search"]{
    flex:1;
    min-width:0;
    border:none;
    padding:9px 13px;
    font-family:'Poppins', sans-serif;
    font-size:14px;
    color:var(--ink);
    background:transparent;
    outline:none;
}

.navbar input[type="search"]::placeholder{
    color:#918983;
}

.navbar button{
    background:var(--navy);
    color:#fff;
    border:none;
    padding:0 18px;
    cursor:pointer;
    font-family:'Poppins', sans-serif;
    font-size:14px;
    font-weight:500;
}

.navbar button:hover{
    background:#344258;
}

.nav-icons{
    display:flex;
    align-items:center;
    justify-content:flex-end;
    gap:20px;
    margin-left:auto;
    font-family:'Poppins', sans-serif;
    font-size:14px;
    font-weight:500;
    color:var(--navy);
    white-space:nowrap;
}

.nav-icons a{
    color:var(--navy);
    border-bottom:1px solid transparent;
    padding:4px 0;
    transition:.2s ease;
}

.nav-icons a:hover{
    color:var(--rose);
    border-color:var(--rose);
}

.nav-categories{
    display:flex;
    align-items:center;
    gap:30px;
    min-height:44px;
    padding:10px 0;
    border-top:1px solid var(--line);
    overflow-x:auto;
    scrollbar-width:none;
}

.nav-categories::-webkit-scrollbar{
    display:none;
}

.nav-categories a{
    color:var(--navy);
    font-family:'Poppins', sans-serif;
    font-size:14px;
    font-weight:500;
    white-space:nowrap;
    transition:color .2s ease;
}

.nav-categories a:hover{
    color:var(--rose);
}
  .hero{
  padding:68px 0 72px;
  position:relative;
  overflow:hidden;
  background:
    radial-gradient(circle at 82% 30%, rgba(231,212,210,.65), transparent 28%),
    radial-gradient(circle at 72% 80%, rgba(241,228,214,.75), transparent 32%),
    var(--sky);
}

.hero-inner{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:48px;
  align-items:center;
}

.hero h1{
  font-size:48px;
  line-height:1.08;
  letter-spacing:-0.8px;
  color:var(--navy);
}

.hero p{
  margin-top:18px;
  font-size:16px;
  max-width:46ch;
  color:#69635E;
}

.hero .cta-row{
  margin-top:28px;
  display:flex;
  gap:12px;
}

.btn-primary{
  background:var(--amber);
  color:#fff;
  padding:13px 26px;
  border-radius:8px;
  font-size:14px;
  font-weight:600;
  display:inline-block;
  transition:transform .2s, box-shadow .2s;
}

.btn-primary:hover{
  transform:translateY(-2px);
  box-shadow:0 8px 18px rgba(201,166,107,.25);
}

.btn-outline{
  border:1px solid #B8AAA0;
  background:rgba(255,255,255,.55);
  color:var(--navy);
  padding:13px 26px;
  border-radius:8px;
  font-size:14px;
  font-weight:500;
  display:inline-block;
}

.btn-outline:hover{
  background:#fff;
}

.hero-products{
  position:relative;
  min-height:360px;
  display:flex;
  align-items:center;
  justify-content:center;
}

.hero-products::before{
  content:'';
  position:absolute;
  width:330px;
  height:330px;
  background:var(--beige);
  border-radius:32px;
  transform:rotate(4deg);
  box-shadow:0 20px 45px rgba(80,65,55,.08);
}

.hero-product-grid{
  position:relative;
  z-index:2;
  width:100%;
  max-width:420px;
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:14px;
}

.hero-product-card{
  background:#fff;
  border:1px solid rgba(229,221,212,.9);
  border-radius:16px;
  padding:8px;
  box-shadow:0 12px 28px rgba(63,78,104,.10);
  transition:transform .25s, box-shadow .25s;
}

.hero-product-card:nth-child(2){
  transform:translateY(18px);
}

.hero-product-card:nth-child(3){
  transform:translateY(-10px);
}

.hero-product-card:nth-child(4){
  transform:translateY(10px);
}

.hero-product-card:hover{
  transform:translateY(-4px);
  box-shadow:0 18px 35px rgba(63,78,104,.14);
}

.hero-product-card img{
  width:100%;
  aspect-ratio:1/1;
  object-fit:cover;
  border-radius:11px;
}

.hero-product-name{
  padding:7px 5px 3px;
  font-size:11px;
  font-weight:600;
  color:var(--navy);
  white-space:nowrap;
  overflow:hidden;
  text-overflow:ellipsis;
}

.hero-product-price{
  padding:0 5px 5px;
  font-size:10px;
  color:var(--rose);
  font-weight:600;
}

@media (max-width:900px){
  .hero-inner{
    grid-template-columns:1fr;
  }

  .hero-products{
    min-height:320px;
  }
}

  .stats-bar{background:var(--navy); color:var(--cream); padding:32px 0;}
  .stats-grid{display:grid; grid-template-columns:repeat(4,1fr); text-align:center; gap:16px;}
  .stat-num{font-family:'pop', serif; font-size:32px; font-weight:700; color:var(--amber);}
  .stat-label{font-size:12px; color:#B7C6D6; margin-top:6px;}

  .filter-bar{
    background:#EEE2DC;
    color:var(--navy);
    padding:16px 0;
    border-top:1px solid #E2D4CC;
    border-bottom:1px solid #E2D4CC;
}

.filter-bar .wrap{
    display:flex;
    gap:12px;
    flex-wrap:wrap;
    align-items:center;
    font-size:13px;
}

.filter-bar select{
    background:rgba(255,255,255,.82);
    border:1px solid #C9B7AF;
    color:var(--navy);
    padding:9px 13px;
    border-radius:8px;
    font-family:inherit;
    font-size:13px;
    outline:none;
    transition:border-color .2s, box-shadow .2s;
}

.filter-bar select:hover{
    border-color:var(--rose);
}

.filter-bar select:focus{
    border-color:var(--rose);
    box-shadow:0 0 0 3px rgba(185,130,130,.12);
}

.filter-bar select option{
    color:var(--ink);
    background:#fff;
}

  .section{padding:56px 0;}
  .section-head{display:flex; justify-content:space-between; align-items:baseline; margin-bottom:28px;}
  .section-head h2{font-size:28px;}
  .section-head a{font-size:13px; color:var(--denim-dark); border-bottom:1px solid var(--denim-dark);}

  .cat-grid{display:grid; grid-template-columns:repeat(6, 1fr); gap:14px;}
  .cat-item{text-align:center; padding:20px 8px; background:var(--cream); border:1px solid var(--line); border-radius:10px; transition:transform .2s, border-color .2s;}
  .cat-item:hover{border-color:var(--amber); transform:translateY(-4px);}
  .cat-item .icon{width:44px; height:44px; margin:0 auto 10px; background:var(--sky); border:2px solid var(--denim); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:20px;}
  .cat-item span{font-size:12.5px; font-weight:500;}

  .flash{background:linear-gradient(135deg, var(--denim) 0%, var(--navy) 100%); border-radius:14px; padding:32px; color:var(--cream); display:flex; justify-content:space-between; align-items:center; gap:24px; flex-wrap:wrap;}
  .flash h2{
    color:#FFFDFC;
    font-size:24px;
}

.flash p{
    font-size:13px;
    color:#F4E8E5;
    margin-top:6px;
}
  .countdown{display:flex; gap:10px;}
  .countdown div{
    background:rgba(255,255,255,.16);
    border:1px solid rgba(255,255,255,.16);
    border-radius:9px;
    padding:10px 14px;
    text-align:center;
    min-width:56px;
}
  .countdown .num{font-family:'Poppins', serif; font-size:22px; font-weight:700; color:#F8E7C7;}
  .countdown .lbl{font-size:10px; color:#C7D6E4;}

  .prod-grid{display:grid; grid-template-columns:repeat(4, 1fr); gap:20px;}
  .prod-card{background:var(--cream); border:1px solid var(--line); border-radius:10px; overflow:hidden; transition:transform .2s, box-shadow .2s;}
  .prod-card:hover{transform:translateY(-6px); box-shadow:0 14px 24px rgba(34,52,74,0.15);}
  .prod-img{aspect-ratio:3/4; background:var(--sky);}
  .prod-body{padding:14px;}
  .prod-cond{font-size:11px; color:var(--denim-dark); font-weight:600; text-transform:uppercase; letter-spacing:0.4px;}
  .prod-name{font-size:14px; font-weight:500; margin-top:4px;}
  .prod-price{font-size:15px; font-weight:600; color:var(--navy); margin-top:6px;}
  .prod-meta{font-size:12px; color:#697A8C; margin-top:4px;}

  .marquee-wrap{overflow:hidden; position:relative;}
  .marquee-track{display:flex; gap:20px; width:max-content; animation:scroll 22s linear infinite;}
  .marquee-wrap:hover .marquee-track{animation-play-state:paused;}
  @keyframes scroll{
    from{transform:translateX(0);}
    to{transform:translateX(-50%);}
  }
  .seller-card{flex:0 0 200px; background:var(--cream); border:1px solid var(--line); border-radius:10px; padding:18px; text-align:center;}
  .seller-avatar{width:56px; height:56px; border-radius:50%; background:var(--denim); margin:0 auto 10px;}
  .seller-card h4{font-size:14px; font-weight:600;}
  .seller-card p{font-size:12px; color:#697A8C; margin-top:4px;}

 .blog-grid{
  display:grid;
  grid-template-columns:repeat(3, 1fr);
  gap:20px;
}

.blog-card{
  cursor:pointer;
}

.blog-card .blog-img{
  border-radius:10px;
  aspect-ratio:16/10;
  display:flex;
  align-items:center;
  justify-content:center;
  overflow:hidden;
  position:relative;
}

.blog-card .blog-img svg{
  width:56%;
  height:56%;
  transition:transform .3s ease;
}

.blog-card:hover .blog-img svg{
  transform:scale(1.05);
}

.blog-img-1{
  background:linear-gradient(135deg,#22344A,#2C4E6E);
}

.blog-img-2{
  background:linear-gradient(135deg,#2C4E6E,#4A6FA5);
}

.blog-img-3{
  background:linear-gradient(135deg,#8A6D1D,#E2A03F);
}

.blog-card h3{
  font-size:16px;
  margin-top:12px;
  display:flex;
  justify-content:space-between;
  align-items:center;
}

.blog-card h3 .arrow{
  font-size:13px;
  color:#8A6D1D;
  transition:transform .2s;
}

/* Isi detail tidak ditampilkan di kartu */
.blog-detail{
  display:none;
}

  .newsletter{background:var(--cream); border:1px solid var(--line); border-radius:14px; padding:36px; text-align:center;}
  .newsletter h2{font-size:22px;}
  .newsletter p{font-size:13px; color:#3D4C5C; margin-top:8px;}
  .newsletter form{margin-top:20px; display:flex; justify-content:center; gap:10px;}
  .newsletter input{padding:11px 14px; border:1px solid var(--line); border-radius:6px; font-family:inherit; font-size:13px; width:260px;}

  .sell-cta{background:var(--navy); color:var(--cream); border-radius:14px; padding:48px; display:flex; justify-content:space-between; align-items:center; gap:24px; flex-wrap:wrap;}
  .sell-cta h2{color:var(--cream); font-size:26px;}
  .sell-cta p{margin-top:8px; color:#B7C6D6; font-size:14px;}
  .sell-cta .btn-primary{background:var(--amber);}

  /* =========================
   FOOTER RELovié
   ========================= */

footer{
  background:#465875;
  color:#FFFDFC;
  padding:58px 0 24px;
  margin-top:0;
}

.footer-grid{
  display:grid;
  grid-template-columns:1.6fr 1fr 1fr 1fr 1.15fr 1.25fr;
  gap:30px;
  padding-bottom:38px;
  border-bottom:1px solid rgba(255,255,255,.16);
}

.footer-brand{
  padding-right:18px;
}

.footer-logo{
  font-family:'Poppins', serif;
  font-size:30px;
  font-weight:700;
  color:#FFFDFC;
  letter-spacing:-.5px;
}

.footer-brand p{
  margin-top:12px;
  font-size:13px;
  line-height:1.7;
  color:#DCE3EB;
  max-width:32ch;
}

.footer-tagline{
  display:inline-flex;
  align-items:center;
  gap:7px;
  margin-top:18px;
  padding:7px 12px;
  border:1px solid rgba(255,255,255,.18);
  background:rgba(255,255,255,.06);
  border-radius:999px;
  color:#F3DDB5;
  font-size:11px;
}

.footer-social{
  display:flex;
  gap:8px;
  margin-top:18px;
}

.footer-social a{
  width:32px;
  height:32px;
  display:flex;
  align-items:center;
  justify-content:center;
  border:1px solid rgba(255,255,255,.18);
  border-radius:50%;
  background:rgba(255,255,255,.05);
  color:#FFFDFC;
  font-size:14px;
  transition:.2s ease;
}

.footer-social a:hover{
  transform:translateY(-2px);
  background:rgba(255,255,255,.12);
  border-color:#D7BB85;
}

.footer-col h4{
  font-family:'Poppins', sans-serif;
  font-size:13px;
  font-weight:700;
  color:#FFFDFC;
  margin-bottom:15px;
}

.footer-col ul{
  list-style:none;
  padding:0;
  margin:0;
}

.footer-col li{
  margin-bottom:9px;
}

.footer-col a,
.footer-col span{
  font-size:13.5px;
  color:#D8E0E9;
  line-height:1.5;
  transition:color .2s ease;
}

.footer-col a:hover{
  color:#F1D6AC;
}

.footer-col .footer-highlight{
  color:#F0D3AC;
  font-weight:600;
}

.footer-bottom{
  padding-top:22px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  gap:18px;
  flex-wrap:wrap;
}

.footer-copy{
  font-size:12px;
  color:#C2CDD9;
  line-height:1.5;
}

.footer-note{
  margin-top:4px;
  font-size:12px;
  color:#AEBBC9;
}

.footer-meta{
  display:flex;
  gap:16px;
  flex-wrap:wrap;
}

.footer-meta span{
  font-size:12px;
  color:#C2CDD9;
}

@media (max-width:1100px){
  .footer-grid{
    grid-template-columns:1.5fr 1fr 1fr 1fr;
  }

  .footer-brand{
    grid-column:span 4;
  }
}

@media (max-width:700px){
  .footer-grid{
    grid-template-columns:1fr 1fr;
    gap:26px 20px;
  }

  .footer-brand{
    grid-column:span 2;
  }

  .footer-bottom{
    flex-direction:column;
    align-items:flex-start;
  }
}

@media (max-width:480px){
  .footer-grid{
    grid-template-columns:1fr;
  }

  .footer-brand{
    grid-column:span 1;
  }
}

  @media (max-width:900px){
    .hero-inner{grid-template-columns:1fr;}
    .patch-field{height:220px;}
    .stats-grid{grid-template-columns:repeat(2,1fr);}
    .cat-grid{grid-template-columns:repeat(3,1fr);}
    .prod-grid{grid-template-columns:repeat(2,1fr);}
    .blog-grid{grid-template-columns:1fr;}
    .footer-grid{grid-template-columns:1fr 1fr;}
    .flash{flex-direction:column; text-align:center;}
    .sell-cta{flex-direction:column; text-align:center;}
  }
  .cat-item.why-card{cursor:pointer; transition:transform .2s, border-color .2s, box-shadow .2s;}
  .cat-item.why-card:hover{box-shadow:0 10px 20px rgba(34,52,74,0.12);}

  .why-modal-overlay{position:fixed; inset:0; background:rgba(20,20,20,0.55); display:none; align-items:center; justify-content:center; padding:20px; z-index:200;}
  .why-modal-overlay.active{display:flex;}
  .why-modal{background:var(--cream); border-radius:14px; max-width:460px; width:100%; padding:32px; position:relative; max-height:85vh; overflow-y:auto;}
  .why-modal-close{position:absolute; top:12px; right:14px; background:none; border:none; font-size:22px; line-height:1; cursor:pointer; color:var(--navy); padding:6px;}
  .why-modal-icon{font-size:34px; display:block;}
  .why-modal h3{font-size:21px; margin-top:8px;}
  .why-modal .why-hook{font-weight:600; margin-top:14px; color:var(--denim-dark); font-size:14.5px;}
  .why-modal p{font-size:13.5px; margin-top:10px; line-height:1.65; color:var(--ink);}
  .why-modal ul{margin-top:16px; list-style:none;}
  .why-modal li{font-size:13px; padding:5px 0;}
  .why-modal .why-cta{margin-top:20px; display:inline-block; background:var(--amber); color:var(--navy); padding:10px 20px; border-radius:6px; font-size:13px; font-weight:600;}
  .why-modal .why-closing-line{margin-top:16px; font-size:12.5px; font-style:italic; color:#3D4C5C;}
  /* MODAL TIPS PRELOVED */

.blog-modal-overlay{
  position:fixed;
  inset:0;
  background:rgba(20,20,20,0.55);
  display:none;
  align-items:center;
  justify-content:center;
  padding:20px;
  z-index:300;
}

.blog-modal-overlay.active{
  display:flex;
}

.blog-modal{
  background:var(--cream);
  border-radius:14px;
  max-width:620px;
  width:100%;
  padding:34px;
  position:relative;
  max-height:85vh;
  overflow-y:auto;
  box-shadow:0 20px 50px rgba(0,0,0,0.25);
}

.blog-modal-close{
  position:absolute;
  top:12px;
  right:14px;
  background:none;
  border:none;
  font-size:22px;
  line-height:1;
  cursor:pointer;
  color:var(--navy);
  padding:6px;
}

.blog-modal-icon{
  font-size:38px;
  margin-bottom:8px;
}

.blog-modal h3{
  font-size:24px;
  margin-top:4px;
  color:var(--navy);
}

.blog-modal p{
  font-size:14px;
  color:#3D4C5C;
  margin-top:16px;
  line-height:1.7;
}

.blog-modal ol{
  margin-top:18px;
  padding-left:22px;
  font-size:14px;
  color:#3D4C5C;
}

.blog-modal ol li{
  margin-bottom:8px;
  line-height:1.5;
}

.blog-modal ol li::marker{
  color:#E2A03F;
  font-weight:700;
}
</style>
</head>

<body>

<?php if (session()->getFlashdata('newsletter_success')): ?>

<div
  id="newsletterToast"
  style="
    position:fixed;
    top:90px;
    right:24px;
    width:340px;
    max-width:calc(100% - 32px);
    background:#ffffff;
    border:1px solid #b7dfc0;
    border-radius:12px;
    padding:16px 18px;
    box-shadow:0 12px 30px rgba(0,0,0,.15);
    z-index:9999;
  "
>
  <div style="display:flex; gap:12px; align-items:flex-start;">

    <div style="
      width:34px;
      height:34px;
      border-radius:50%;
      background:#e4f6e8;
      display:flex;
      align-items:center;
      justify-content:center;
      font-size:17px;
      flex-shrink:0;
    ">
      ✓
    </div>

    <div style="flex:1;">

      <div style="
        font-weight:600;
        color:#28733b;
        font-size:14px;
      ">
        Berhasil berlangganan!
      </div>

      <div style="
        margin-top:4px;
        font-size:12px;
        color:#5f6b65;
        line-height:1.5;
      ">
        <?= esc(session()->getFlashdata('newsletter_success')) ?>
      </div>

      <a
        href="/berlangganan"
        style="
          display:inline-block;
          margin-top:9px;
          font-size:12px;
          font-weight:600;
          color:var(--navy);
          text-decoration:underline;
        "
      >
        Lihat & kelola langganan →
      </a>

    </div>

    <button
      type="button"
      onclick="document.getElementById('newsletterToast').remove()"
      style="
        border:none;
        background:none;
        cursor:pointer;
        font-size:16px;
        color:#777;
      "
    >
      ✕
    </button>

  </div>
</div>

<script>
setTimeout(function() {
    const toast = document.getElementById('newsletterToast');

    if (toast) {
        toast.style.transition = 'opacity .4s ease';
        toast.style.opacity = '0';

        setTimeout(function() {
            toast.remove();
        }, 400);
    }
}, 6000);
</script>

<?php endif; ?>

<?php if (session()->get('isLoggedIn')): ?>

<style>
    #notificationToast {
        position: fixed;
        top: 25px;
        right: 25px;
        width: 320px;
        background: #ffffff;
        border: 1px solid #e5e5e5;
        border-radius: 12px;
        padding: 16px 18px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        z-index: 99999;
        display: none;
    }

    #notificationToast .toast-title {
        font-weight: 700;
        font-size: 14px;
        margin-bottom: 6px;
        color: #333;
    }

    #notificationToast .toast-message {
        font-size: 13px;
        color: #666;
        line-height: 1.5;
        margin-bottom: 10px;
    }

    #notificationToast .toast-link {
        font-size: 13px;
        color: var(--denim);
        text-decoration: none;
        font-weight: 600;
    }

    #notificationToast .toast-close {
        position: absolute;
        top: 8px;
        right: 10px;
        border: none;
        background: transparent;
        font-size: 18px;
        cursor: pointer;
        color: #999;
    }
</style>

<div id="notificationToast">

    <button
        type="button"
        class="toast-close"
        onclick="closeNotificationToast()"
    >
        ×
    </button>

    <div class="toast-title" id="notificationToastTitle">
        🔔 Notifikasi baru
    </div>

    <div class="toast-message" id="notificationToastMessage">
    </div>

    <a
        href="/notifikasi"
        class="toast-link"
        id="notificationToastLink"
    >
        Lihat notifikasi →
    </a>

</div>

<script>
(function () {

    const toast = document.getElementById('notificationToast');
    const title = document.getElementById('notificationToastTitle');
    const message = document.getElementById('notificationToastMessage');
    const link = document.getElementById('notificationToastLink');

    if (!toast) {
        return;
    }

    function showNotificationToast(notification) {

        title.innerHTML = '🔔 ' + notification.title;
        message.textContent = notification.message;

        if (notification.link) {
            link.href = notification.link;
            link.textContent = 'Lihat sekarang →';
        } else {
            link.href = '/notifikasi';
            link.textContent = 'Lihat notifikasi →';
        }

        toast.style.display = 'block';
        toast.style.opacity = '1';

        setTimeout(function () {

            toast.style.transition = 'opacity .4s ease';
            toast.style.opacity = '0';

            setTimeout(function () {
                toast.style.display = 'none';
                toast.style.opacity = '1';
            }, 400);

        }, 6000);
    }

    function checkNotification() {

        fetch('/notifikasi/terbaru')
            .then(response => response.json())
            .then(data => {

                if (
                    data.success &&
                    data.notification
                ) {

                    const notification = data.notification;

                    const storageKey =
                        'relovie_last_notification_' +
                        <?= (int) session()->get('user_id') ?>;

                    const lastShown =
                        localStorage.getItem(storageKey);

                    /*
                     * Hanya tampilkan toast kalau
                     * notifikasi ini belum pernah ditampilkan.
                     */

                    if (lastShown !== String(notification.id)) {

                        localStorage.setItem(
                            storageKey,
                            notification.id
                        );

                        showNotificationToast(notification);
                    }
                }

            })
            .catch(function (error) {
                console.log('Notifikasi gagal dimuat:', error);
            });
    }

    // Cek ketika halaman pertama dibuka
    checkNotification();

    // Cek kembali setiap 5 detik
    setInterval(checkNotification, 5000);

})();

function closeNotificationToast() {

    const toast = document.getElementById('notificationToast');

    if (!toast) {
        return;
    }

    toast.style.transition = 'opacity .4s ease';
    toast.style.opacity = '0';

    setTimeout(function () {
        toast.style.display = 'none';
        toast.style.opacity = '1';
    }, 400);
}
</script>

<?php endif; ?>

<header>
  <div class="wrap navbar">
    <a href="/" class="logo">Relovié</a>
    <form role="search" action="/" method="get" style="flex:1; display:flex; border:1.5px solid var(--denim); border-radius:6px; overflow:hidden;">
  <span style="padding:0 6px 0 14px; display:flex; align-items:center; color:var(--denim); font-size:15px;">🔍</span>
  <input type="search" name="cari" value="<?= esc($f['cari'] ?? '') ?>" placeholder="Cari jaket, sepatu, hp bekas...">
  <button type="submit">Cari</button>
  <a href="/scan" title="Cari pakai foto" style="display:flex; align-items:center; justify-content:center; width:44px; background:var(--amber); color:var(--navy); font-size:16px; border-left:1px solid rgba(255,255,255,0.3); flex-shrink:0;">📷</a>
</form>
    <div class="nav-icons">
  <a href="/jual">Jual Barang</a>

  <?php if (
      session()->get('isLoggedIn') &&
      session()->get('user_role') === 'penjual'
  ): ?>
      <a href="/produk/arsip"> Arsip Produk</a>
  <?php endif; ?>

  <a href="/wishlist">Wishlist</a>
  <a href="/keranjang">Keranjang</a>

  <?php if (session()->get('isLoggedIn')): ?>

    <?= view('partials/profile_menu', [
        'currentUser' => $currentUser ?? null
    ]) ?>

<?php else: ?>

    <a href="/login">Akun</a>

<?php endif; ?>
  <?php if (session()->get('isLoggedIn')): ?>

  <?php
  $notificationModel = new \App\Models\NotificationModel();
  $unreadNotificationCount = $notificationModel->countUnread(
      session()->get('user_id')
  );
  ?>

  <a href="/notifikasi" style="position:relative;">
    Notifikasi

    <?php if ($unreadNotificationCount > 0): ?>
      <span style="
        position:absolute;
        top:-8px;
        right:-10px;
        background:#E05656;
        color:#fff;
        font-size:11px;
        min-width:20px;
        height:20px;
        padding:0 5px;
        border-radius:50%;
        display:flex;
        align-items:center;
        justify-content:center;
        box-sizing:border-box;
        font-weight:600;
      ">
        <?= $unreadNotificationCount > 99 ? '99+' : $unreadNotificationCount ?>
      </span>
    <?php endif; ?>

  </a>

<?php endif; ?>

    </div>
  </div>

  <div class="wrap nav-categories">
  <a href="/kategori/Atasan">Atasan</a>
  <a href="/kategori/Bawahan">Bawahan</a>
  <a href="/kategori/Outerwear">Outerwear</a>
  <a href="/kategori/Sepatu">Sepatu</a>
  <a href="/kategori/Tas">Tas</a>
  <a href="/kategori/Elektronik">Elektronik</a>
  <a href="/kategori/Aksesoris">Aksesoris</a>
</div>
</header>
<?php if (session()->getFlashdata('error')): ?>
  <div style="background:#FBEAEA; color:#A67C74; text-align:center; padding:12px; font-size:14px;">
    <?= session()->getFlashdata('error') ?>
  </div>
<?php endif; ?>
<section class="hero">
  <div class="wrap hero-inner">
    <div>
      <h1>Barang lama, cerita baru.</h1>
      <p>Jual dan temukan barang preloved berkualitas — pakaian sampai elektronik, kondisi jujur, harga wajar.</p>
      <div class="cta-row">
        <a href="/produk" class="btn-primary">Mulai Belanja</a>
        <a href="/jual" class="btn-outline">Jual Barangmu</a>
      </div>
    </div>
    <div class="hero-products">

  <div class="hero-product-grid">

    <?php
    $heroProducts = array_slice($products, 0, 4);
    ?>

    <?php if (! empty($heroProducts)): ?>

      <?php foreach ($heroProducts as $hp): ?>

        <a
          href="/produk/<?= $hp['id'] ?>"
          class="hero-product-card"
        >

          <?php if (! empty($hp['photo'])): ?>

            <img
              src="/uploads/products/<?= esc($hp['photo']) ?>"
              alt="<?= esc($hp['name']) ?>"
            >

          <?php else: ?>

            <div
              style="
                aspect-ratio:1/1;
                border-radius:11px;
                background:var(--beige);
                display:flex;
                align-items:center;
                justify-content:center;
                font-size:32px;
              "
            >
              🛍️
            </div>

          <?php endif; ?>

          <div class="hero-product-name">
            <?= esc($hp['name']) ?>
          </div>

          <div class="hero-product-price">
            Rp<?= number_format($hp['price'] ?? 0, 0, ',', '.') ?>
          </div>

        </a>

      <?php endforeach; ?>

    <?php else: ?>

      <div class="hero-product-card">
        <div
          style="
            aspect-ratio:1/1;
            border-radius:11px;
            background:var(--rose-soft);
          "
        ></div>
      </div>

      <div class="hero-product-card">
        <div
          style="
            aspect-ratio:1/1;
            border-radius:11px;
            background:var(--green-soft);
          "
        ></div>
      </div>

      <div class="hero-product-card">
        <div
          style="
            aspect-ratio:1/1;
            border-radius:11px;
            background:var(--beige);
          "
        ></div>
      </div>

      <div class="hero-product-card">
        <div
          style="
            aspect-ratio:1/1;
            border-radius:11px;
            background:#E8E4DD;
          "
        ></div>
      </div>

    <?php endif; ?>

  </div>

</div>
  </div>
</section>

<div class="stats-bar">
  <div class="wrap stats-grid">
    <div><div class="stat-num" data-target="<?= $statBarangTerselamatkan ?>">0</div><div class="stat-label">Barang Terselamatkan</div></div>
    <div><div class="stat-num" data-target="<?= $statPenjualAktif ?>">0</div><div class="stat-label">Penjual Aktif</div></div>
    <div><div class="stat-num" data-target="<?= $statRatingPositif ?>">0</div><div class="stat-label">% Rating Positif</div></div>
    <div><div class="stat-num" data-target="<?= $statKotaTerjangkau ?>">0</div><div class="stat-label">Kota Terjangkau</div></div>
  </div>
</div>

<div class="filter-bar" style="margin-top:24px;" id="filter-bar-section">
  <div class="wrap">
    <form method="get" action="/" style="display:flex; gap:14px; flex-wrap:wrap; align-items:center;">
      <select name="kategori" onchange="this.form.submit()">
        <option value="">Kategori</option>
        <option value="Atasan" <?= ($f['kategori'] ?? '') === 'Atasan' ? 'selected' : '' ?>>Atasan</option>
        <option value="Bawahan" <?= ($f['kategori'] ?? '') === 'Bawahan' ? 'selected' : '' ?>>Bawahan</option>
        <option value="Outerwear" <?= ($f['kategori'] ?? '') === 'Outerwear' ? 'selected' : '' ?>>Outerwear</option>
        <option value="Sepatu" <?= ($f['kategori'] ?? '') === 'Sepatu' ? 'selected' : '' ?>>Sepatu</option>
        <option value="Tas" <?= ($f['kategori'] ?? '') === 'Tas' ? 'selected' : '' ?>>Tas</option>
        <option value="Elektronik" <?= ($f['kategori'] ?? '') === 'Elektronik' ? 'selected' : '' ?>>Elektronik</option>
        <option value="Aksesoris" <?= ($f['kategori'] ?? '') === 'Aksesoris' ? 'selected' : '' ?>>Aksesoris</option>
      </select>

      <select name="ukuran" onchange="this.form.submit()">
        <option value="">Ukuran</option>
        <option value="S">S</option><option value="M">M</option><option value="L">L</option><option value="XL">XL</option>
        <option value="All Size">All Size</option>
      </select>

      <select name="kondisi" onchange="this.form.submit()">
        <option value="">Kondisi</option>
        <option value="Like New">Like New</option>
        <option value="Good">Good</option>
        <option value="Fair">Fair</option>
      </select>

      <select name="harga" onchange="this.form.submit()">
        <option value="">Harga</option>
        <option value="bawah50">Di bawah 50rb</option>
        <option value="50-300">50rb–300rb</option>
        <option value="atas300">Di atas 300rb</option>
      </select>

      <select name="lokasi" onchange="this.form.submit()">
        <option value="">Lokasi</option>
        <option value="Jabodetabek">Jabodetabek</option>
        <option value="Jawa Timur">Jawa Timur</option>
        <option value="Jawa Tengah">Jawa Tengah</option>
        <option value="Jawa Barat">Jawa Barat</option>
        <option value="Sumatra">Sumatra</option>
      </select>

      <select name="pembayaran" onchange="this.form.submit()">
        <option value="">Metode Bayar</option>
        <option value="Transfer">Transfer</option>
        <option value="COD">COD</option>
        <option value="Cicilan">Cicilan</option>
      </select>

      <select name="pengiriman" onchange="this.form.submit()">
        <option value="">Pengiriman</option>
        <option value="Reguler">Reguler</option>
        <option value="Instant">Instant</option>
        <option value="Same Day">Same Day</option>
        <option value="Hemat Kargo">Hemat Kargo</option>
      </select>

      <select name="rating" onchange="this.form.submit()">
        <option value="">Rating</option>
        <option value="4">⭐ 4 ke atas</option>
        <option value="3">⭐ 3 ke atas</option>
      </select>

      <select name="urutkan" onchange="this.form.submit()">
        <option value="">Urutkan</option>
        <option value="terbaru">Terbaru</option>
        <option value="termurah">Termurah</option>
        <option value="termahal">Termahal</option>
      </select>

      <?php if (! empty($f)): ?>
        <a href="/" style="color:#fff; font-size:12px; text-decoration:underline;">Reset Filter</a>
      <?php endif; ?>
    </form>
  </div>
</div>

<section class="section" style="padding-top:40px;">
  <div class="wrap">
    <div
    class="flash"
    style="
        background:linear-gradient(135deg, #B98282 0%, #8E6672 100%);
    "
>
      <div>
        <h2>Flash Sale Akhir Pekan</h2>
        <p>Diskon tambahan untuk barang pilihan, buruan sebelum waktu habis.</p>
      </div>
      <div class="countdown" id="countdown">
        <div><div class="num" id="cd-h">00</div><div class="lbl">JAM</div></div>
        <div><div class="num" id="cd-m">00</div><div class="lbl">MENIT</div></div>
        <div><div class="num" id="cd-s">00</div><div class="lbl">DETIK</div></div>
      </div>
    </div>
  </div>
</section>

<section class="section" style="background:var(--cream);">
  <div class="wrap">
    <div class="section-head"><h2>Kenapa Pilih Relovié?</h2></div>
    <div class="cat-grid" style="grid-template-columns:repeat(4,1fr);">
      <div class="cat-item why-card" onclick="openWhyModal('lingkungan')">
        <div class="icon">🌿</div>
        <span>Ramah Lingkungan</span>
      </div>
      <div class="cat-item why-card" onclick="openWhyModal('kondisi')">
        <div class="icon">✅</div>
        <span>Kondisi Jujur & Transparan</span>
      </div>
      <div class="cat-item why-card" onclick="openWhyModal('harga')">
        <div class="icon">💸</div>
        <span>Harga Bersahabat</span>
      </div>
      <div class="cat-item why-card" onclick="openWhyModal('komunitas')">
        <div class="icon">🤝</div>
        <span>Komunitas Preloved Terpercaya</span>
      </div>
    </div>
  </div>
</section>

<div class="why-modal-overlay" id="whyModalOverlay" onclick="if(event.target===this) closeWhyModal()">
  <div class="why-modal">
    <button class="why-modal-close" onclick="closeWhyModal()">✕</button>
    <span class="why-modal-icon" id="whyIcon"></span>
    <h3 id="whyTitle"></h3>
    <p class="why-hook" id="whyHook"></p>
    <p id="whyBody"></p>
    <ul id="whyHighlights"></ul>
    <p class="why-closing-line" id="whyClosing"></p>
    <a href="#" class="why-cta" id="whyCta"></a>
  </div>
</div>
<section class="section" style="background:var(--cream);" id="produk-terbaru">
  <div class="wrap">
    <div class="section-head">
      <h2>Baru Diunggah</h2>
      <a href="#">Lihat semua</a>
    </div>

    <div class="prod-grid">

      <?php if (! empty($products)): ?>

        <?php foreach ($products as $p): ?>

          <?php
          $isOwner = session()->get('isLoggedIn')
              && session()->get('user_id') == ($p['user_id'] ?? null);

          $isWishlisted = session()->get('isLoggedIn')
    ? (new \App\Models\WishlistModel())->isWishlisted(session()->get('user_id'), $p['id'])
    : false;
          ?>

          <div class="prod-card">

            <div class="prod-img" style="position:relative;">

              <a href="/produk/<?= $p['id'] ?>" style="display:block; width:100%; height:100%;">

                <?php if (! empty($p['photo'])): ?>

                  <img
                    src="/uploads/products/<?= esc($p['photo']) ?>"
                    style="width:100%;height:100%;object-fit:cover;"
                  >

                <?php endif; ?>

              </a>

              <?php if (! $isOwner): ?>

                <a
                  href="/wishlist/<?= $isWishlisted ? 'hapus' : 'tambah' ?>/<?= $p['id'] ?>"
                  title="<?= $isWishlisted ? 'Hapus dari wishlist' : 'Simpan ke wishlist' ?>"
                  style="position:absolute; top:8px; right:8px; width:30px; height:30px; background:rgba(255,255,255,0.9); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:15px; text-decoration:none;"
                >
                  <?= $isWishlisted ? '❤️' : '♡' ?>
                </a>

              <?php endif; ?>

            </div>

            <div class="prod-body">

              <a
                href="/produk/<?= $p['id'] ?>"
                style="color:inherit; text-decoration:none; display:block;"
              >

                <div class="prod-cond">
                  <?= esc($p['condition'] ?? '-') ?>
                </div>

                <div class="prod-name">
                  <?= esc($p['name'] ?? '-') ?>
                </div>

                <div class="prod-price">
                  Rp<?= number_format($p['price'] ?? 0, 0, ',', '.') ?>
                </div>

                <div class="prod-meta">
                  <?= esc($p['category'] ?? '-') ?>
                  ·
                  <?= esc($p['location'] ?? '-') ?>
                </div>

              </a>

              <hr style="border:none; border-top:1px solid var(--line); margin:10px 0 8px;">

              <?php if ($isOwner): ?>

                <a
                  href="/produk/arsipkan/<?= $p['id'] ?>"
                  style="display:block; margin-top:4px; border:1px solid var(--amber); color:#8a6d2f; text-align:center; padding:8px; border-radius:6px; font-size:13px;"
                >
                  📦 Arsipkan
                </a>

                <a
                  href="/produk/hapus/<?= $p['id'] ?>"
                  onclick="return confirm('Hapus barang ini secara permanen?')"
                  style="display:block; margin-top:6px; border:1px solid #c0392b; color:#c0392b; text-align:center; padding:8px; border-radius:6px; font-size:13px;"
                >
                  🗑️ Hapus
                </a>

              <?php else: ?>

                <a
                  href="/checkout/langsung/<?= $p['id'] ?>"
                  style="display:block; margin-top:4px; background:var(--amber); color:var(--navy); text-align:center; padding:8px; border-radius:6px; font-size:13px; font-weight:600;"
                >
                  ⚡ Beli Sekarang
                </a>

                <a
                  href="/keranjang/tambah/<?= $p['id'] ?>"
                  style="display:block; margin-top:6px; background:#3F6A96; color:#fff; text-align:center; padding:8px; border-radius:6px; font-size:13px;"
                >
                  + Keranjang
                </a>

                <a
                  href="/chat?product_id=<?= $p['id'] ?>"
                  style="display:block; margin-top:6px; border:1px solid #A67C74; color:#A67C74; text-align:center; padding:8px; border-radius:6px; font-size:13px;"
                >
                  💬 Tanya Admin
                </a>

              <?php endif; ?>

            </div>

          </div>

        <?php endforeach; ?>

      <?php else: ?>

        <p>Belum ada barang diunggah.</p>

      <?php endif; ?>

    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head"><h2>Penjual Terpercaya</h2></div>
  </div>
  <?php if (empty($trustedSellers)): ?>
    <div class="wrap">
      <p style="color:#697A8C; font-size:14px;">Belum ada penjual terverifikasi saat ini.</p>
    </div>
  <?php else: ?>
    <div class="marquee-wrap">
      <div class="marquee-track">
        <?php
          // Digandakan cuma kalau sudah cukup banyak, biar animasi tetap mulus
          // tanpa keliatan "dobel" waktu penjualnya masih sedikit.
          $loopSellers = count($trustedSellers) >= 4
            ? array_merge($trustedSellers, $trustedSellers)
            : $trustedSellers;
        ?>
        <?php foreach ($loopSellers as $s): ?>
          <a href="/toko/<?= $s['id'] ?>" class="seller-card" style="display:block;">
            <?php if (! empty($s['avatar'])): ?>
              <div class="seller-avatar" style="background-image:url('/uploads/sellers/<?= esc($s['avatar']) ?>'); background-size:cover; background-position:center;"></div>
            <?php else: ?>
              <div class="seller-avatar" style="display:flex; align-items:center; justify-content:center; color:#fff; font-weight:600; font-size:20px;">
                <?= strtoupper(substr($s['shop_name'] ?? $s['name'], 0, 1)) ?>
              </div>
            <?php endif; ?>
            <h4><?= esc($s['shop_name']) ?></h4>
            <p><?= esc($s['city']) ?> · <?= $s['product_count'] ?> produk</p>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>
</section>

<section class="section" style="background:var(--cream);">
  <div class="wrap">
   <div class="section-head"><h2>Tips Seputar Preloved</h2></div>
<div class="blog-grid">

  <div class="blog-card" onclick="openBlogModal('kw')">
    <div class="blog-img blog-img-1">
      <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M22 10 L28 6 H36 L42 10 L50 16 L44 24 L38 20 V54 H26 V20 L20 24 L14 16 Z" fill="#FBF9F5" opacity="0.95"/>
        <circle cx="44" cy="40" r="13" fill="#E2A03F"/>
        <circle cx="44" cy="40" r="8" fill="none" stroke="#22344A" stroke-width="3"/>
        <line x1="50" y1="46" x2="57" y2="53" stroke="#22344A" stroke-width="4" stroke-linecap="round"/>
      </svg>
    </div>
    <h3>Jangan Sampai Ketipu Barang KW! <span class="arrow">▼</span></h3>
    <div class="blog-detail">
      <p>Barang branded palsu makin susah dibedain cuma dari foto. Sebelum transfer, luangkan waktu sebentar buat cek fisiknya langsung — banyak kasus penipuan yang sebenarnya bisa dihindari dari titik-titik kecil berikut ini.</p>
      <ol>
        <li>Cek label & jahitan — harus rapi, rata, tidak ada bekas lem</li>
        <li>Cocokkan bentuk logo dengan situs resmi brand</li>
        <li>Perhatikan kode produksi di label, biasanya ada di jahitan dalam</li>
        <li>Cium bahan — barang ori jarang berbau plastik/lem menyengat</li>
      </ol>
    </div>
  </div>

  <div class="blog-card" onclick="openBlogModal('gadget')">
    <div class="blog-img blog-img-2">
      <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="20" y="8" width="24" height="42" rx="4" fill="#FBF9F5"/>
        <rect x="24" y="14" width="16" height="26" rx="1" fill="#2C4E6E"/>
        <circle cx="32" cy="45" r="2.4" fill="#2C4E6E"/>
        <path d="M40 30 L45 35 L54 22" stroke="#4CAF50" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </div>
    <h3>HP/Laptop Bekas Aman Nggak, Sih? <span class="arrow">▼</span></h3>
    <div class="blog-detail">
      <p>Gadget bekas memang lebih hemat, tapi risikonya juga lebih besar kalau tidak dicek dulu. Kerusakan tersembunyi seperti baterai boros atau IMEI tidak terdaftar sering baru ketahuan belakangan. Ikuti langkah ini dulu sebelum deal.</p>
      <ol>
        <li>Nyalakan & tes semua tombol fisik satu per satu</li>
        <li>Cek kesehatan baterai lewat menu pengaturan</li>
        <li>Cek IMEI/nomor seri, cocokkan dengan yang ada di dus</li>
        <li>Coba kamera, speaker, dan layar sentuh secara langsung</li>
      </ol>
    </div>
  </div>

  <div class="blog-card" onclick="openBlogModal('harga')">
    <div class="blog-img blog-img-3">
      <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 30 L30 10 H50 V30 L30 50 Z" fill="#FBF9F5"/>
        <circle cx="42" cy="18" r="4" fill="#8A6D1D"/>
        <path d="M18 46 L46 18" stroke="#22344A" stroke-width="3" opacity="0.4"/>
        <text x="20" y="42" font-family="Georgia, serif" font-size="16" font-weight="700" fill="#22344A">Rp</text>
      </svg>
    </div>
    <h3>Harga Segini Wajar Nggak, ya? <span class="arrow">▼</span></h3>
    <div class="blog-detail">
      <p>Menentukan harga jual preloved sering bikin bingung — kemahalan susah laku, kemurahan rugi sendiri. Pakai patokan sederhana berikut biar harga yang kamu pasang tetap wajar dan bersaing.</p>
      <ol>
        <li>Cari harga barang baru sebagai patokan awal</li>
        <li>Kurangi sesuai usia pakai — makin lama makin turun</li>
        <li>Sesuaikan dengan kondisi fisik (mulus/ada cacat)</li>
        <li>Bandingkan dengan harga barang serupa di marketplace lain</li>
      </ol>
    </div>
  </div>
</div>
    </div>
  </div>
</section>
<!-- MODAL TIPS PRELOVED -->
<div class="blog-modal-overlay" id="blogModalOverlay" onclick="if(event.target===this) closeBlogModal()">

  <div class="blog-modal">

    <button class="blog-modal-close" onclick="closeBlogModal()">✕</button>

    <div class="blog-modal-icon" id="blogModalIcon"></div>

    <h3 id="blogModalTitle"></h3>

    <p id="blogModalBody"></p>

    <ol id="blogModalList"></ol>

  </div>

</div>

<section class="section">
  <div class="wrap">

    <div class="newsletter">

      <h2>Jangan ketinggalan barang incaranmu</h2>

      <p>
        Dapat kabar barang baru dan flash sale langsung ke email.
      </p>

      <form
        action="/newsletter/subscribe"
        method="post"
      >

        <?= csrf_field() ?>

        <input
          type="email"
          name="email"
          value="<?= session()->get('newsletter_email') ?? '' ?>"
          placeholder="Alamat email kamu"
          required
        >

        <button
          type="submit"
          class="btn-primary"
          style="border:none; cursor:pointer;"
        >
          Berlangganan
        </button>

      </form>

      <div style="margin-top:12px;">

        <a
          href="/berlangganan"
          style="
            font-size:12px;
            color:var(--navy);
            text-decoration:underline;
          "
        >
          ⚙️ Lihat & kelola langganan
        </a>

      </div>

    </div>

  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="sell-cta">
      <div>
        <h2>Ada barang yang sudah jarang dipakai?</h2>
        <p>Unggah dalam 5 menit, tanpa biaya pendaftaran.</p>
        <ul class="sell-cta-points">
          <li><span>⚡</span> Proses upload cuma 5 menit</li>
          <li><span>🆓</span> Gratis, tanpa biaya pendaftaran</li>
          <li><span>📦</span> Langsung tayang & dilihat ribuan pembeli</li>
        </ul>
      </div>
      <a href="/jual" class="btn-primary">Jual Barang Sekarang</a>
    </div>
  </div>
</section>

<footer>

  <div class="wrap">

    <div class="footer-grid">

      <!-- BRAND -->
      <div class="footer-brand">

        <div class="footer-logo">
          Relovié
        </div>

        <p>
          Pasar barang preloved untuk lemari dan laci gadget
          yang lebih berumur panjang.
        </p>

        <div class="footer-tagline">
          ♻️ Give things a second story.
        </div>

        <div class="footer-social">
          <a href="#" title="Instagram">◎</a>
          <a href="#" title="TikTok">♪</a>
          <a href="#" title="WhatsApp">◉</a>
          <a href="#" title="Email">✉</a>
        </div>

      </div>


      <!-- JELAJAHI -->
      <div class="footer-col">

        <h4>Jelajahi</h4>

        <ul>

          <li>
            <a href="/">Beranda</a>
          </li>

          <li>
            <a href="/produk">Semua Produk</a>
          </li>

          <li>
            <a href="#produk-terbaru">Produk Terbaru</a>
          </li>

          <li>
            <a href="#filter-bar-section">Cari & Filter</a>
          </li>

          <li>
            <a href="#produk-terbaru">Barang Preloved</a>
          </li>

          <li>
            <a href="#produk-terbaru">Penawaran Minggu Ini</a>
          </li>

        </ul>

      </div>


      <!-- KATEGORI -->
      <div class="footer-col">

        <h4>Kategori</h4>

        <ul>

          <li><a href="/kategori/Atasan">Atasan</a></li>
          <li><a href="/kategori/Bawahan">Bawahan</a></li>
          <li><a href="/kategori/Outerwear">Outerwear</a></li>
          <li><a href="/kategori/Sepatu">Sepatu</a></li>
          <li><a href="/kategori/Tas">Tas</a></li>
          <li><a href="/kategori/Elektronik">Elektronik</a></li>
          <li><a href="/kategori/Aksesoris">Aksesoris</a></li>

        </ul>

      </div>


      <!-- AKUN -->
      <div class="footer-col">

        <h4>Akun Saya</h4>

        <ul>

          <li><a href="/akun">Dashboard</a></li>
          <li><a href="/akun/profil">Profil Saya</a></li>
          <li><a href="/akun/pesanan">Pesanan Saya</a></li>
          <li><a href="/wishlist">Wishlist</a></li>
          <li><a href="/keranjang">Keranjang</a></li>
          <li><a href="/notifikasi">Notifikasi</a></li>

        </ul>

      </div>


      <!-- JUAL DI RELOVIÉ -->
      <div class="footer-col">

        <h4>Jual di Relovié</h4>

        <ul>

          <li><a href="/jual">Jual Barang</a></li>

          <li><a href="/jadi-penjual">Jadi Penjual</a></li>

          <li><a href="/jual/pesanan">Pesanan Penjual</a></li>

          <?php if (
              session()->get('isLoggedIn') &&
              session()->get('user_role') === 'penjual'
          ): ?>

            <li>
              <a href="/produk/arsip" class="footer-highlight">
                📦 Arsip Produk
              </a>
            </li>

          <?php endif; ?>

          <li><a href="/jual">Kelola Toko</a></li>
          <li><a href="/jual/pesanan">Kelola Pesanan</a></li>

        </ul>

      </div>


      <!-- PESANAN & PEMBAYARAN -->
      <div class="footer-col">

        <h4>Pesanan & Pembayaran</h4>

        <ul>

          <li><a href="/akun/pesanan?status=belum_dibayar">Belum Dibayar</a></li>
          <li><a href="/akun/pesanan?status=dikemas">Dikemas</a></li>
          <li><a href="/akun/pesanan?status=dikirim">Dikirim</a></li>
          <li><a href="/akun/pesanan?status=selesai">Selesai</a></li>
          <li><a href="/akun/pesanan?status=pengembalian">Pengembalian</a></li>

          <li>
            <span>Metode Pembayaran</span>
          </li>

          <li>
            <span>Rekening Bank</span>
          </li>

          <li>
            <span>E-Wallet</span>
          </li>

          <li>
            <span>Kartu Pembayaran</span>
          </li>

        </ul>

      </div>


      <!-- BANTUAN -->
      <div class="footer-col">

        <h4>Bantuan & Informasi</h4>

        <ul>

          <li><span>Pusat Bantuan</span></li>
          <li><span>FAQ</span></li>
          <li><span>Kebijakan Privasi</span></li>
          <li><span>Syarat & Ketentuan</span></li>
          <li><span>Kebijakan Pengembalian</span></li>
          <li><span>Tentang Relovié</span></li>
          <li><span>Hubungi Kami</span></li>

        </ul>

      </div>

    </div>


    <!-- BAGIAN PALING BAWAH -->
    <div class="footer-bottom">

      <div>

        <div class="footer-copy">
          © 2026 Relovié. Tugas Perancangan Portal — IIP FISIP Unair.
        </div>

        <div class="footer-note">
          Dibuat dengan HTML, CSS & JS.
        </div>

      </div>

      <div class="footer-meta">
        <span>♻️ Preloved lebih berkelanjutan</span>
        <span>🔒 Belanja dengan nyaman</span>
        <span>✨ Give things a second story</span>
      </div>

    </div>

  </div>

</footer>

<script>
  document.querySelectorAll('.stat-num').forEach(el => {
    const target = parseInt(el.dataset.target, 10);
    let current = 0;
    const step = Math.ceil(target / 60);
    const timer = setInterval(() => {
      current += step;
      if(current >= target){ current = target; clearInterval(timer); }
      el.textContent = current.toLocaleString('id-ID');
    }, 25);
  });

  const endTime = new Date().getTime() + (6*60*60*1000);
  function updateCountdown(){
    const now = new Date().getTime();
    const diff = Math.max(endTime - now, 0);
    const h = Math.floor(diff/(1000*60*60));
    const m = Math.floor((diff%(1000*60*60))/(1000*60));
    const s = Math.floor((diff%(1000*60))/1000);
    document.getElementById('cd-h').textContent = String(h).padStart(2,'0');
    document.getElementById('cd-m').textContent = String(m).padStart(2,'0');
    document.getElementById('cd-s').textContent = String(s).padStart(2,'0');
  }
  updateCountdown();
  setInterval(updateCountdown, 1000);
    const whyData = {
    lingkungan: {
      icon: '🌿',
      title: 'Ramah Lingkungan',
      hook: 'Setiap Barang yang Kamu Selamatkan, Bumi yang Berterima Kasih.',
      body: 'Industri fashion dan elektronik jadi salah satu penyumbang limbah terbesar di dunia — padahal banyak barang masih layak pakai, cuma butuh pemilik baru. Di Relovié, setiap transaksi berarti satu barang lolos dari tempat sampah dan dapat kesempatan kedua. Kamu nggak perlu jadi aktivis lingkungan buat mulai peduli — cukup mulai dari lemari sendiri.',
      highlights: ['♻️ Perpanjang umur pakai barang', '🌍 Kurangi jejak limbah tekstil & elektronik', '🛍️ Belanja tanpa rasa bersalah'],
      closing: 'Yuk, jadi bagian dari gerakan belanja yang lebih bertanggung jawab.',
      ctaText: 'Lihat Barang Preloved →',
      ctaLink: '#produk-terbaru'
    },
    kondisi: {
      icon: '✅',
      title: 'Kondisi Jujur & Transparan',
      hook: 'Nggak Ada Kejutan Setelah Paket Sampai.',
      body: 'Belanja preloved sering bikin was-was — takut barangnya nggak sesuai foto. Di Relovié, setiap barang punya label kondisi yang jelas (Like New, Good, atau Fair) yang bisa langsung kamu filter sebelum belanja, jadi kamu tahu persis apa yang bakal kamu dapat sebelum checkout. Kamu juga bisa langsung tanya-tanya ke admin/penjual lewat fitur chat kalau masih ada yang ingin dipastikan.',
      highlights: ['📸 Foto asli sesuai kondisi barang', '🏷️ Label kondisi jelas: Like New / Good / Fair — bisa langsung difilter', '💬 Bisa tanya langsung ke admin sebelum beli'],
      closing: 'Belanja preloved bukan berarti belanja untung-untungan.',
      ctaText: 'Cari Berdasarkan Kondisi →',
      ctaLink: '#filter-bar-section'
    },
    harga: {
      icon: '💸',
      title: 'Harga Bersahabat',
      hook: 'Kualitas Nggak Harus Bikin Kantong Bolong.',
      body: 'Pengen tampil kece tanpa nunggu gajian? Di Relovié, kamu bisa dapat barang branded, gadget, sampai outfit kekinian dengan harga jauh lebih ramah dibanding beli baru — tanpa harus mengorbankan kualitas. Lewat filter harga yang sudah tersedia (di bawah 50rb, 50rb–300rb, di atas 300rb), kamu bisa langsung cari barang yang pas sama isi dompet.',
      highlights: ['💰 Harga lebih hemat dari barang baru', '🎯 Filter harga sesuai budget kamu', '🛒 Kualitas tetap terjaga, kondisi tetap jelas'],
      closing: 'Kenapa bayar mahal kalau bisa dapat yang sama bagusnya dengan harga lebih masuk akal?',
      ctaText: 'Cari Sesuai Budget →',
      ctaLink: '#filter-bar-section'
    },
    komunitas: {
      icon: '🤝',
      title: 'Komunitas Preloved Terpercaya',
      hook: 'Tempat Ketemu Orang-Orang yang Sama Pedulinya.',
      body: 'Relovié bukan sekadar lapak jual-beli, tapi ruang untuk orang-orang yang percaya barang bekas pun bisa punya cerita baru. Di sini kamu bisa jadi pembeli sekaligus penjual, ngobrol langsung lewat fitur chat, dan membangun kepercayaan lewat transaksi yang jujur dan terbuka. Berbeda dari marketplace umum yang isinya campur aduk, Relovié fokus khusus di ekosistem preloved.',
      highlights: ['🫂 Komunitas pembeli & penjual yang fokus di preloved', '💬 Komunikasi mudah lewat fitur chat langsung', '🤝 Dibangun atas transaksi yang jujur dan terbuka'],
      closing: 'Gabung, dan jadi bagian dari komunitas yang percaya barang lama bisa berarti besar.',
      ctaText: 'Mulai Jual Barangmu →',
      ctaLink: '/jual'
    }
  };

  function openWhyModal(key) {
    const d = whyData[key];
    document.getElementById('whyIcon').textContent = d.icon;
    document.getElementById('whyTitle').textContent = d.title;
    document.getElementById('whyHook').textContent = d.hook;
    document.getElementById('whyBody').textContent = d.body;
    document.getElementById('whyClosing').textContent = d.closing;
    document.getElementById('whyCta').textContent = d.ctaText;
    document.getElementById('whyCta').href = d.ctaLink;
    const list = document.getElementById('whyHighlights');
    list.innerHTML = '';
    d.highlights.forEach(h => {
      const li = document.createElement('li');
      li.textContent = h;
      list.appendChild(li);
    });
    document.getElementById('whyModalOverlay').classList.add('active');
  }

  function closeWhyModal() {
    document.getElementById('whyModalOverlay').classList.remove('active');
  }
  // DATA TIPS PRELOVED
  const blogData = {
    kw: {
      icon: '👕',
      title: 'Jangan Sampai Ketipu Barang KW!',
      body: 'Barang branded palsu makin susah dibedain cuma dari foto. Sebelum transfer, luangkan waktu sebentar buat cek fisiknya langsung — banyak kasus penipuan yang sebenarnya bisa dihindari dari titik-titik kecil berikut ini.',
      list: [
        'Cek label & jahitan — harus rapi, rata, tidak ada bekas lem',
        'Cocokkan bentuk logo dengan situs resmi brand',
        'Perhatikan kode produksi di label, biasanya ada di jahitan dalam',
        'Cium bahan — barang ori jarang berbau plastik/lem menyengat'
      ]
    },

    gadget: {
      icon: '📱',
      title: 'HP/Laptop Bekas Aman Nggak, Sih?',
      body: 'Gadget bekas memang lebih hemat, tapi risikonya juga lebih besar kalau tidak dicek dulu. Kerusakan tersembunyi seperti baterai boros atau IMEI tidak terdaftar sering baru ketahuan belakangan. Ikuti langkah ini dulu sebelum deal.',
      list: [
        'Nyalakan & tes semua tombol fisik satu per satu',
        'Cek kesehatan baterai lewat menu pengaturan',
        'Cek IMEI/nomor seri, cocokkan dengan yang ada di dus',
        'Coba kamera, speaker, dan layar sentuh secara langsung'
      ]
    },

    harga: {
      icon: '💸',
      title: 'Harga Segini Wajar Nggak, ya?',
      body: 'Menentukan harga jual preloved sering bikin bingung — kemahalan susah laku, kemurahan rugi sendiri. Pakai patokan sederhana berikut biar harga yang kamu pasang tetap wajar dan bersaing.',
      list: [
        'Cari harga barang baru sebagai patokan awal',
        'Kurangi sesuai usia pakai — makin lama makin turun',
        'Sesuaikan dengan kondisi fisik (mulus/ada cacat)',
        'Bandingkan dengan harga barang serupa di marketplace lain'
      ]
    }
  };

  // BUKA MODAL TIPS
  function openBlogModal(key) {
    const d = blogData[key];

    document.getElementById('blogModalIcon').textContent = d.icon;
    document.getElementById('blogModalTitle').textContent = d.title;
    document.getElementById('blogModalBody').textContent = d.body;

    const list = document.getElementById('blogModalList');
    list.innerHTML = '';

    d.list.forEach(item => {
      const li = document.createElement('li');
      li.textContent = item;
      list.appendChild(li);
    });

    document.getElementById('blogModalOverlay').classList.add('active');
  }

  // TUTUP MODAL TIPS
  function closeBlogModal() {
    document.getElementById('blogModalOverlay').classList.remove('active');
  }
</script>

</body>
</html>