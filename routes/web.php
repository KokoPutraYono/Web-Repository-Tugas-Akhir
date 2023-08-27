<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    loginController, adminController, userController, publicController, fileController, NotificationController
};



// Beranda Publik
Route::get('/', [publicController::class, 'show_beranda_publik']);

// Login
Route::get('/login', [loginController::class, 'showLogin'])->name('login')->middleware('guest');
// login store
Route::post('/login-store', [loginController::class, 'storeLogin']);
// logout
Route::post('/logout', [loginController::class, 'logout']);

// Register
Route::get('/register', [loginController::class, 'showRegister'])->name('register');
// register store
Route::post('/register-store', [loginController::class, 'store']);

// lupa password
Route::get('/lupa-password', [loginController::class, 'lupaPassword']);
// store 
Route::post('/store-lupa-password', [loginController::class, 'sendResetLinkEmail'])->name('store-lupa-password');

Route::get('/reset-password', [loginController::class, 'resetPassword'])->name('reset-password');
Route::post('/update-password', [loginController::class, 'updatePassword'])->name('update-password');





Route::middleware(['auth'])->group(function () {

    // Menu yang bisa di akses siapa saja yang login
        // profile image
        Route::get('/profile-image/{id}', [loginController::class, 'showImage_profile'])->name('profile-image');

        // show download file tugas akhir
            Route::get('/daftar-tugas-akhir-detail-file/{nama_file}/{id}', [adminController::class, 'show_daftar_tugas_akhir_file'])->name('daftar-tugas-akhir-detail-file');

        // Menu Beranda
            // show menu beranda
            Route::get('/beranda', [userController::class, 'show_beranda'])->name('beranda');
            // show menu beranda detail
            Route::get('/beranda-detail/{id}', [userController::class, 'show_beranda_detail']);
            // show download beranda file
            Route::get('/beranda-detail-file/{nama_file}/{id}', [userController::class, 'show_beranda_file'])->name('beranda-detail-file');

        // Menu Notifikasi
            // show menu notifikasi
            Route::get('/notifikasi', [NotificationController::class, 'show_notifikasi'])->name('notifikasi');
            // sudah dibaca notifikasi
            Route::post('/notifikasi-read/{id}', [NotificationController::class, 'read_notifikasi']);
            // destroy notifikasi
            Route::post('/notifikasi/{id}', [NotificationController::class, 'destroy_notifikasi']);

        // Menu Pengaturan Akun
            // show menu pengaturan akun
            Route::get('/pengaturan-akun', [userController::class, 'show_pengaturan_akun'])->name('pengaturan-akun');
            // show edit pengaturan akun
            Route::get('/edit-pengaturan-akun/{id}', [userController::class, 'show_edit_pengaturan_akun']);
            // store edit pengaturan akun
            Route::post('/store-data-pengaturan-akun/{id}', [userController::class, 'store_data_pengaturan_akun']);
});


    // rute yang hanya dapat diakses oleh super admin dan admin
    Route::middleware(['auth', 'admin'])->group(function () {
        // Menu Admin
            // Menu Dassboard Admin
                // show menu dassboard admin
                Route::get('/dassboard-admin', [adminController::class, 'show_dassboard_admin']);


            // Menu Menunggu ACC
                // show menu menunggu acc
                Route::get('/menunggu-acc', [adminController::class, 'show_menunggu_acc'])->name('menunggu-acc');
                // show menu menunggu acc detail
                Route::get('/menunggu-acc-detail/{id}', [adminController::class, 'show_menunggu_acc_detail']);
                // ACC tugas akhir
                Route::post('/acc-tugas-akhir/{id}', [adminController::class, 'acc_tugas_akhir']);
                // tolak tugas akhir
                Route::post('/tolak-tugas-akhir/{id}', [adminController::class, 'tolak_tugas_akhir']);


            // Menu Daftar di ACC/Tolak
                // show daftar di accc/tolak
                Route::get('/daftar-status-acc', [adminController::class, 'show_daftar_status_acc'])->name('daftar-status-acc');


            // Menu Admin
            // Menu Daftar Tugas Akhir
                // show menu daftar tugas akhir
                Route::get('/daftar-tugas-akhir', [adminController::class, 'show_daftar_tugas_akhir'])->name('daftar-tugas-akhir');
                // show menu daftar tugas akhir detail
                Route::get('/daftar-tugas-akhir-detail/{id}', [adminController::class, 'show_daftar_tugas_akhir_detail']);
            

            // Menu Informasi Menu
                // show menu info menu
                Route::get('/info-menu', [adminController::class, 'show_info_menu']);


            // Menu Halaman Daftar User
                // show menu daftar user
                Route::get('/daftar-user', [adminController::class, 'show_daftar_user'])->name('daftar-user');
                // show menu daftar user detail
                Route::get('/user-detail/{id}', [adminController::class, 'show_daftar_user_detail']);

    });




    // rute yang hanya dapat diakses oleh super admin
    Route::middleware(['auth', 'super admin'])->group(function () {

        // Menu Admin
            // Menu Daftar Tugas Akhir
                // destroy tugas akhir
                Route::post('/destroy-tugas-akhir/{id}', [adminController::class, 'destroy_tugas_akhir']);

            // Menu Pengaturan Tugas Akhir
                // show menu pengaturan tugas akhir
                Route::get('/pengaturan-tugas-akhir', [adminController::class, 'show_pengaturan_TA'])->name('pengaturan-tugas-akhir');
                // store menu pengaturan tugas akhir
                Route::put('/store-pengaturan-TA/{id}', [adminController::class, 'store_pengaturan_TA']);

            // Menu Halaman Admin
                // show menu daftar admin
                Route::get('/daftar-admin', [adminController::class, 'show_daftar_admin'])->name('daftar-admin');
                // show menu daftar admin detail
                Route::get('/daftar-admin-detail/{id}', [adminController::class, 'show_daftar_admin_detail']);
                // show menu tambah admin
                Route::get('/tambah-admin', [adminController::class, 'show_tambah_admin'])->name('tambah-admin');
                // store tambah admin
                Route::post('/store-tambah-admin', [adminController::class, 'store_admin']);
                // show menu edit admin
                Route::get('/edit-admin/{id}', [adminController::class, 'show_edit_admin']);
                // store edit admin
                Route::post('/store-edit-admin/{id}', [adminController::class, 'store_edit_admin']);
                // destroy admin
                Route::post('/destroy-admin/{id}', [adminController::class, 'destroy_admin']);
            
            // show menu daftar user non-aktif
                Route::get('/user-nonaktif', [adminController::class, 'show_user_nonaktif'])->name('user-nonaktif');
                // show menu user non-aktif detail
                Route::get('/user-nonaktif-detail/{id}', [adminController::class, 'show_user_nonaktif_detail']);
                // store data user aktif
                Route::post('/aktif-user/{id}', [adminController::class, 'store_user_aktif']);
                // destroy data user nonaktif
                Route::post('/hapus-user-nonaktif/{id}', [adminController::class, 'destroy_user_nonaktif']);

            // Menu Input NIM User
                // show menu daftar nim
                Route::get('/daftar-nim-user', [adminController::class, 'show_daftar_nim'])->name('daftar-nim-user');
                // show menu edit nim
                Route::get('/edit-nim-user/{id}', [adminController::class, 'show_edit_nim']);
                // store edit nim user
                Route::put('/store-edit-nim/{id}', [adminController::class, 'store_edit_nim']);
                // hapus nim user
                Route::post('/hapus-nim/{id}', [adminController::class, 'destroy_nim']);
                
                // show menu tambah nim
                Route::get('/tambah-nim-user', [adminController::class, 'show_tambah_nim'])->name('tambah-nim-user');
                // store data nim
                Route::post('/store-nim-user', [adminController::class, 'store_nim_user']);

                // store data user nonaktif
                Route::post('/nonaktif-user/{id}', [adminController::class, 'store_user_nonaktif']);
                // destroy data user 
                Route::post('/hapus-user/{id}', [adminController::class, 'destroy_user']);

                // destroy daftar status
                Route::post('/hapus-daftar-status/{id}', [adminController::class, 'destroy_daftar_status']);
    });





    // rute yang hanya dapat diakses oleh user
    Route::middleware(['auth', 'user'])->group(function () {
        // Menu Input Tugas Akhir
            // show menu input tugas akhir
            Route::get('/input-tugas-akhir', [userController::class, 'show_menu_input_TA'])->name('input-tugas-akhir');
            // store tugas akhir
            Route::post('/store-tugas-akhir', [userController::class, 'store_TA']);
    });
