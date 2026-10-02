<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');

$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::attemptRegister');

$routes->get('/logout', 'Auth::logout');

$routes->get('/jual', 'Product::create');
$routes->post('/jual', 'Product::store');

$routes->get('/kategori/(:segment)', 'Product::category/$1');

$routes->get('/produk', 'Product::browse');
$routes->get('/produk/(:num)', 'Product::show/$1');

$routes->get('/produk/edit/(:num)', 'Product::edit/$1');
$routes->post('/produk/update/(:num)', 'Product::update/$1');

$routes->get('/produk/arsipkan/(:num)', 'Product::arsipkan/$1');
$routes->get('/produk/hapus/(:num)', 'Product::hapus/$1');

$routes->get('/produk/arsip', 'Product::arsip');
$routes->get('/produk/aktifkan/(:num)', 'Product::aktifkan/$1');

$routes->get('/scan', 'Scan::index');
$routes->post('/scan/proses', 'Scan::proses');

$routes->get('/toko/(:num)', 'Toko::index/$1');
$routes->get('/toko/(:num)/chat', 'Chat::withSeller/$1');
$routes->post('/toko/(:num)/chat/kirim', 'Chat::sendToSeller/$1');

$routes->get('/jual/chat', 'Chat::sellerIndex');
$routes->get('/jual/chat/(:num)', 'Chat::sellerView/$1');
$routes->post('/jual/chat/(:num)/balas', 'Chat::sellerReply/$1');

$routes->get('/jual/pesanan', 'Seller::pesanan');
$routes->get('/jual/pesanan/detail/(:num)', 'Seller::detailPesanan/$1');
$routes->post('/jual/pesanan/kirim/(:num)', 'Seller::pesananKirim/$1');

$routes->post('/jual/pesanan/pengembalian/setujui/(:num)', 'Seller::setujuiPengembalian/$1');
$routes->post('/jual/pesanan/pengembalian/tolak/(:num)', 'Seller::tolakPengembalian/$1');

$routes->get('/keranjang', 'Cart::index');
$routes->get('/keranjang/tambah/(:num)', 'Cart::add/$1');
$routes->get('/keranjang/hapus/(:num)', 'Cart::remove/$1');
$routes->get('/keranjang/jumlah/(:num)/(:segment)', 'Cart::updateQuantity/$1/$2');
$routes->get('/checkout/langsung/(:num)', 'Cart::beliSekarang/$1');

$routes->get('/akun', 'Account::index');

$routes->get('/jadi-penjual', 'Seller::daftar');
$routes->post('/jadi-penjual', 'Seller::store');

$routes->get('/chat', 'Chat::index');
$routes->post('/chat/kirim', 'Chat::send');

$routes->get('/admin/chat', 'Chat::adminIndex');
$routes->get('/admin/chat/(:num)', 'Chat::adminView/$1');
$routes->post('/admin/chat/(:num)/balas', 'Chat::adminReply/$1');

$routes->get('/admin/seller', 'AdminSeller::index');
$routes->get('/admin/seller/(:num)', 'AdminSeller::detail/$1');
$routes->post('/admin/seller/(:num)/approve', 'AdminSeller::approve/$1');
$routes->post('/admin/seller/(:num)/reject', 'AdminSeller::reject/$1');

$routes->get('/wishlist', 'Wishlist::index');
$routes->get('/wishlist/tambah/(:num)', 'Wishlist::add/$1');
$routes->get('/wishlist/hapus/(:num)', 'Wishlist::remove/$1');

/*
|--------------------------------------------------------------------------
| NEWSLETTER
|--------------------------------------------------------------------------
*/

$routes->get('/berlangganan', 'Newsletter::index');
$routes->post('/newsletter/subscribe', 'Newsletter::subscribe');
$routes->post('/newsletter/preferences', 'Newsletter::updatePreferences');
$routes->post('/newsletter/unsubscribe', 'Newsletter::unsubscribe');

/*
|--------------------------------------------------------------------------
| NOTIFIKASI
|--------------------------------------------------------------------------
*/

$routes->get('/notifikasi', 'Notification::index');
$routes->get('/notifikasi/baca/(:num)', 'Notification::read/$1');
$routes->get('/notifikasi/baca-semua', 'Notification::readAll');
$routes->get('/notifikasi/terbaru', 'Notification::latestUnread');

/* CHECKOUT */
$routes->get('/keranjang/checkout-pilihan', 'Cart::checkoutDariKeranjang');

$routes->get('/keranjang/checkout', 'Cart::checkout');

$routes->post('/keranjang/checkout/konfirmasi', 'Cart::konfirmasiCheckout');

$routes->post(
    '/keranjang/checkout-pilihan/konfirmasi',
    'Cart::konfirmasiCheckoutDariKeranjang'
);


/*
|--------------------------------------------------------------------------
| AKUN
|--------------------------------------------------------------------------
*/

$routes->get('/akun/profil', 'Account::profil');
$routes->post('/akun/profil', 'Account::simpanProfil');

$routes->get('/akun/pesanan', 'Account::pesanan');
$routes->get('/akun/pesanan/bayar/(:num)', 'Account::bayar/$1');
$routes->post('/akun/pesanan/bayar/(:num)', 'Account::prosesBayar/$1');
$routes->get('/akun/pesanan/selesai/(:num)', 'Account::pesananSelesai/$1');
$routes->get('/akun/pesanan/pengembalian/(:num)', 'Account::ajukanPengembalian/$1');

$routes->get('/akun/pengaturan', 'Account::pengaturan');

$routes->get('/akun/pengaturan/ewallet', 'Account::ewallet');

$routes->get('/akun/pengaturan/alamat', 'Account::alamat');
$routes->get('/akun/pengaturan/rekening/tambah', 'Account::');
$routes->post('/akun/pengaturan/rekening/simpan', 'Account::simpanRekening');
$routes->get('/akun/pengaturan/rekening/utama/(:num)', 'Account::jadikanRekeningUtama/$1');
$routes->get('/akun/pengaturan/rekening/hapus/(:num)', 'Account::hapusRekening/$1');
$routes->get('/akun/pengaturan/kartu/tambah', 'Account::tambahKartu');
$routes->post('/akun/pengaturan/kartu/simpan', 'Account::simpanKartu');
$routes->get('/akun/pengaturan/alamat/tambah', 'Account::tambahAlamat');
$routes->post('/akun/pengaturan/alamat/simpan', 'Account::simpanAlamat');
$routes->get('/akun/pengaturan/alamat/utama/(:num)', 'Account::jadikanAlamatUtama/$1');

$routes->get('/akun/pengaturan/keamanan', 'Account::keamanan');
$routes->post('/akun/pengaturan/keamanan', 'Account::simpanKeamanan');

$routes->get('/akun/pengaturan/hapus-akun', 'Account::hapusAkun');
$routes->post('/akun/pengaturan/hapus-akun', 'Account::konfirmasiHapusAkun');

// Route pengaturan lainnya
$routes->get('/akun/pengaturan/chat', 'Account::pengaturanChat');
$routes->get('/akun/pengaturan/pesanan', 'Account::pengaturanPesanan');
$routes->get('/akun/pengaturan/notifikasi', 'Account::pengaturanNotifikasi');
$routes->get('/akun/pengaturan/privasi', 'Account::pengaturanPrivasi');
$routes->get('/akun/pengaturan/blokir', 'Account::pengaturanBlokir');
$routes->get('/akun/pengaturan/bahasa', 'Account::pengaturanBahasa');
$routes->get('/akun/pengaturan/(:segment)', 'Account::pengaturanDetail/$1');