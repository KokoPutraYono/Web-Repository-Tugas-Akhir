@extends('layouts.master')

@section('title', 'Dassboard Admin')

@section('content')

    <div class="flex flex-wrap mb-7 md:mb-10">
        <!-- admin login -->
        <div class="w-full max-w-sm mt-4 bg-white p-2 border-2 border-blue-900 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 text-center mx-4">
            <img src="{{ asset('storage/images/dassboard_icon/jumlah_login.png') }}" class="w-32 h-32 md:w-36 md:h-36 mx-auto" alt="...">
            <div class="mt-5 px-5 pb-5">
                <h5 class="text-xl font-bold tracking-tight text-blue-900 dark:text-white">Admin Login</h5>
                <h5 class="text-xl font-semibold tracking-tight text-gray-800 dark:text-white">{{ session($adminLogin, 0) }} Orang</h5>
            </div>
        </div>

        <!-- user login -->
        <div class="w-full max-w-sm mt-4 bg-white p-2 border-2 border-blue-900 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 text-center mx-4">
            <img src="{{ asset('storage/images/dassboard_icon/jumlah_login.png') }}" class="w-32 h-32 md:w-36 md:h-36 mx-auto" alt="...">
            <div class="mt-5 px-5 pb-5">
                <h5 class="text-xl font-bold tracking-tight text-blue-900 dark:text-white">User Login</h5>
                <h5 class="text-xl font-semibold tracking-tight text-gray-800 dark:text-white">{{ session($userLogin, 0) }} Orang</h5>
            </div>
        </div>

        <!-- jumlah admin -->
        <div class="w-full max-w-sm mt-4 bg-white p-2 border-2 border-blue-900 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 text-center mx-4">
            <img src="{{ asset('storage/images/dassboard_icon/jumlah_user.png') }}" class="w-32 h-32 md:w-36 md:h-36 mx-auto" alt="...">
            <div class="mt-5 px-5 pb-5">
                <h5 class="text-xl font-bold tracking-tight text-blue-900 dark:text-white">Jumlah Admin</h5>
                <h5 class="text-xl font-semibold tracking-tight text-gray-800 dark:text-white">{{ $totalAdmin }} Orang</h5>
            </div>
        </div>

        <!-- jumlah user -->
        <div class="w-full max-w-sm mt-4 bg-white p-2 border-2 border-blue-900 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 text-center mx-4">
            <img src="{{ asset('storage/images/dassboard_icon/jumlah_user.png') }}" class="w-32 h-32 md:w-36 md:h-36 mx-auto" alt="...">
            <div class="mt-5 px-5 pb-5">
                <h5 class="text-xl font-bold tracking-tight text-blue-900 dark:text-white">Jumlah User</h5>
                <h5 class="text-xl font-semibold tracking-tight text-gray-800 dark:text-white">{{ $totalUser }} Orang</h5>
            </div>
        </div>

        <!-- jumlah tugas akhir -->
        <div class="w-full max-w-sm mt-4 bg-white p-2 border-2 border-blue-900 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 text-center mx-4">
            <img src="{{ asset('storage/images/dassboard_icon/jumlah_TA.png') }}" class="w-32 h-32 md:w-36 md:h-36 mx-auto" alt="...">
            <div class="mt-5 px-5 pb-5">
                <h5 class="text-xl font-bold tracking-tight text-blue-900 dark:text-white">Jumlah Tugas Akhir</h5>
                <h5 class="text-xl font-semibold tracking-tight text-gray-800 dark:text-white">{{ $totalTA }} Judul</h5>
            </div>
        </div>

        <!-- jumlah menunggu acc -->
        <div class="w-full max-w-sm mt-4 bg-white p-2 border-2 border-blue-900 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 text-center mx-4">
            <img src="{{ asset('storage/images/dassboard_icon/menunggu_acc.png') }}" class="w-32 h-32 md:w-36 md:h-36 mx-auto" alt="...">
            <div class="mt-5 px-5 pb-5">
                <h5 class="text-xl font-bold tracking-tight text-blue-900 dark:text-white">Jumlah Menunggu ACC</h5>
                <h5 class="text-xl font-semibold tracking-tight text-gray-800 dark:text-white">{{ $total_menungguACC }} Orang</h5>
            </div>
        </div>

        <!-- jumlah aplikasi TA -->
        <div class="w-full max-w-sm mt-4 bg-white p-2 border-2 border-blue-900 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 text-center mx-4">
            <img src="{{ asset('storage/images/dassboard_icon/jumlah_aplikasi.png') }}" class="w-32 h-32 md:w-36 md:h-36 mx-auto" alt="...">
            <div class="mt-5 px-5 pb-5">
                <h5 class="text-xl font-bold tracking-tight text-blue-900 dark:text-white">Jumlah Aplikasi TA</h5>
                <h5 class="text-xl font-semibold tracking-tight text-gray-800 dark:text-white">{{ $aplikasiTA }} Aplikasi</h5>
            </div>
        </div>

        <!-- jumlah link video TA -->
        <div class="w-full max-w-sm mt-4 bg-white p-2 border-2 border-blue-900 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 text-center mx-4">
            <img src="{{ asset('storage/images/dassboard_icon/jumlah_link_video.png') }}" class="w-32 h-32 md:w-36 md:h-36 mx-auto" alt="...">
            <div class="mt-5 px-5 pb-5">
                <h5 class="text-xl font-bold tracking-tight text-blue-900 dark:text-white">Jumlah Link VIdeo TA</h5>
                <h5 class="text-xl font-semibold tracking-tight text-gray-800 dark:text-white">{{ $linkVideo }} Link VIdeo</h5>
            </div>
        </div>

        <!-- jumlah prodi -->
        <div class="w-full max-w-sm mt-4 bg-white p-2 border-2 border-blue-900 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 text-center mx-4">
            <img src="{{ asset('storage/images/dassboard_icon/jumlah_prodi.png') }}" class="w-32 h-32 md:w-36 md:h-36 mx-auto" alt="...">
            <div class="mt-5 px-5 pb-5">
                <h5 class="text-xl font-bold tracking-tight text-blue-900 dark:text-white">Jumlah Prodi</h5>
                <h5 class="text-xl font-semibold tracking-tight text-gray-800 dark:text-white">12 Prodi</h5>
            </div>
        </div>

        <!-- jumlah user di nonaktif -->
        <div class="w-full max-w-sm mt-4 bg-white p-2 border-2 border-blue-900 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 text-center mx-4">
            <img src="{{ asset('storage/images/dassboard_icon/jumlah_user.png') }}" class="w-32 h-32 md:w-36 md:h-36 mx-auto" alt="...">
            <div class="mt-5 px-5 pb-5">
                <h5 class="text-xl font-bold tracking-tight text-blue-900 dark:text-white">Jumlah User Di Nonaktif</h5>
                <h5 class="text-xl font-semibold tracking-tight text-gray-800 dark:text-white">{{ $statusNonaktif }} Orang</h5>
            </div>
        </div>

    </div>


@endsection