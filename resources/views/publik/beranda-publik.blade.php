<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Repository Politeknik TEDC Bandung</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    
    <nav class="bg-blue-900 border-gray-200 px-2 sm:px-4 py-2.5 fixed w-full z-50 dark:bg-gray-900">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="https://flowbite.com/" class="flex items-center">
                <img src="{{ asset('images/logoTEDC.png') }}" class="h-9 mr-3 sm:h-9" alt="Flowbite Logo" />
                <span class="self-center text-xl text-green-300 font-semibold whitespace-nowrap dark:text-white">Repository Tugas Akhir</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="flex flex-col p-2 mt-2 border border-blue-600 rounded-lg bg-blue-900 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-blue-900 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#footer" class="block py-2 pl-2 pr-2 text-green-300 rounded hover:bg-blue-800 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kontak</a>
                    </li>
                @guest
                    <li>
                        <a href="/login" class="block py-2 pl-2 pr-2 text-green-300 rounded hover:bg-blue-800 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login</a>
                    </li>
                @endguest
                </ul>
            </div>
        </div>
    </nav>
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div id="indicators-carousel" class="relative" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        <img src="{{ asset('images/logoTEDC.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/logoTEDC.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/logoTEDC.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/logoTEDC.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/logoTEDC.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>


            <h1 class="text-xl md:text-3xl text-center font-bold mt-7 mb-2 md:mt-10">Selamat Datang di Website Repository Tugas Akhir Politeknik TEDC Bandung</h1>
            <p class="text-gray-700 text-sm md:text-xl text-center leading-7 mb-4">
                Politeknik TEDC Bandung merupakan salah satu kampus swasta yang ada di jawa barat yang berdiri pada tahun 2001. Sekarang Politeknik TEDC Bandung sudah memiliki berbagai jurusan dari D3 hingga D4.
                Berikut adalah daftar-daftar jurusan yang ada pada Politeknik TEDC Bandung dari D3 sampai D4
            </p>
        
            <div class="text-2xl md:text-3xl text-center font-bold mt-7 md:mt-16">
                Program Studi D3
            </div>
            <div class="flex flex-wrap text-center justify-center" data-theme="light">
                <div class="bg-white shadow-lg rounded-lg p-8 m-8 transform hover:-translate-y-2 transition duration-300 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('images/icon_jurusan/alat_berat.png') }}" class="w-28 h-28 md:w-36 md:h-36 mx-auto" alt="...">
                    <h2 class="text-xl md:text-2xl font-bold mb-2 mt-2">Alat Berat</h2>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-8 m-8 transform hover:-translate-y-2 transition duration-300 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('images/icon_jurusan/teknik_komputer.png') }}" class="w-24 h-24 md:w-32 md:h-32 mx-auto" alt="...">
                    <h2 class="text-xl md:text-2xl font-bold mb-2 mt-2">Teknik Komputer</h2>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-8 m-8 transform hover:-translate-y-2 transition duration-300 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('images/icon_jurusan/teknik_mesin.png') }}" class="w-24 h-24 md:w-32 md:h-32 mx-auto" alt="...">
                    <h2 class="text-xl md:text-2xl font-bold mb-2 mt-2">Teknik Mesin</h2>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-8 m-8 transform hover:-translate-y-2 transition duration-300 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('images/icon_jurusan/teknik_otomotif.png') }}" class="w-24 h-24 md:w-32 md:h-32 mx-auto" alt="...">
                    <h2 class="text-xl md:text-2xl font-bold mb-2 mt-2">Mekanik Otomotif</h2>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-8 m-8 transform hover:-translate-y-2 transition duration-300 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('images/icon_jurusan/akutansi.png') }}" class="w-24 h-24 md:w-32 md:h-32 mx-auto" alt="...">
                    <h2 class="text-xl md:text-2xl font-bold mb-2 mt-2">Akutansi</h2>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-8 m-8 transform hover:-translate-y-2 transition duration-300 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('images/icon_jurusan/teknik_elektro.png') }}" class="w-24 h-24 md:w-32 md:h-32 mx-auto" alt="...">
                    <h2 class="text-xl md:text-2xl font-bold mb-2 mt-2">Teknik Elektronika</h2>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-8 m-8 transform hover:-translate-y-2 transition duration-300 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('images/icon_jurusan/teknik_kimia.png') }}" class="w-24 h-24 md:w-32 md:h-32 mx-auto" alt="...">
                    <h2 class="text-xl md:text-2xl font-bold mb-2 mt-2">Teknik Kimia (Industri)</h2>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-8 m-8 transform hover:-translate-y-2 transition duration-300 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('images/icon_jurusan/rekam_medik.png') }}" class="w-24 h-24 md:w-32 md:h-32 mx-auto" alt="...">
                    <h2 class="text-xl md:text-2xl font-bold mb-2 mt-2">Rekam Medik dan Informasi Kesehatan</h2>
                </div>
            </div>

            <div class="text-2xl md:text-3xl text-center font-bold mt-7 md:mt-16">
                Program Studi D4
            </div>
            <div class="flex flex-wrap text-center justify-center" data-theme="light">
                <div class="bg-white shadow-lg rounded-lg p-8 m-8 transform hover:-translate-y-2 transition duration-300 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('images/icon_jurusan/teknik_sipil.png') }}" class="w-28 h-28 md:w-36 md:h-36 mx-auto" alt="...">
                    <h2 class="text-xl md:text-2xl font-bold mb-2 mt-2">Teknik Sipil</h2>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-8 m-8 transform hover:-translate-y-2 transition duration-300 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('images/icon_jurusan/teknik_informatika.png') }}" class="w-24 h-24 md:w-32 md:h-32 mx-auto" alt="...">
                    <h2 class="text-xl md:text-2xl font-bold mb-2 mt-2">Teknik Informatika</h2>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-8 m-8 transform hover:-translate-y-2 transition duration-300 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('images/icon_jurusan/komputerisasi_akutansi.png') }}" class="w-24 h-24 md:w-32 md:h-32 mx-auto" alt="...">
                    <h2 class="text-xl md:text-2xl font-bold mb-2 mt-2">Komputerisasi Akutansi</h2>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-8 m-8 transform hover:-translate-y-2 transition duration-300 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('images/icon_jurusan/MID.png') }}" class="w-24 h-24 md:w-32 md:h-32 mx-auto" alt="...">
                    <h2 class="text-xl md:text-2xl font-bold mb-2 mt-2">Mekanik Industri dan Desain</h2>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-8 m-8 transform hover:-translate-y-2 transition duration-300 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('images/icon_jurusan/teknik_otomasi_industri.png') }}" class="w-24 h-24 md:w-32 md:h-32 mx-auto" alt="...">
                    <h2 class="text-xl md:text-2xl font-bold mb-2 mt-2">Teknik Otomasi Industri</h2>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-8 m-8 transform hover:-translate-y-2 transition duration-300 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('images/icon_jurusan/mekatronik.png') }}" class="w-24 h-24 md:w-32 md:h-32 mx-auto" alt="...">
                    <h2 class="text-xl md:text-2xl font-bold mb-2 mt-2">Mekatronik</h2>
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer" class="bg-blue-900 text-white py-8">
        <div class="container mx-auto px-4 md:px-0">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="mx-auto">
                    <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                    <ul class="list-disc pl-6">
                    <li class="mb-2"><i class="fas fa-envelope mr-2"></i>akademik@poltektedc.ac.id</li>
                    <li class="mb-2"><i class="fas fa-phone mr-2"></i>(022) 6645951</li>
                    <li class="mb-2"><i class="fas fa-map-marker-alt mr-2"></i>Jl. Politeknik Jl. Pesantren No.2, Cibabat, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat 40513</li>
                    </ul>
                </div>
                <div class="mx-auto">
                    <h3 class="text-lg font-bold mb-4">Follow Us</h3>
                    <ul class="list-disc pl-6">
                    <li class="mb-2"><a href="https://www.instagram.com/politekniktedcbandung" class="hover:text-gray-400"><i class="fab fa-instagram mr-2"></i>Instagram</a></li>
                    <li class="mb-2"><a href="https://m.facebook.com/poltektedc.ac.id" class="hover:text-gray-400"><i class="fab fa-facebook mr-2"></i>Facebook</a></li>
                    <li class="mb-2"><a href="https://www.poltektedc.ac.id/" class="hover:text-gray-400"><i class="fab fa-twitter mr-2"></i>Website</a></li>
                    </ul>
                </div>
            
            </div>
        </div>
    </footer>



    @vite('resources/js/app.js')
</body>
</html>