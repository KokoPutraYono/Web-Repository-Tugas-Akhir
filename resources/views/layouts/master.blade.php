<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>

    <aside id="separator-sidebar" class="fixed left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-blue-900 dark:bg-gray-800">

            <!-- logo tedc ketika mode desktop -->
            <div class="hidden sm:block">
                <a href="https://flowbite.com/" class="flex items-center">
                    <img src="{{ asset('images/logoTEDC.png') }}" class="h-9 ml-2 mr-3 sm:h-9" alt="Politeknik TEDC Bandung Logo" />
                    <span class="self-center text-xl text-green-300 font-semibold whitespace-nowrap dark:text-white">Repository TA</span>
                </a>
            </div>
        
        @auth
            <ul class="space-y-2 mt-6 pt-4 border-t border-green-300">
                <!-- beranda -->
                <li>
                    <a href="/beranda" class="flex items-center p-2 text-base font-normal text-green-50 rounded-lg dark:text-white hover:bg-green-700 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-300">
                            <path d="M11.7 2.805a.75.75 0 01.6 0A60.65 60.65 0 0122.83 8.72a.75.75 0 01-.231 1.337 49.949 49.949 0 00-9.902 3.912l-.003.002-.34.18a.75.75 0 01-.707 0A50.009 50.009 0 007.5 12.174v-.224c0-.131.067-.248.172-.311a54.614 54.614 0 014.653-2.52.75.75 0 00-.65-1.352 56.129 56.129 0 00-4.78 2.589 1.858 1.858 0 00-.859 1.228 49.803 49.803 0 00-4.634-1.527.75.75 0 01-.231-1.337A60.653 60.653 0 0111.7 2.805z" />
                            <path d="M13.06 15.473a48.45 48.45 0 017.666-3.282c.134 1.414.22 2.843.255 4.285a.75.75 0 01-.46.71 47.878 47.878 0 00-8.105 4.342.75.75 0 01-.832 0 47.877 47.877 0 00-8.104-4.342.75.75 0 01-.461-.71c.035-1.442.121-2.87.255-4.286A48.4 48.4 0 016 13.18v1.27a1.5 1.5 0 00-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.661a6.729 6.729 0 00.551-1.608 1.5 1.5 0 00.14-2.67v-.645a48.549 48.549 0 013.44 1.668 2.25 2.25 0 002.12 0z" />
                            <path d="M4.462 19.462c.42-.419.753-.89 1-1.394.453.213.902.434 1.347.661a6.743 6.743 0 01-1.286 1.794.75.75 0 11-1.06-1.06z" />
                        </svg>
                        <span class="ml-3 font-bold">Beranda</span>
                    </a>
                </li>
            
            @if (auth()->user()->user_status == 'user')
                <!-- input tugas akhir -->
                <li>
                    <a href="/input-tugas-akhir" class="flex items-center p-2 text-base font-normal text-green-50 rounded-lg dark:text-white hover:bg-green-700 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-300"><path fill-rule="evenodd" d="M19.5 21a3 3 0 003-3V9a3 3 0 00-3-3h-5.379a.75.75 0 01-.53-.22L11.47 3.66A2.25 2.25 0 009.879 3H4.5a3 3 0 00-3 3v12a3 3 0 003 3h15zm-6.75-10.5a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V10.5z" clip-rule="evenodd" /></svg>
                        <span class="ml-3 font-bold">Input Tugas Akhir</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->user_status == 'admin' || auth()->user()->user_status == 'super admin')
                <!-- dassboard -->
                <li>
                    <a href="/dassboard-admin" class="flex items-center p-2 text-base font-normal text-green-50 rounded-lg dark:text-white hover:bg-green-700 dark:hover:bg-gray-700">
                        <svg aria-hidden="true" class="w-6 h-6 text-green-300 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                        <span class="ml-3 font-bold">Dashboard</span>
                    </a>
                </li>

                <!-- Tugas akhir -->
                <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-green-700 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-tugas_akhir" data-collapse-toggle="dropdown-tugas_akhir">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-300"><path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zM9.75 17.25a.75.75 0 00-1.5 0V18a.75.75 0 001.5 0v-.75zm2.25-3a.75.75 0 01.75.75v3a.75.75 0 01-1.5 0v-3a.75.75 0 01.75-.75zm3.75-1.5a.75.75 0 00-1.5 0V18a.75.75 0 001.5 0v-5.25z" clip-rule="evenodd" /><path d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z" /></svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap text-white font-bold">Tugas Akhir</span>
                    <svg sidebar-toggle-item class="w-6 h-6 text-green-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="dropdown-tugas_akhir" class="hidden">

                    <!-- daftar tugas akhir -->
                    <li>
                        <a href="/daftar-tugas-akhir" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-green-700 dark:text-white dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-green-300"><path d="M11.625 16.5a1.875 1.875 0 100-3.75 1.875 1.875 0 000 3.75z" /><path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zm6 16.5c.66 0 1.277-.19 1.797-.518l1.048 1.048a.75.75 0 001.06-1.06l-1.047-1.048A3.375 3.375 0 1011.625 18z" clip-rule="evenodd" /><path d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z" /></svg>
                            <span class="flex-1 ml-2 text-left whitespace-nowrap text-white">Daftar Tugas Akhir</span>
                        </a>
                    </li>

                    @if (auth()->user()->jabatan == 'Prodi')
                    <!-- menunggu acc -->
                    <li>
                        <a href="/menunggu-acc" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-green-700 dark:text-white dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-green-300"><path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" clip-rule="evenodd" /><path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" /></svg>
                            <span class="flex-1 ml-2 text-left whitespace-nowrap text-white">Menunggu ACC</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->user_status == 'admin' || auth()->user()->user_status == 'super admin')
                    <!-- daftar TA di ACC/Tolak -->
                    <li>
                        <a href="/daftar-status-acc" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-green-700 dark:text-white dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-green-300"><path d="M11.625 16.5a1.875 1.875 0 100-3.75 1.875 1.875 0 000 3.75z" /><path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zm6 16.5c.66 0 1.277-.19 1.797-.518l1.048 1.048a.75.75 0 001.06-1.06l-1.047-1.048A3.375 3.375 0 1011.625 18z" clip-rule="evenodd" /><path d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z" /></svg>
                            <span class="flex-1 ml-2 text-left whitespace-nowrap text-white">Daftar di ACC/Tolak</span>
                        </a>
                    </li>
                    @endif


                    @if (auth()->user()->user_status == 'super admin')
                        <!-- pengaturan tugas akhir -->
                        <li>
                            <a href="/pengaturan-tugas-akhir" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-green-700 dark:text-white dark:hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-green-300"><path d="M18.75 12.75h1.5a.75.75 0 000-1.5h-1.5a.75.75 0 000 1.5zM12 6a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 0112 6zM12 18a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 0112 18zM3.75 6.75h1.5a.75.75 0 100-1.5h-1.5a.75.75 0 000 1.5zM5.25 18.75h-1.5a.75.75 0 010-1.5h1.5a.75.75 0 010 1.5zM3 12a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 013 12zM9 3.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5zM12.75 12a2.25 2.25 0 114.5 0 2.25 2.25 0 01-4.5 0zM9 15.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" /></svg>
                                <span class="flex-1 ml-2 text-left whitespace-nowrap text-white">Pengaturan</span>
                            </a>
                        </li>
                    @endif
                </ul>

                @if (auth()->user()->user_status == 'super admin')
                <!-- admin -->
                <li>
                    <a href="/daftar-admin" class="flex items-center p-2 text-base font-normal text-white rounded-lg dark:text-white hover:bg-green-700 dark:hover:bg-gray-700">
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-green-300 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        <span class="flex-1 ml-3 font-bold whitespace-nowrap">Admin</span>
                    </a>
                </li>
                @endif

                <!-- user -->
                <button type="button" class="flex items-center w-full p-2 text-base font-normal transition duration-75 rounded-lg group hover:bg-green-700 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-user" data-collapse-toggle="dropdown-user">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-green-300 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap text-white font-bold" sidebar-toggle-item>Mahasiswa</span>
                    <svg sidebar-toggle-item class="w-6 h-6 text-green-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="dropdown-user" class="hidden">

                    @if(auth()->user()->jabatan == 'Akademik')
                    <!-- input NIM user -->
                    <li>
                        <a href="/daftar-nim-user" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-green-700 dark:text-white dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-green-300"><path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd" /><path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zm9.586 4.594a.75.75 0 00-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 00-1.06 1.06l1.5 1.5a.75.75 0 001.116-.062l3-3.75z" clip-rule="evenodd" /></svg>
                            <span class="flex-1 ml-2 text-left whitespace-nowrap text-white">Input NIM</span>
                        </a>
                    </li>
                    @endif
                    <!-- daftar user -->
                    <li>
                        <a href="/daftar-user" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-green-700 dark:text-white dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-green-300"><path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd" /><path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zm9.586 4.594a.75.75 0 00-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 00-1.06 1.06l1.5 1.5a.75.75 0 001.116-.062l3-3.75z" clip-rule="evenodd" /></svg>
                            <span class="flex-1 ml-2 text-left whitespace-nowrap text-white">Daftar Mahasiswa</span>
                        </a>
                    </li>
                    
                    @if(auth()->user()->jabatan == 'Akademik')
                    <!-- daftar user nonaktif -->
                    <li>
                        <a href="/user-nonaktif" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-green-700 dark:text-white dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-green-300"><path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd" /><path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z" clip-rule="evenodd" /></svg>
                            <span class="flex-1 ml-2 text-left whitespace-nowrap text-white">Mahasiswa Nonaktif</span>
                        </a>
                    </li>
                    @endif
                </ul>
            @endif
                <!-- notifikasi -->
                <li>
                    <a href="/notifikasi" class="flex items-center p-2 text-base font-normal text-white rounded-lg dark:text-white hover:bg-green-700 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-300"><path d="M5.85 3.5a.75.75 0 00-1.117-1 9.719 9.719 0 00-2.348 4.876.75.75 0 001.479.248A8.219 8.219 0 015.85 3.5zM19.267 2.5a.75.75 0 10-1.118 1 8.22 8.22 0 011.987 4.124.75.75 0 001.48-.248A9.72 9.72 0 0019.266 2.5z" /><path fill-rule="evenodd" d="M12 2.25A6.75 6.75 0 005.25 9v.75a8.217 8.217 0 01-2.119 5.52.75.75 0 00.298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 107.48 0 24.583 24.583 0 004.83-1.244.75.75 0 00.298-1.205 8.217 8.217 0 01-2.118-5.52V9A6.75 6.75 0 0012 2.25zM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 004.496 0l.002.1a2.25 2.25 0 11-4.5 0z" clip-rule="evenodd" /></svg>
                        <span class="flex-1 ml-3 whitespace-nowrap font-bold">Notifikasi</span>
                        @if($count > 0)
                        <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-black bg-green-300 rounded-full dark:bg-blue-900 dark:text-blue-300">{{$count}}</span>
                        @endif
                    </a>
                </li>
            @if (auth()->user()->user_status == 'admin' || auth()->user()->user_status == 'super admin')
                <!-- Informasi Menu -->
                <li>
                    <a href="/info-menu" class="flex items-center p-2 text-base font-normal text-white rounded-lg dark:text-white hover:bg-green-700 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-yellow-300">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap font-bold">Info Menu</span>
                    </a>
                </li>
            </ul>
            @endif
        
            <ul class="pt-4 mt-4 space-y-2 border-t border-green-300 dark:border-gray-700">
                <!-- pengaturan akun -->
                <li>
                    <a href="/pengaturan-akun" class="flex items-center p-2 text-base font-normal text-white transition duration-75 rounded-lg hover:bg-green-700 dark:hover:bg-gray-700 dark:text-white group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-300"><path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z" clip-rule="evenodd" /></svg>
                        <span class="ml-3 font-bold">Pengaturan Akun</span>
                    </a>
                </li>

                <!-- log out -->
                <li>
                    <button type="button" data-modal-target="popup-modal-logout" data-modal-toggle="popup-modal-logout" class="flex items-center p-2 text-base font-normal text-white transition duration-75 rounded-lg hover:bg-green-700 dark:hover:bg-gray-700 dark:text-white group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-300"><path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm10.72 4.72a.75.75 0 011.06 0l3 3a.75.75 0 010 1.06l-3 3a.75.75 0 11-1.06-1.06l1.72-1.72H9a.75.75 0 010-1.5h10.94l-1.72-1.72a.75.75 0 010-1.06z" clip-rule="evenodd" /></svg>
                        <span class="ml-3 font-bold">Log Out</span>
                        <!-- penanda admin atau super admin -->
                        <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-black bg-green-300 rounded-full dark:bg-gray-700 dark:text-gray-300">
                            {{auth()->user()->jabatan}}
                        </span>
                    </button>
                </li>
            </ul>
        @endauth

        </div>
    </aside>

    <div class="sm:ml-64">
        <!-- navbar -->
        <nav class="sticky top-0 z-50 bg-blue-900 sm:px-4 py-2.5 border-0 w-full dark:bg-gray-900">
            <div class="flex flex-wrap items-center justify-between mx-auto">

                <!-- logo tedc ketika mode mobile -->
                <div class="ml-2 block sm:hidden">
                    <a href="https://flowbite.com/" class="flex items-center">
                        <img src="{{ asset('images/logoTEDC.png') }}" class="h-9 ml-2 mr-3 sm:h-9" alt="Politeknik TEDC Bandung Logo" />
                        <span class="self-center text-xl text-green-300 font-semibold whitespace-nowrap dark:text-white">Repository Tugas Akhir</span>
                    </a>
                </div>
                
                <!-- button sidebar -->
                <button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-auto mr-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>

                <div class="hidden w-full ml-auto md:block md:w-auto" id="navbar-default">
                    <div class="flex items-center flex-col p-2 mt-2 border border-blue-600 rounded-lg bg-blue-900 md:flex-row md:space-x-4 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-blue-900 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    @auth
                    
                        @if(auth()->user()->image != new \MongoDB\BSON\Binary('', \MongoDB\BSON\Binary::TYPE_GENERIC))
                            <!-- profile image -->
                            <div class="relative w-10 h-10 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-600">
                                <img class="object-cover w-full h-full" src="{{ route('profile-image', auth()->user()->_id) }}" alt="">
                            </div>
                        @else
                            <!-- avatar default -->
                            <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                            </div>
                        @endif

                        <div class="text-xl text-white">
                            {{auth()->user()->nama_lengkap}}
                            @if(auth()->user()->user_status == 'admin' || auth()->user()->user_status == 'super admin')
                                - ( <label class="text-green-300"> {{auth()->user()->jabatan}} </label> )
                            @endif
                            </div>
                    @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <main class="container px-4 md:mx-auto">
            @auth
                <!-- form logout -->
                <form action="/logout" method="POST">
                    @csrf
                    <!-- popup logout -->
                    <div id="popup-modal-logout" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <div class="p-6 text-center">
                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <h3 class="mb-10 text-lg font-normal text-black dark:text-gray-400">Apakah kamu yakin ingin keluar?</h3>
                                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Yes, I'm sure
                                    </button>
                                    <button data-modal-hide="popup-modal-logout" type="button" class="text-black bg-gray-100 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endauth

            <!-- isi content -->
            @yield('content')
            <!-- isi content -->

        </main>
    </div>


    @vite('resources/js/app.js')
</body>
</html>