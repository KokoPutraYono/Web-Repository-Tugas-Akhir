@extends('layouts.master')

@section('title', 'Menunggu ACC Detail')

@section('content')
    <div class="w-full h-screen md:w-3/4 mx-auto py-4 px-4 md:px-10 md:py-6 border-l-2 border-r-2 border-black">
        <div class="text-lg sm:text-2xl md:mt-8">Tugas Akhir</div> 
        <div class="my-2 md:my-3 font-bold text-xl sm:text-3xl">{{ $detailACC->judul }}</div>
        <div class="my-3 md:my-7 border-2 border-black"></div>
        
        <div class="mt-6 md:mt-10 overflow-x-auto">
            <table class="table-auto w-full overflow-hidden">
                <tbody class="text-sm md:text-lg font-semibold text-black">
                    <tr class=" hover:bg-green-100">
                        <td class="py-2 px-1 text-left w-1/12 md:w-1/4">Penulis</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $detailACC->nama }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-100">
                        <td class="py-2 px-1 text-left w-1/12 md:w-1/4">Nim</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $detailACC->nim }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-100">
                        <td class="py-2 px-1 text-left w-1/12 md:w-1/4">Dosen Pembimbing</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $detailACC->dospem }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-100">
                        <td class="py-2 px-1 text-left w-1/12 md:w-1/4">Jurusan</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $detailACC->jurusan }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-100">
                        <td class="py-2 px-1 text-left w-1/12 md:w-1/4">Tingkatan</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $detailACC->tingkatan }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-100">
                        <td class="py-2 px-1 text-left w-1/12 md:w-1/4">Kata Kunci</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $detailACC->kata_kunci }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-100">
                        <td class="py-2 px-1 text-left w-1/12 md:w-1/4">Tinggal Input</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $detailACC->created_at->format('d M Y') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- button file dan abstrak -->
        <div class="mt-4 md:mt-10 flex justify-center">
            <button class="flex items-center justify-center w-full px-4 py-2 text-sm md:text-lg font-medium text-green-300 bg-blue-900 border-r border-white rounded-l-xl hover:bg-green-300 hover:text-blue-900 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" onclick="showFile()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 md:w-6 md:h-6 mr-1"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg>
                File
            </button>
            <button class="flex items-center justify-center w-full px-4 py-2 text-sm md:text-lg font-medium text-green-300 bg-blue-900 border-l border-white rounded-r-xl hover:bg-green-300 hover:text-blue-900 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" onclick="showAbstrak()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 md:w-6 md:h-6 mr-1"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                Abstrak
            </button>
        </div>

        <!-- isi dari button FIle -->
        <div id="dataFile" class="hidden pt-4 px-4 md:pt-8 text-sm md:text-lg font-bold">

            <div class="flex my-2 md:my-4 items-center">
                <img src="{{ asset('images/icon_TA/pdf.png') }}" class="w-7 h-8 md:w-9 md:h-10" alt="PDF logo">
                <a href="{{ route('beranda-detail-file', ['nama_file' => 'bab1', $detailACC->_id]) }}" class="ml-2">Bab 1</a>
            </div>

            <div class="flex my-2 md:my-4 items-center">
                <img src="{{ asset('images/icon_TA/pdf.png') }}" class="w-7 h-8 md:w-9 md:h-10" alt="PDF logo">
                <a href="{{ route('beranda-detail-file', ['nama_file' => 'bab2', $detailACC->_id]) }}" class="ml-2">Bab 2</a>
            </div>

            <div class="flex my-2 md:my-4 items-center">
                <img src="{{ asset('images/icon_TA/pdf.png') }}" class="w-7 h-8 md:w-9 md:h-10" alt="PDF logo">
                <a href="{{ route('beranda-detail-file', ['nama_file' => 'bab3', $detailACC->_id]) }}" class="ml-2">Bab 3</a>
            </div>

            <div class="flex my-2 md:my-4 items-center">
                <img src="{{ asset('images/icon_TA/pdf.png') }}" class="w-7 h-8 md:w-9 md:h-10" alt="PDF logo">
                <a href="{{ route('beranda-detail-file', ['nama_file' => 'bab4', $detailACC->_id]) }}" class="ml-2">Bab 4</a>
            </div>

            <div class="flex my-2 md:my-4 items-center">
                <img src="{{ asset('images/icon_TA/pdf.png') }}" class="w-7 h-8 md:w-9 md:h-10" alt="PDF logo">
                <a href="{{ route('beranda-detail-file', ['nama_file' => 'bab5', $detailACC->_id]) }}" class="ml-2">Bab 5</a>
            </div>

            <!-- file program -->
            @if($detailACC->file_TA['file_program'] !== null)
            <div class="flex my-2 md:my-4 items-center">
                <img src="{{ asset('images/icon_TA/winrar_icon.png') }}" class="w-6 h-7 md:w-8 md:h-9" alt="winrar logo">
                <a href="{{ route('beranda-detail-file', ['nama_file' => 'file_program', $detailACC->_id]) }}" class="ml-2">File Program</a>
            </div>
            @endif

            @if($detailACC->file_TA['link_video'] !== null)
            <div class="flex my-2 md:my-4 items-center">
                 <img src="{{ asset('images/icon_TA/icon_video.png') }}" class="w-6 h-6 md:w-8 md:h-8" alt="video logo">
                <a href="{{ $detailACC->file_TA['link_video'] }}" class="ml-2 text-blue-500 underline" target="_blank">Link Video</a>
            </div>
            @endif
        </div>

        <!-- isi dari button Abstrak -->
        <div id="dataAbstrak" class="hidden pt-4 px-4 md:pt-8 text-sm md:text-lg font-bold text-center">
            {{ $detailACC->abstrak }}
        </div>

        <!-- button acc dan tolak -->
        <div class="flex mt-4 md:mt-10 justify-center items-center">
            <div class="inline-flex rounded-md shadow-sm" role="group">
                
                <!-- form ACC -->
                <form action="/acc-tugas-akhir/{{$detailACC->_id}}" method="POST">
                    @csrf
                    <button type="button" data-modal-target="popup-modal-acc-{{$detailACC->_id}}" data-modal-toggle="popup-modal-acc-{{$detailACC->_id}}" class="inline-flex items-center px-10 py-2 text-sm md:text-lg font-medium text-green-300 bg-blue-900 border-r border-white rounded-xl hover:bg-green-300 hover:text-blue-900 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        ACC
                    </button>
                
                    <!-- popup ACC -->
                    <div id="popup-modal-acc-{{$detailACC->_id}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <div class="p-6 text-center">
                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <h3 class="mb-10 text-lg font-normal text-black dark:text-gray-400">Apakah anda yakin ingin meng-<label class="text-blue-700 font-bold">ACC</label> data yang di pilih?</h3>
                                    <button data-modal-hide="popup-modal-acc" type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Yes, I'm sure
                                    </button>
                                    <button data-modal-hide="popup-modal-acc-{{$detailACC->_id}}" type="button" class="text-black bg-gray-100 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
                <!-- form tolak -->
                <form action="/tolak-tugas-akhir/{{$detailACC->_id}}" method="POST">
                @csrf

                    <button type="button" data-modal-target="popup-modal-tolak-{{ $detailACC->_id }}" data-modal-toggle="popup-modal-tolak-{{ $detailACC->_id }}" class="inline-flex items-center px-10 py-2 text-sm md:text-lg font-medium text-green-300 bg-blue-900 border-l border-white rounded-xl hover:bg-green-300 hover:text-blue-900 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">                
                        Tolak
                    </button>
                    
                    <!-- popup tugas akhir di tolak -->
                    <div id="popup-modal-tolak-{{ $detailACC->_id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <div class="p-6 text-center">
                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <h3 class="mb-5 md:mb-8 text-lg font-normal text-gray-500 dark:text-gray-400">

                                        <label for="keterangan" class="block mb-2 md:text-xl text-lg font-bold text-gray-900 dark:text-white">Masukkan Alasan Anda Menolak Tugas Akhir Tersebut:</label>
                                        <textarea id="keterangan" name="keterangan" rows="4" class="block p-2.5 w-full md:text-lg text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>

                                    </h3>
                                    <button type="submit" data-modal-hide="popup-modal-tolak-{{ $detailACC->_id }}" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Kirim
                                    </button>
                                    <button data-modal-hide="popup-modal-tolak-{{ $detailACC->_id }}" type="button" class="text-black bg-gray-100 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function showFile() {
            document.getElementById("dataFile").classList.toggle("hidden");
            document.getElementById("dataAbstrak").classList.add("hidden");
        }
        
        function showAbstrak() {
            document.getElementById("dataAbstrak").classList.toggle("hidden");
            document.getElementById("dataFile").classList.add("hidden");
        }
    </script>

@endsection