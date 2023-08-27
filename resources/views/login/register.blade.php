<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body>

    <div class="flex flex-wrap bg-gray-800">
        <div class="container md:w-1/2 px-4 md:px-16 bg-blue-900 mx-auto">
            
            @if(session()->has('failed'))
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
        
            <div class="flex flex-col items-center mt-7 md:mt-12 pb-8 md:pb-12">
                <img class="w-28 h-28 md:w-36 md:h-36" src="{{ asset('images/logoTEDC.png') }}" alt="Politeknik TEDC Bandung"/>
                <h5 class="text-2xl font-bold mt-2 text-white dark:text-white">Sign Up</h5>
            </div>

            <form class="space-y-2 mb-5 mx-2" action="/register-store" method="POST">
                {{ csrf_field() }}
                <!-- input nama -->
                <div>
                    <label for="nama_lengkap" class="block mb-2 mt-4 text-lg font-bold text-white dark:text-white">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" id="nama_lengkap" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                    @error('nama_lengkap')
                        <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                    @enderror
                </div>

                <!-- input nim -->
                <div>
                    <label for="nim" class="block mb-2 mt-4 text-lg font-bold text-white dark:text-white">Nim</label>
                    <input type="text" name="nim" value="{{ old('nim') }}" id="nim" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                    @error('nim')
                        <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                    @enderror
                </div>

                <!-- input email -->
                <div>
                    <label for="email" class="block mb-2 mt-4 text-lg font-bold text-white dark:text-white">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                    @error('email')
                        <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                    @enderror
                </div>

                <!-- input jenis kelamin -->
                <div class="font-bold text-lg text-white">
                    <label class="block mt-6 mb-4 font-bold dark:text-white">Jenis Kelamin</label>
                    <!-- radio button laki-laki -->
                    <input type="radio" value="laki-laki" name="jenis_kelamin" class="w-5 h-5 md:w-6 md:h-6 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    Laki-Laki
                    <!-- radio button perempuan -->
                    <input type="radio" value="perempuan" name="jenis_kelamin" class="w-5 h-5 ml-5 md:w-6 md:h-6 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    Perempuan
                </div>

                <!-- input nomor hp -->
                <div>
                    <label for="nomor_hp" class="block mb-2 mt-7 text-lg font-bold text-white dark:text-white">No Handphone</label>
                    <input type="number" name="nomor_hp" value="{{ old('nomor_hp') }}" id="nomor_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                    @error('nomor_hp')
                        <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                    @enderror
                </div>

                <!-- input jurusan -->
                <div>
                    <label for="jurusan" class="block mb-2 mt-4 text-lg font-bold text-white dark:text-white">Prodi</label>
                    <select id="jurusan" name="jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="">Pilih Prodi ...</option>
                        <option value="Alat Berat" class="font-bold">Alat Berat</option>
                        <option value="Teknik Komputer" class="font-bold">Teknik Komputer</option>
                        <option value="Teknik Mesin" class="font-bold">Teknik Mesin</option>
                        <option value="Mekanik Otomotif" class="font-bold">Mekanik Otomotif</option>
                        <option value="Akuntansi" class="font-bold">Akuntansi</option>
                        <option value="Teknik Elektronika" class="font-bold">Teknik Elektronika</option>
                        <option value="Teknik Kimia" class="font-bold">Teknik Kimia</option>
                        <option value="Rekam Medik dan Informasi Kesehatan" class="font-bold">Rekam Medik dan Informasi Kesehatan</option>
                        <option value="Teknik Sipil" class="font-bold">Teknik Sipil</option>
                        <option value="Teknik Informatika" class="font-bold">Teknik Informatika</option>
                        <option value="Komputerisasi Akutansi" class="font-bold">Komputerisasi Akutansi</option>
                        <option value="Mekanik Industri dan Desain" class="font-bold">Mekanik Industri dan Desain</option>
                        <option value="Teknik Otomasi Industri" class="font-bold">Teknik Otomasi Industri</option>
                        <option value="Mekatronik" class="font-bold">Mekatronik</option>
                    </select>
                </div>

                <!-- input tingkatan -->
                <div>
                    <label for="tingkatan" class="block mb-2 mt-4 text-lg font-bold text-white dark:text-white">Jenjang</label>
                    <select id="tingkatan" name="tingkatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="">Pilih Jenjang ...</option>
                        <option value="D3" class="font-bold">D3</option>
                        <option value="D4" class="font-bold">D4</option>
                    </select>
                </div>

                <!-- input angkatan -->
                <div>
                    <label for="angkatan" class="block mb-2 mt-4 text-lg font-bold text-white dark:text-white">Tahun Akademik</label>
                    <select id="angkatan" name="angkatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="">Pilih Tahun Akademik ...</option>
                        <option value="2022" class="font-bold">2022</option>
                        <option value="2023" class="font-bold">2023</option>
                        <option value="2024" class="font-bold">2024</option>
                        <option value="2025" class="font-bold">2025</option>
                    </select>
                </div>

                <!-- input password -->
                <div>
                    <label for="password" class="block mb-2 mt-4 text-lg font-bold text-white dark:text-white">Password</label>
                    <input type="password" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    @error('password')
                        <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                    @enderror
                </div>

                <!-- input confirm password -->
                <div>
                    <label for="confirm_password" class="block mb-2 mt-4 text-lg font-bold text-white dark:text-white">Confirm Password <label class="text-red-500 text-lg">*</label></label>
                    <input type="password"  name="password_confirmation" id="confirm_password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    @error('password')
                        <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                    @enderror
                </div>

                <!-- button Sign Up -->
                <div class="flex justify-end pt-2 pr-2 pb-5">
                    <button type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    @vite('resources/js/app.js')
</body>
</html>