@extends('layouts.master')

@section('title', 'Daftar Tugas Akhir Detail')

@section('content')
    <div class="w-full h-screen md:w-3/4 mx-auto py-4 px-4 md:px-10 md:py-6 border-l-2 border-r-2 border-black">
        <div class="text-lg sm:text-2xl md:mt-8">Tugas Akhir</div> 
        <div class="my-2 md:my-3 font-bold text-xl sm:text-3xl">
            @php echo strtoupper($showDetail->judul); @endphp
        </div>
        <div class="my-3 md:my-7 border-2 border-black"></div>
            
        <div class="mt-6 md:mt-10 overflow-x-auto">
            <table class="table-auto w-full overflow-hidden">
                <tbody class="text-sm md:text-lg font-semibold text-black">
                    <tr class=" hover:bg-green-100">
                        <td class="py-2 px-1 text-left w-1/12 md:w-1/4">Penulis</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $showDetail->nama }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-100">
                        <td class="py-2 px-1 text-left w-1/12 md:w-1/4">Nim</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $showDetail->nim }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-100">
                        <td class="py-2 px-1 text-left w-1/12 md:w-1/4">Dosen Pembimbing</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $showDetail->dospem }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-100">
                        <td class="py-2 px-1 text-left w-1/12 md:w-1/4">Jurusan</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $showDetail->jurusan }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-100">
                        <td class="py-2 px-1 text-left w-1/12 md:w-1/4">Tingkatan</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $showDetail->tingkatan }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-100">
                        <td class="py-2 px-1 text-left w-1/12 md:w-1/4">Kata Kunci</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $showDetail->kata_kunci }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-100">
                        <td class="py-2 px-1 text-left w-1/12 md:w-1/4">Tinggal Input</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $showDetail->created_at->format('d M Y') }}
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
            <!-- file bab1 -->
            <div class="flex my-2 md:my-4 items-center">
                <img src="{{ asset('images/icon_TA/pdf.png') }}" class="w-7 h-8 md:w-9 md:h-10" alt="PDF logo">
                <a href="{{ route('daftar-tugas-akhir-detail-file', ['nama_file' => 'bab1', $showDetail->_id]) }}" class="ml-2">Bab 1</a>
            </div>
            <!-- file bab2 -->
            <div class="flex my-2 md:my-4 items-center">
                <img src="{{ asset('images/icon_TA/pdf.png') }}" class="w-7 h-8 md:w-9 md:h-10" alt="PDF logo">
                <a href="{{ route('daftar-tugas-akhir-detail-file', ['nama_file' => 'bab2', $showDetail->_id]) }}" class="ml-2">Bab 2</a>
            </div>
            <!-- file bab3 -->
            <div class="flex my-2 md:my-4 items-center">
                <img src="{{ asset('images/icon_TA/pdf.png') }}" class="w-7 h-8 md:w-9 md:h-10" alt="PDF logo">
                <a href="{{ route('daftar-tugas-akhir-detail-file', ['nama_file' => 'bab3', $showDetail->_id]) }}" class="ml-2">Bab 3</a>
            </div>
            <!-- file bab4 -->
            <div class="flex my-2 md:my-4 items-center">
                <img src="{{ asset('images/icon_TA/pdf.png') }}" class="w-7 h-8 md:w-9 md:h-10" alt="PDF logo">
                <a href="{{ route('daftar-tugas-akhir-detail-file', ['nama_file' => 'bab4', $showDetail->_id]) }}" class="ml-2">Bab 4</a>
            </div>
            <!-- file bab5 -->
            <div class="flex my-2 md:my-4 items-center">
                <img src="{{ asset('images/icon_TA/pdf.png') }}" class="w-7 h-8 md:w-9 md:h-10" alt="PDF logo">
                <a href="{{ route('daftar-tugas-akhir-detail-file', ['nama_file' => 'bab5', $showDetail->_id]) }}" class="ml-2">Bab 5</a>
            </div>
            <!-- file program -->
            @if($showDetail->file_TA['file_program'] !== null)
            <div class="flex my-2 md:my-4 items-center">
                <img src="{{ asset('images/icon_TA/winrar_icon.png') }}" class="w-6 h-7 md:w-8 md:h-9" alt="winrar logo">
                <a href="{{ route('daftar-tugas-akhir-detail-file', ['nama_file' => 'file_program', $showDetail->_id]) }}" class="ml-2">File Program</a>
            </div>
            @endif
            <!-- link video -->
            @if($showDetail->file_TA['link_video'] !== null)
            <div class="flex my-2 md:my-4 items-center">
                <img src="{{ asset('images/icon_TA/icon_video.png') }}" class="w-6 h-6 md:w-8 md:h-8" alt="video logo">
                <a href="{{ $showDetail->file_TA['link_video'] }}" class="ml-2 text-blue-500 underline" target="_blank">Link Video</a>
            </div>
            @endif
        </div>

        <!-- isi dari button Abstrak -->
        <div id="dataAbstrak" class="hidden pt-4 px-4 md:pt-8 text-sm md:text-lg font-bold text-center">
            {{ $showDetail->abstrak }}
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