@extends('layouts.master')

@section('title', 'Tambah NIM User')

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

    <form action="/store-nim-user" method="POST">
        {{ csrf_field() }}
        <div class="text-lg md:text-2xl font-bold text-center text-blue-800 pt-7">
            TAMBAH NIM
        </div>
        <div class="container w-full pt-7 md:pt-10 md:w-4/6 mx-auto">
            <!-- input nim -->
            <div class="mb-6">
                <label for="nim" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">NIM</label>
                <textarea id="nim" name="nim" value="{{ old('nim') }}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan nim perkelas. contoh: D11223344, E11223344, MD11223344, ..." required></textarea>
                @error('nim')
                    <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                @enderror
            </div>
            <!-- input kelas -->
            <div class="mb-6">
                <label for="kelas" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh: IF-2019A" required>
            </div>
            <!-- input angkatan -->
            <div class="mb-6">
                <label for="angkatan" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Angkatan</label>
                <input type="number" name="angkatan" id="angkatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh: 2019" required>
            </div>
            
            <!-- input tingkatan -->
            <div class="mb-6">
                <label for="tingkatan" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Tingkatan</label>
                <select id="tingkatan" name="tingkatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">Pilih Tingkatan ...</option>
                    <option value="D3" class="font-bold">D3</option>
                    <option value="D4" class="font-bold">D4</option>
                </select>
            </div>
            
            <!-- input jurusan -->
            <div class="mb-6">
                <label for="jurusan" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Jurusan</label>
                <select id="jurusan" name="jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">Pilih Jurusan ...</option>
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

            <!-- button save -->
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 mr-2 mb-7 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kirim</button>
        </div>
    </form>
@endsection