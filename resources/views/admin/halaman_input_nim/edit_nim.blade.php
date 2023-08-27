@extends('layouts.master')

@section('title', 'Edit NIM User')

@section('content')
    
        <form action="/store-edit-nim/{{ $editNim->_id }}" method="POST">
            {{ csrf_field() }}
            @method('PUT')
            <div class="text-lg md:text-2xl font-bold text-center underline text-blue-800 pt-7">
                EDIT NIM
            </div>

            <div class="container w-full pt-7 md:pt-10 md:w-4/6 mx-auto">
                <!-- input nim -->
                <div class="mb-6">
                    <label for="nim" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">NIM</label>
                    <textarea id="nim" name="nim" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{ $editNim->nim }}</textarea>
                    @error('nim')
                        <div class="text-red-500 text-sm mt-2 mb-5">{{ $message }}</div>
                    @enderror
                </div>
                <!-- input kelas -->
                <div class="mb-6">
                    <label for="kelas" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Kelas</label>
                    <input type="text" name="kelas" id="kelas" value="{{ $editNim->kelas }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh: IF-2019A" required>
                </div>
                <!-- input angkatan -->
                <div class="mb-6">
                    <label for="angkatan" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Angkatan</label>
                    <input type="number" name="angkatan" id="angkatan" value="{{ $editNim->angkatan }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh: 2019" required>
                </div>
                
                <!-- input tingkatan -->
                <div class="mb-6">
                    <label for="tingkatan" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Tingkatan</label>
                    <select id="tingkatan" name="tingkatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        @if($editNim->tingkatan == "D3")
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
                    <label for="jurusan" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Jurusan</label>
                    <select id="jurusan" name="jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="{{ $editNim->jurusan }}">{{ $editNim->jurusan }}</option>
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