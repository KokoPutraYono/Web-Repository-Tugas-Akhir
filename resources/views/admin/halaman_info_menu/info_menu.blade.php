@extends('layouts.master')

@section('title', 'Hlaman Informasi Menu')

@section('content')
    <h2 class="text-blue-900 text-center font-bold text-xl md:text-3xl mt-4">INFO MENU</h2>
    <p class="text-sm font-bold text-center mt-2 md:text-lg">
        Menu Info adalah menu informasi tentang menu-menu yang ada di dalam website Repository Tugas Akhir. Menu ini menjelaskan secara rinci tentang fitur yang ada pada masing-masing menu.
    </p>

    <!-- menu beranda -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        1. Menu Beranda.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Beranda berfungsi untuk menampilkan tugas akhir yang sudah lolos ACC. Menu beranda ini selain tersedia pada administrator juga tersedia pada mahasiswa. Menu beranda hanya menampilkan file-file yang hanya di izinkan oleh admin.
        <img src="{{ asset('storage/images/info_menu/beranda.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu beranda detail -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        1.1. Menu Beranda Detail.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Beranda Detail berfungsi untuk menampilkan detail dari file tugas akhir yang di pilih.
        <img src="{{ asset('storage/images/info_menu/beranda_detail.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu beranda detail (file) -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        1.2. Menu Beranda Detail (File).
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Beranda Detail (File) berfungsi untuk menampilkan file-file tugas akhir yang sudah di izinkan oleh admin ataupun super admin. 
        <img src="{{ asset('storage/images/info_menu/beranda_detail_file.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu beranda detail (abstrak) -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        1.3. Menu Beranda Detail (Abstrak).
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Beranda Detail (Abstrak) berfungsi untuk menampilkan abstrak tugas akhir yang di pilih. 
        <img src="{{ asset('storage/images/info_menu/beranda_detail_file.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Dassboard -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        2. Menu Dassboard.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Dassboard berfungsi untuk menampilkan informasi-informasi seperti gambar di bawah ini.
        <img src="{{ asset('storage/images/info_menu/dassboard.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Daftar Tugas Akhir -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        3. Menu Daftar Tugas Akhir.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Daftar Tugas Akhir berfungsi untuk menampilkan tugas akhir yang sudah lolos ACC. Menu ini menampilkan file-file yang berifat private dan public. Berbeda dengan Menu Beranda yang hanya menampilkan file-file yang public Menu Daftar Tugas Akhir ini menampilkan semua file tugas akhir. Menu ini hanya tersedia di admin dan super admin. Tampilan button hapus pada menu ini hanya bisa di akses oleh super admin saja.
        <img src="{{ asset('storage/images/info_menu/daftar_tugas_akhir.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Daftar Tugas Akhir Detail -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        3.1. Menu Daftar Tugas Akhir Detail.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Daftar Tugas Akhir Detail berfungsi untuk menampilkan tugas akhir yang sudah lolos ACC. Menu ini menampilkan file-file yang berifat private dan public.
        <img src="{{ asset('storage/images/info_menu/daftar_tugas_akhir_detail_file.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Menunggu ACC -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        4. Menu Menunggu ACC.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Menunggu ACC berfungsi untuk menampilkan tugas akhir yang di inputkan oleh mahasiswa. Pada menu ini tugas akhir mahasiswa belum tersedia pada menu beranda ataupun pada menu daftar tugas akhir. Jika mahasiswa sudah di ACC baru tugas akhirnya tersedia pada menu beranda ataupun pada menu daftar tugas akhir.
        <img src="{{ asset('storage/images/info_menu/menunggu_acc.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Menunggu ACC Detail -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        4.1. Menu Menunggu ACC Detail.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Menunggu ACC Detail sama seperti beberapa menu sebelumnya yaitu menampilkan tugas akhir yang di pilih. Perbedaannya hanya ada button ACC atau Tolak pada bagian bawah untuk mempermudah admin ataupun super admin untuk melihat tugas akhir secara detail.
        <img src="{{ asset('storage/images/info_menu/menunggu_acc_detail.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Daftar ACC atau Tolak -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        5. Menu Daftar ACC atau Tolak.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Daftar ACC atau Tolak berfungsi sebagai story dalam meng-ACC atau menolak tugas akhir mahasiswa. Pada menu ini bisa kelihatan siapa saja yang meng-ACC dan keterangannya dalam menolak tugas akhir mahasiswa.
        <img src="{{ asset('storage/images/info_menu/daftar_acc_atau_tolak.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Pengaturan Tugas Akhir -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        6. Menu Pengaturan Tugas Akhir.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Pengaturan Tugas Akhir berfungsi untuk mengatur file-file tugas akhir mahasiswa apakah mau di Public atau di Private dari para mahasiswa.
        <img src="{{ asset('storage/images/info_menu/pengaturan_tugas_akhir.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Admin -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        7. Menu Admin.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Admin berfungsi untuk melihat para admin dan super admin.
        <img src="{{ asset('storage/images/info_menu/halaman_admin.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Admin Detail -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        7.1. Menu Admin Detail.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Admin Detail berfungsi untuk melihat admin ataupun super admin secara detail.
        <img src="{{ asset('storage/images/info_menu/halaman_admin_detail.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Admin Tambah -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        7.2. Menu Admin Tambah.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Admin Tambah berfungsi untuk menambahkan super admin dan juga admin. Di sini salah satu perbedaan admin dan super admin yaitu pada admin tidak bisa menambah, mengedit, dan menghapus admin apalagi super admin.
        <img src="{{ asset('storage/images/info_menu/halaman_admin_tambah.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Admin Edit -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        7.3. Menu Admin Edit.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Admin Edit berfungsi untuk mengedit admin yang dipilih.
        <img src="{{ asset('storage/images/info_menu/halaman_admin_edit.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Input NIM User -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        8. Menu Input NIM.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Input NIM Mahasiswa berfungsi untuk memfilter NIM mana saja yang di izinkan untuk register. Jika NIM pada menu ini tidak di isi atau bahkan kosong, maka mahasiswa yang login dengan nim yang belum terdaftar tidak akan bisa register. Hanya bisa register ketika NIM nya sudah terdaftar pada menu ini.
        <img src="{{ asset('storage/images/info_menu/input_nim_user.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Input NIM User Tambah -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        8.1. Menu Input NIM User Tambah.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Input NIM mahasiswa Tambah berfungsi untuk menambahkan NIM mahasiswa yang akan di izinkan untuk register. Tidak perlu mengisi nim mahasiswa satu persatu. Langsung saja mengisi nim mahasiswa perkelas seperti pada gambar.
        <img src="{{ asset('storage/images/info_menu/input_nim_user_tambah.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Input NIM User Edit -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        8.2. Menu Input NIM Edit.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Input NIM mahasiswa Edit berfungsi untuk mengedit NIM mahasiswa yang di pilih. Tidak perlu mengisi nim mahasiswa satu persatu. Langsung saja mengisi nim mahasiswa perkelas seperti pada gambar.
        <img src="{{ asset('storage/images/info_menu/input_nim_user_edit.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Daftar User -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        9. Menu Daftar Mahasiswa.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Daftar Mahasiswa berfungsi untuk melihat para mahasiswa dan berfungsi untuk menonaktifkan mahasiswa yang dipilih.
        <img src="{{ asset('storage/images/info_menu/daftar_user.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Daftar User Detail -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        9.1. Menu Daftar Mahasiswa Detail.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Daftar Mahasiswa berfungsi untuk melihat mahasiswa yang dipilih.
        <img src="{{ asset('storage/images/info_menu/daftar_user_detail.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Daftar User NonAktif -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        10. Menu Daftar Mahasiswa NonAktif.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Daftar Mahasiswa NonAktif berfungsi untuk melihat para mahasiswa yang di nonaktifkan dan berfungsi untuk mengaktifkan mahasiswa yang dipilih.
        <img src="{{ asset('storage/images/info_menu/user_nonaktif.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Daftar User NonAktif Detail -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        10.1. Menu Daftar Mahasiswa NonAktif Detail.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Daftar Mahasiswa NonAktif Detail berfungsi untuk melihat mahasiswa yang dipilih.
        <img src="{{ asset('storage/images/info_menu/user_nonaktif_detail.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Notifikasi -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        11. Menu Notifikasi.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Notifikasi berfungsi untuk menampilkan notifikasi yang masuk.
        <img src="{{ asset('storage/images/info_menu/user_nonaktif_detail.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Pengaturan Akun -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        11. Menu Pengaturan Akun.
    </h3>
    <p class="text-sm text-justify md:font-bold md:text-lg">
        Menu Pengaturan Akun berfungsi untuk menampilkan informasi akun.
        <img src="{{ asset('storage/images/info_menu/pengaturan_akun.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>

    <!-- menu Pengaturan Akun -->
    <h3 class="text-blue-900 font-bold text-lg md:text-2xl mt-8 md:mt-14">
        11.1. Menu Pengaturan Akun Edit.
    </h3>
    <p class="text-sm mb-14 text-justify md:font-bold md:text-lg">
        Menu Pengaturan Akun Edit berfungsi untuk mengedit data akun.
        <img src="{{ asset('storage/images/info_menu/pengaturan_akun_edit.png') }}" class="w-9/12 h-9/12" alt="...">
    </p>
@endsection