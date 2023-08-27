@extends('layouts.master')

@section('title', 'Input Tugas Akhir')

@section('content')
    @if(session()->has('success'))
        <!-- alert data berhasil ditambahkan -->
        <div id="alert-3" class="flex p-4 mt-4 mb-2 text-gray-800 rounded-lg bg-green-300 dark:bg-gray-800 dark:text-green-400" role="alert">
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
    <form action="/store-tugas-akhir" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="container w-full pt-7 md:pt-10 md:w-4/6 mx-auto">
            <div class="text-lg md:text-2xl font-bold text-center underline text-blue-800 pt-7">
                Input Tugas Akhir
            </div>

            <div id="question1">
                <ol class="flex items-center justify-center w-full text-sm mt-5 mb-12 md:mb-16 font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                    <li class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                        <span class="flex text-lg font-bold items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            Data <span class="hidden sm:inline-flex sm:ml-2">Diri</span>
                        </span>
                    </li>
                    <li class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                        <span class="flex text-lg font-bold items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                            <span class="mr-2">2</span>
                            Data <span class="hidden sm:inline-flex sm:ml-2">TA</span>
                        </span>
                    </li>
                    <li class="flex items-center">
                        <span class="flex text-lg font-bold items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                            <span class="mr-2">3</span>
                            File <span class="hidden sm:inline-flex sm:ml-2">TA</span>
                        </span>
                    </li>
                </ol>

                
                <!-- input nama -->
                <div class="mb-6">
                    <label for="nama" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Nama</label>
                    <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>
                
                <!-- input nim -->
                <div class="mb-6">
                    <label for="nim" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Nim</label>
                    <input type="text" name="nim" id="nim" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>

                <!-- kelas -->
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
            </div>


            <div id="question2" style="display: none;">
                <ol class="flex items-center justify-center w-full text-sm mt-5 mb-12 md:mb-16 font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                    <li class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                        <span class="flex text-lg font-bold items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            Data <span class="hidden sm:inline-flex sm:ml-2">Diri</span>
                        </span>
                    </li>
                    <li class="flex md:w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                        <span class="flex text-lg font-bold items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            Data <span class="hidden sm:inline-flex sm:ml-2">TA</span>
                        </span>
                    </li>
                    <li class="flex items-center">
                        <span class="flex text-lg font-bold items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                            <span class="mr-2">3</span>
                            File <span class="hidden sm:inline-flex sm:ml-2">TA</span>
                        </span>
                    </li>
                </ol>

                <!-- input judul -->
                <div class="mb-6">
                    <label for="judul" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Judul Tugas Akhir</label>
                    <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>
                <!-- input abstrak -->
                <div class="mb-6">
                    <label for="abstrak" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Abstrak Tugas Akhir</label>
                    <textarea id="abstrak" name="abstrak" value="{{ old('abstrak') }}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required></textarea>
                </div>
                <!-- input kata kunci -->
                <div class="mb-6">
                    <label for="kata_kunci" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Kata Kunci</label>
                    <input type="text" name="kata_kunci" id="kata_kunci" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>
                <!-- input dospem -->
                <div class="mb-6">
                    <label for="dospem" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Dosen Pembimbing</label>
                    <input type="text" name="dospem" id="dospem" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>
                <!-- input penguji 1 -->
                <div class="mb-6">
                    <label for="penguji_1" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Dosen Penguji <label class="text-red-600">1 (Satu)</label></label>
                    <input type="text" name="penguji_1" id="penguji_1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>
                <!-- input penguji 2 -->
                <div class="mb-6">
                    <label for="penguji_2" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Dosen Penguji <label class="text-red-600">2 (Dua)</label></label>
                    <input type="text" name="penguji_2" id="penguji_2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>
                <!-- input kaprodi -->
                <div class="mb-6">
                    <label for="kaprodi" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Kepala Program Studi</label>
                    <input type="text" name="kaprodi" id="kaprodi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>
            </div>


            <div id="question3" style="display: none;">
                <ol class="flex items-center justify-center w-full text-sm mt-5 mb-12 md:mb-16 font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                    <li class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                        <span class="flex text-lg font-bold items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            Data <span class="hidden sm:inline-flex sm:ml-2">Diri</span>
                        </span>
                    </li>
                    <li class="flex md:w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                        <span class="flex text-lg font-bold items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            Data <span class="hidden sm:inline-flex sm:ml-2">TA</span>
                        </span>
                    </li>
                    <li class="flex items-center text-blue-600 dark:text-blue-500">
                        <span class="flex text-lg font-bold items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            File <span class="hidden sm:inline-flex sm:ml-2">TA</span>
                        </span>
                    </li>
                </ol>

                <!-- label file TA -->
                <div class="mt-6 mb-2">
                    <label class="block mb-2 text-lg md:text-2xl font-bold text-gray-900 dark:text-white">Upload File Tugas Akhir</label></label>
                </div>
                <!-- input bab 1 -->
                <div class="mb-4">
                    <label class="block mb-2 text-sm md:text-lg font-medium text-gray-900 dark:text-white" for="input_file_bab1">Upload file <label class="text-red-600">BAB 1</label></label>
                    <input required name="file_bab1" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="input_file_bab1" type="file">
                </div>
                <!-- input bab 2 -->
                <div class="mb-4">
                    <label class="block mb-2 text-sm md:text-lg font-medium text-gray-900 dark:text-white" for="input_file_bab2">Upload file <label class="text-red-600">BAB 2</label></label>
                    <input required name="file_bab2" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="input_file_bab2" type="file">
                </div>
                <!-- input bab 3 -->
                <div class="mb-4">
                    <label class="block mb-2 text-sm md:text-lg font-medium text-gray-900 dark:text-white" for="input_file_bab3">Upload file <label class="text-red-600">BAB 3</label></label>
                    <input required name="file_bab3" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="input_file_bab3" type="file">
                </div>
                <!-- input bab 4 -->
                <div class="mb-4">
                    <label class="block mb-2 text-sm md:text-lg font-medium text-gray-900 dark:text-white" for="input_file_bab4">Upload file <label class="text-red-600">BAB 4</label></label>
                    <input required name="file_bab4" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="input_file_bab4" type="file">
                </div>
                <!-- input bab 5 -->
                <div class="mb-4">
                    <label class="block mb-2 text-sm md:text-lg font-medium text-gray-900 dark:text-white" for="input_file_bab5">Upload file <label class="text-red-600">BAB 5</label></label>
                    <input required name="file_bab5" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="input_file_bab5" type="file">
                </div>

                <!-- label file program -->
                <div class="flex items-center mt-8 mb-2 md:mt-10">
                <label class="block mr-4 text-lg md:text-2xl font-bold text-gray-900 dark:text-white">Upload File Program</label>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" id="toggle-file-program">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Aktifkan</span>
                </label>
                </div>
                <!-- input file program -->
                <div class="mb-8">
                <label class="block mb-2 text-sm md:text-lg font-medium text-gray-900 dark:text-white" for="input_file_program">Upload file Program <label class="text-red-600 text-sm md:text-lg">(Format RAR/ZIP)</label></label>
                <input name="file_program" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-200" id="input_file_program" type="file" disabled>
                </div>


                <!-- label link video -->
                <div class="flex items-center mt-8 mb-2 md:mt-10">
                    <label class="block mr-4 text-lg md:text-2xl font-bold text-gray-900 dark:text-white">Upload Link Video</label></label>
                    
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer" id="toggle-link-video">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Aktifkan</span>
                    </label>
                </div>
                <!-- input link video -->
                <div class="mb-8">
                    <label class="block mb-2 text-sm md:text-lg font-medium text-gray-900 dark:text-white" for="link_video">Upload Link Video <label class="text-red-600 text-sm md:text-lg">(Berbentuk Link)</label></label>
                    <input name="link_video" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-200" id="link_video" type="text" disabled>
                </div>
            </div>

            <div class="flex justify-between">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 mr-2 mb-7 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" id="prevBtn" onclick="prevQuestion()" style="display:none">Back</button>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 mb-7 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" id="nextBtn" onclick="nextQuestion()">Next</button>
                <button type="submit" class="text-white font-bold bg-green-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-6 py-2.5 mr-2 mb-7 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" id="submitBtn" style="display:none">Submit</button>
            </div>

        </div>
    </form>




    <script>
        let currentQuestion = 1;
        const nextButton = document.getElementById("nextBtn");
        const prevButton = document.getElementById("prevBtn");
        const submitButton = document.getElementById("submitBtn");

        function nextQuestion() {
            let inputs = document.querySelectorAll(`#question${currentQuestion} input[required]`);
            let isComplete = true;
            inputs.forEach((input) => {
                if (!input.value) {
                    isComplete = false;
                    input.reportValidity();
                }
            });

            if (isComplete) {
                if (currentQuestion < 3) {
                    document.getElementById(`question${currentQuestion}`).style.display = "none";
                    currentQuestion++;
                    document.getElementById(`question${currentQuestion}`).style.display = "block";
                    if (currentQuestion === 3) {
                        nextButton.style.display = "none";
                        submitButton.style.display = "block";
                    } else {
                        nextButton.style.display = "block";
                        submitButton.style.display = "none";
                    }
                    prevButton.style.display = "block";
                }
            }
        }

        function prevQuestion() {
            if (currentQuestion > 1) {
                document.getElementById(`question${currentQuestion}`).style.display = "none";
                currentQuestion--;
                document.getElementById(`question${currentQuestion}`).style.display = "block";
                if (currentQuestion === 1) {
                    prevButton.style.display = "none";
                }
                nextButton.style.display = "block";
                submitButton.style.display = "none";
            }
        }


        // enable dan disable inputan file program
        const toggleFileProgram = document.getElementById('toggle-file-program');
        const inputfileProgram = document.getElementById('input_file_program');
        const toggleDot1 = document.querySelector('.toggle-dot');
        
        toggleFileProgram.addEventListener('change', function() {
            if (this.checked) {
            inputfileProgram.disabled = false;
            inputfileProgram.classList.remove('disabled:bg-gray-200', 'opacity-50');
            toggleDot1.style.transform = 'translateX(100%)';
            } else {
            inputfileProgram.disabled = true;
            inputfileProgram.classList.add('disabled:bg-gray-200', 'opacity-50');
            toggleDot1.style.transform = 'translateX(0)';
            }
        });

        // enable dan disable inputan link video
        const toggleLinkVideo = document.getElementById('toggle-link-video');
        const linkVideo = document.getElementById('link_video');
        const toggleDot2 = document.querySelector('.toggle-dot');
        
        toggleLinkVideo.addEventListener('change', function() {
            if (this.checked) {
            linkVideo.disabled = false;
            linkVideo.classList.remove('disabled:bg-gray-200', 'opacity-50');
            toggleDot2.style.transform = 'translateX(100%)';
            } else {
            linkVideo.disabled = true;
            linkVideo.classList.add('disabled:bg-gray-200', 'opacity-50');
            toggleDot2.style.transform = 'translateX(0)';
            }
        });
    </script> 
@endsection