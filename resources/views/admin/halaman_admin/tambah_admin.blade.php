@extends('layouts.master')

@section('title', 'Tambah Admin')

@section('content')

    @if(session()->has('success'))
        <!-- alert data berhasil ditambahkan -->
        <div id="alert-3" class="flex p-4 mt-4 mb-7 text-gray-800 rounded-lg bg-green-300 dark:bg-gray-800 dark:text-green-400" role="alert">
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
    @endif
    <div class="text-lg md:text-2xl font-bold text-center text-blue-800 pt-7">
        TAMBAH ADMIN
    </div>
    <div class="container w-full pt-7 md:pt-10 md:w-4/6 mx-auto">
        <form action="/store-tambah-admin" method="POST">
            @csrf
            <!-- input nama -->
            <div class="mb-6">
                <label for="nama" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Nama Lengkap</label>
                <input type="text" id="nama" name="nama_lengkap" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-bold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                @error('nama_lengkap')
                    <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                @enderror
            </div>

            <!-- input nomor hp -->
            <div class="mb-6">
                <label for="nomor_hp" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Nomor Handphone</label>
                <input type="number" id="nomor_hp" name="nomor_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-bold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                @error('nomor_hp')
                    <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                @enderror
            </div>

            <!-- input email -->
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Email</label>
                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-bold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                @error('email')
                    <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                @enderror
            </div>

            <!-- input Nip -->
            <div class="mb-6">
                <label for="nip" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Nip</label>
                <input type="text" id="nip" name="nip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-bold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                @error('nip')
                    <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                @enderror
            </div>

            <!-- input jenis kelamin -->
            <div class="mb-8 font-bold text-sm">
                <label class="block mb-7 font-bold text-gray-900 dark:text-white">Jenis Kelamin</label>
                <!-- radio button laki-laki -->
                <input type="radio" value="laki-laki" name="jenis_kelamin" class="w-5 h-5 md:w-6 md:h-6 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                Laki-Laki
                <!-- radio button perempuan -->
                <input type="radio" value="perempuan" name="jenis_kelamin" class="w-5 h-5 ml-5 md:w-6 md:h-6 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                Perempuan
            </div>

            <!-- input jabatan -->
            <div class="mb-6">
                <label for="jabatan" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Pilih Bagian</label>
                <select id="jabatan" name="jabatan" class="bg-gray-50 border font-bold border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">Pilih...</option>
                    <option value="Akademik" class="font-bold">Akademik</option>
                    <option value="Pustakawan" class="font-bold">Pustakawan</option>
                    <option value="Prodi" class="font-bold">Prodi</option>
                </select>
            </div>

            <!-- penanggung jawab jurusan -->
            <div class="mb-6">
                <label for="penanggung_jawab_jurusan" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Penanggung Jawab Jurusan</label>
                <select id="penanggung_jawab_jurusan" name="penanggung_jawab_jurusan" class="bg-gray-50 border font-bold border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">Pilih...</option>
                    <option value="Semua Jurusan" class="font-bold">Semua Jurusan</option>
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

            <!-- input user status -->
            <div class="mb-6">
                <label for="user_status" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Pilih Status Admin</label>
                <select id="user_status" name="user_status" class="bg-gray-50 border font-bold border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">Pilih...</option>
                    <option value="super admin" class="font-bold">Akademik</option>
                    <option value="admin" class="font-bold">Pustakawan</option>
                    <option value="admin" class="font-bold">Prodi</option>
                    
                </select>
            </div>
            <!-- input password -->
            <div class="mb-6">
                <label for="password" class="block mb-2 mt-4 text-sm font-bold text-gray-900 dark:text-white">Password</label>
                <input type="password" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                @error('password')
                    <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                @enderror
            </div>

            <!-- input confirm password -->
            <div class="mb-6">
            <label for="confirm_password" class="block mb-2 mt-4 text-sm font-bold text-gray-900 dark:text-white">Confirm Password <label class="text-red-500 text-lg">*</label></label>
            <input type="password"  name="password_confirmation" id="confirm_password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                @error('password')
                    <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                @enderror
            </div>

            <!-- button save -->
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 mr-2 mb-7 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kirim</button>
        </form>
    </div>
@endsection