@extends('layouts.master')

@section('title', 'Menunggu ACC')

@section('content')

    <!-- search input -->
    <form action="{{ route('menunggu-acc') }}" method="GET" class="flex items-center justify-center border-0 pt-5 pb-8">  
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full sm:w-1/2">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-blue-700 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" name="search" id="simple-search" class="bg-gray-50 border border-blue-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
        </div>
        <button type="submit" class="px-3 py-2 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <span class="sr-only">Search</span>
        </button>
    </form>

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
    @elseif(session()->has('destroy'))
        <!-- alert data berhasil ditambahkan -->
        <div id="alert-3" class="flex p-4 mt-4 mb-2 text-gray-800 rounded-lg bg-green-300 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session('destroy') }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    @endif

    <!-- isi content -->
    <div class="mt-5 md:mt-10 text-lg md:text-2xl font-bold text-center text-blue-900">DAFTAR MENUNGGU ACC</div>
    <!-- tabel -->
    <div class="mt-6 overflow-x-auto">
        <table class="table-auto w-full bg-gray-50 shadow-md rounded-lg overflow-hidden">
            <thead>
            <tr class="bg-blue-900 font-bold text-green-300 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-center">No</th>
                <th class="py-3 px-6 text-center">Menunggu ACC</th>
                <th class="py-3 px-6 text-center">Nama</th>
                <th class="py-3 px-6 text-center">Nim</th>
                <th class="py-3 px-6 text-center">Kelas</th>
                <th class="py-3 px-6 text-center">Jurusan</th>
                <th class="py-3 px-6 text-center">Action</th>
            </tr>
            </thead>

            <!-- membuat nomor -->
            @php $no = ($show_data->currentPage() - 1) * $show_data->perPage() @endphp

            @foreach($show_data as $cek_story)
            <tbody class="text-black text-sm font-medium">
                <tr class="border-b border-gray-200 hover:bg-green-100">
                    <td class="py-3 px-6 text-center">
                        {{ $no += 1 }}
                    </td>
                    <td class="py-3 px-6 text-left">
                        {{ $cek_story->judul }}
                    </td>
                    <td class="py-3 px-6 text-left">
                        {{ $cek_story->nama }}
                    </td>
                    <td class="py-3 px-6 text-center">
                        {{ $cek_story->nim }}
                    </td>
                    <td class="py-3 px-6 text-center">
                        {{ $cek_story->kelas }}
                    </td>
                    <td class="py-3 px-6 text-center">
                        {{ $cek_story->jurusan }}
                    </td>
                    <td class="py-3 px-6 text-center w-1/6">
                        <div class="flex justify-center">

                            <!-- form ACC -->
                            <form action="/acc-tugas-akhir/{{$cek_story->_id}}" method="POST">
                                @csrf
                                <button type="button" data-modal-target="popup-modal-acc-{{$cek_story->_id}}" data-modal-toggle="popup-modal-acc-{{$cek_story->_id}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">ACC</button>
                                
                                <!-- popup ACC -->
                                <div id="popup-modal-acc-{{$cek_story->_id}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <div class="p-6 text-center">
                                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                <h3 class="mb-10 text-lg font-normal text-black dark:text-gray-400">Apakah anda yakin ingin meng-<label class="text-blue-700 font-bold">ACC</label> data yang di pilih?</h3>
                                                <button data-modal-hide="popup-modal-acc" type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Yes, I'm sure
                                                </button>
                                                <button data-modal-hide="popup-modal-acc-{{$cek_story->_id}}" type="button" class="text-black bg-gray-100 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </form>

                            <!-- form tolak -->
                            <form action="/tolak-tugas-akhir/{{$cek_story->_id}}" method="POST">
                                @csrf
                                <button type="button" data-modal-target="popup-modal-tolak-{{ $cek_story->_id }}" data-modal-toggle="popup-modal-tolak-{{ $cek_story->_id }}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Tolak</button>
                            
                                <!-- popup tugas akhir di tolak -->
                                <div id="popup-modal-tolak-{{ $cek_story->_id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <div class="p-6 text-center">
                                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                <h3 class="mb-5 md:mb-8 text-lg font-normal text-gray-500 dark:text-gray-400">

                                                    <label for="keterangan" class="block mb-2 md:text-xl text-lg font-bold text-gray-900 dark:text-white">Masukkan Alasan Anda Menolak Tugas Akhir Tersebut:</label>
                                                    <textarea id="keterangan" name="keterangan" rows="4" class="block p-2.5 w-full md:text-lg text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>

                                                </h3>
                                                <button type="submit" data-modal-hide="popup-modal-tolak-{{ $cek_story->_id }}" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Kirim
                                                </button>
                                                <button data-modal-hide="popup-modal-tolak-{{ $cek_story->_id }}" type="button" class="text-black bg-gray-100 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            <!-- detail -->
                            <button type="button" onclick="window.location.href='/menunggu-acc-detail/{{ $cek_story->_id }}'" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Detail</button>
                        </div>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>

        <!-- pagination -->
        <div class="flex flex-col items-center mt-8 mb-8">
            <span class="text-sm font-semibold text-gray-700 dark:text-gray-400">
                Showing <span class="font-bold">{{ $show_data->firstItem() }}</span> to <span class="font-bold">{{ $show_data->lastItem() }}</span> of <span class="font-bold">{{ $show_data->total() }}</span> entries
            </span>
            <div class="flex flex-wrap justify-center mt-4">
                @if ($show_data->onFirstPage())
                <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded-lg mr-2 cursor-not-allowed">Prev</span>
                @else
                <a href="{{ $show_data->previousPageUrl() }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg mr-2 hover:bg-gray-300">Prev</a>
                @endif

                @php
                    $start = 1;
                    $end = $show_data->lastPage();

                    if ($show_data->lastPage() > 5) {
                        $start = max($show_data->currentPage() - 2, 1);
                        $end = min($show_data->currentPage() + 2, $show_data->lastPage());

                        if ($start == 1) {
                            $end = min($end + abs($start - $show_data->currentPage()) , $show_data->lastPage());
                        }

                        if ($end == $show_data->lastPage()) {
                            $start = max($start - abs($end - $show_data->currentPage()), 1);
                        }
                    }
                @endphp

                @foreach ($show_data->getUrlRange($start, $end) as $page => $url)
                    @if ($page == $show_data->currentPage())
                        <span class="px-3 py-1 bg-gray-800 text-white rounded-lg mr-2">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg mr-2 hover:bg-gray-300">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($show_data->hasMorePages())
                <a href="{{ $show_data->nextPageUrl() }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg mr-2 hover:bg-gray-300">Next</a>
                @else
                <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded-lg mr-2 cursor-not-allowed">Next</span>
                @endif
            </div>
        </div>
    </div>

@endsection