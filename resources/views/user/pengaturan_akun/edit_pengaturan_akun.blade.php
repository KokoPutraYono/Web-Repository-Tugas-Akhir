@extends('layouts.master')

@section('title', 'Edit Pengaturan Akun')

@section('content')


    <div class="text-lg md:text-2xl font-bold text-center text-blue-800 pt-7">
        EDIT PENGATURAN AKUN
    </div>
    <div class="container w-full pt-7 md:pt-10 md:w-4/6 mx-auto">
        <form action="/store-data-pengaturan-akun/{{ auth()->user()->_id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- input nama -->
            <div class="mb-6">
                <label for="nama" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Nama Lengkap</label>
                <input type="text" id="nama" value="{{ auth()->user()->nama_lengkap }}" name="nama_lengkap" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-bold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                @error('nama_lengkap')
                    <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                @enderror
            </div>

            <!-- input profile image -->
            <div class="mb-6">
                <label for="profile_image" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Profile Image</label>
                <input name="profile_image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="profile_image" type="file" accept=".jpg,.png">
                @error('profile_image')
                    <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                @enderror
            </div>

            @if(auth()->user()->user_status != "user")
                <!-- input Nip -->
                <div class="mb-6">
                    <label for="nip" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Nip</label>
                    <input type="text" id="nip" value="{{ auth()->user()->nip }}" name="nip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-bold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('nip')
                        <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                    @enderror
                </div>
            @endif

            <!-- input jenis kelamin -->
            <div class="mb-8 font-bold text-sm">
                <label class="block mb-7 font-bold text-gray-900 dark:text-white">Jenis Kelamin</label>
                @if(auth()->user()->jenis_kelamin == "laki-laki")  
                    <!-- radio button laki-laki -->
                    <input checked type="radio" value="laki-laki" name="jenis_kelamin" class="w-5 h-5 md:w-6 md:h-6 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    Laki-Laki
                    <!-- radio button perempuan -->
                    <input type="radio" value="perempuan" name="jenis_kelamin" class="w-5 h-5 ml-5 md:w-6 md:h-6 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    Perempuan
                @else
                    <!-- radio button laki-laki -->
                    <input type="radio" value="laki-laki" name="jenis_kelamin" class="w-5 h-5 md:w-6 md:h-6 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    Laki-Laki
                    <!-- radio button perempuan -->
                    <input checked type="radio" value="perempuan" name="jenis_kelamin" class="w-5 h-5 ml-5 md:w-6 md:h-6 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    Perempuan
                @endif
            </div>

            <!-- input nomor hp -->
            <div class="mb-6">
                <label for="nomor_hp" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Nomor Handphone</label>
                <input type="number" id="nomor_hp" value="{{ auth()->user()->nomor_hp }}" name="nomor_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-bold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                @error('nomor_hp')
                    <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                @enderror
            </div>

            @if(auth()->user()->user_status == "user")
                <!-- input angkatan -->
                <div class="mb-6">
                    <label for="angkatan" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Tahun Akademik</label>
                    <select id="angkatan" name="angkatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="{{ auth()->user()->angkatan }}">{{ auth()->user()->angkatan }}</option>
                        <option value="2022" class="font-bold">2022</option>
                        <option value="2023" class="font-bold">2023</option>
                        <option value="2024" class="font-bold">2024</option>
                        <option value="2025" class="font-bold">2025</option>
                    </select>
                </div>
                
                <!-- input tingkatan -->
                <div class="mb-6">
                    <label for="tingkatan" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Jenjang</label>
                    <select id="tingkatan" name="tingkatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        @if(auth()->user()->tingkatan == "D3") 
                            <option value="D3" class="font-bold">D3</option>
                            <option value="D4" class="font-bold">D4</option>
                        @else
                            <option value="D4" class="font-bold">D4</option>
                            <option value="D3" class="font-bold">D3</option>
                        @endif
                    </select>
                </div>
                
                <!-- input jurusan -->
                <div class="mb-6">
                    <label for="jurusan" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Prodi</label>
                    <select id="jurusan" name="jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="{{ auth()->user()->jurusan }}">{{ auth()->user()->jurusan }}</option>
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
            @else
                <!-- input jabatan -->
                <div class="mb-6">
                    <label for="jabatan" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Pilih Bagian</label>
                    <select id="jabatan" name="jabatan" class="bg-gray-50 border font-bold border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="{{ auth()->user()->jabatan }}">{{ auth()->user()->jabatan }}</option>
                        <option value="Akademik" class="font-bold">Akademik</option>
                        <option value="Pustakawan" class="font-bold">Pustakawan</option>
                        <option value="Prodi" class="font-bold">Prodi</option>
                    </select>
                </div>
            @endif

            <!-- input password -->
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Password</label>
                <input type="password" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('password')
                    <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                @enderror
            </div>

            <!-- input confirm password -->
            <div class="mb-6">
            <label for="confirm_password" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Confirm Password <label class="text-red-500 text-sm">*</label></label>
            <input type="password"  name="password_confirmation" id="confirm_password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('password')
                    <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- button save -->
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 mr-2 mb-7 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kirim</button>
        </form>
    </div>
@endsection