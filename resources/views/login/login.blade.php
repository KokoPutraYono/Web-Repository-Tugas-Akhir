<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body>
    
    <div class="flex flex-wrap h-screen">
        <div class="w-full md:w-2/3 order-2 md:order-1 bg-gray-800 md:h-auto flex justify-center items-center">
            <div class="p-auto">
                <h1 class="text-2xl md:text-3xl text-white font-bold px-6">Informasi Web Repository</h1>
                <p class="text-white text-lg py-4 px-6">
                    Web Repository ini diperuntukan untuk <br>
                    <b>
                        <ul class="list-disc text-green-400 text-lg px-10">
                            <li>Mahasiswa Politeknik TEDC Bandung</li>
                            <li>Staf/Dosen Politeknik TEDC Bandung</li>
                            <li>User yang diberi izin akses</li>
                        </ul>
                    </b>
                </p>
                <h1 class="text-2xl text-white font-bold pt-6 px-6">Daftar Akun</h1>
                <p class="text-white text-lg py-4 px-6">
                    Hal-hal yang perlu diketahui <br>
                    <b>
                        <ul class="list-disc text-green-400 text-lg px-10">
                            <li>User yang bisa register yaitu user yang sudah diberi izin oleh admin web</li>
                            <li>Jika anda Mahasiswa atau Staf/Dosen Politeknik TEDC Bandung tetapi tidak bisa register, segera hubungi admin web</li>
                            <li>Jika data register anda sudah pernah di daftarkan maka anda tidak akan bisa lagi register dengan data yang sama</li>
                        </ul>
                    </b>
                </p>
            </div>
        </div>
        <div class="w-full md:w-1/3 order-1 md:order-2 bg-blue-900 md:h-auto flex justify-center items-center">
            <div class="w-full max-w-md p-4 m-auto bg-blue-900 border-gray-200 sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                
                @if(session()->has('success'))
                <!-- alert register berhasil -->
                <div id="alert-3" class="flex p-4 mb-12 text-gray-800 rounded-lg bg-green-300 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                @elseif(session()->has('failed'))
                    <!-- alert data berhasil ditambahkan -->
                    <div id="alert-3" class="flex p-4 mt-4 mb-7 text-gray-800 rounded-lg bg-red-300 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <div class="ml-3 text-sm font-medium">
                            {{ session('failed') }}
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                @endif

                <div class="flex flex-col items-center mt-5 pb-8">
                    <img class="w-32 h-32" src="{{ asset('images/logoTEDC.png') }}" alt="Politeknik TEDC Bandung"/>
                    <h5 class="text-2xl font-bold mt-2 text-white dark:text-white">Login</h5>
                </div>

                <form class="space-y-2 mt-5 mb-5 mx-2" action="/login-store" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-lg font-bold text-white dark:text-white">Email</label>
                        <input autofocus type="email" name="email" value="{{ old('email') }}" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                        @error('email')
                            <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 mt-4 text-lg font-bold text-white dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg mb-5 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        @error('password')
                            <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center">
                            <input id="remember" type="checkbox" name="remember" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="ml-2 text-lg font-medium text-gray-300 dark:text-gray-300">Remember me</label>
                        </div>
                        <a href="/lupa-password" class="ml-auto mb-5 text-lg text-green-300 hover:underline dark:text-blue-500">Lost Password?</a>
                    </div>
                    <button type="submit" class="w-full text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
                    <div class="text-lg text-center pt-5 font-medium text-gray-500 dark:text-gray-300">
                        <a href="/register" class="text-green-300 hover:underline dark:text-blue-500">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    @vite('resources/js/app.js')
</body>
</html>