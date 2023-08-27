@extends('layouts.master')

@section('title', 'Beranda')

@section('content')
    <!-- search input -->
    <form action="{{ route('beranda') }}" method="GET" class="flex items-center justify-center border-0 pt-5 pb-8">  
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

        <!-- button Filter -->
        <button class="px-4 py-2 ml-4 text-sm font-medium text-white bg-blue-700 rounded-xl hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-contact" data-drawer-show="drawer-contact" aria-controls="drawer-contact" data-drawer-placement="right">
            Filter
        </button>
    

        <!-- drawer component -->
        <div id="drawer-contact" class="fixed right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-contact-label">
            <h5 id="drawer-label" class="inline-flex items-center mt-4 mb-6 text-base font-semibold text-blue-900 uppercase dark:text-gray-400"><svg class="w-5 h-5 mr-2 text-blue-800" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Filter Searching</h5>
            <button type="button" data-drawer-hide="drawer-contact" aria-controls="drawer-contact" class="text-gray-400 mt-4 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close menu</span>
            </button>
            <form action="#" class="mb-6">
                <!-- jurusan -->
                <div class="mb-8 mt-8">
                    <label for="jurusan" class="block mb-4 text-sm font-bold text-gray-900 dark:text-white">Jurusan</label>
                    <select id="jurusan" name="jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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

                <!-- tahun -->
                <div class="mb-6">
                    <label for="tahun" class="block mt-6 mb-4 text-sm font-bold text-gray-900 dark:text-white">Tahun :</label>
                    <div class="flex mx-auto justify-center items-center">
                        <input type="number" name="startYear" id="tahun" class="w-1/4 px-2 py-1 text-sm border rounded-md mr-2" placeholder="tahun">
                        <span class="text-gray-600 dark:text-gray-400">-</span>
                        <input type="number" name="endYear" class="w-1/4 px-2 py-1 text-sm border rounded-md ml-2" placeholder="tahun">
                    </div>
                </div>

                <!-- button save -->
                <div class="flex justify-center">
                    <button type="button" data-drawer-hide="drawer-contact" aria-controls="drawer-contact" class="fixed bottom-10 w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
                </div>
            </form>
        </div>

    </form>

    <!-- isi content -->
    <div class="flex flex-wrap text-center justify-center mt-4 md:mt-14" data-theme="light">
    @foreach($showTA as $show)
        <div class="bg-white shadow-lg rounded-lg p-2 m-2 transform hover:-translate-y-2 transition duration-300 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 dark:bg-gray-800 dark:text-white">
            <img src="{{ asset('images/icon_TA/folder.png') }}" class="w-24 h-24 md:w-32 md:h-32 mx-auto" alt="...">
            <h2 class="text-lg md:text-xl font-bold mb-2 mt-2">
                <a href="/beranda-detail/{{ $show->_id }}">
                    @php echo strtoupper($show->judul); @endphp</a>
            </h2>
            <p class="text-sm text-gray-900 my-4">
                {{ $show->nama }} <br> {{ $show->nim }}
            </p>
        </div>
    @endforeach
    </div>

    
    <!-- pagination -->
    <div class="flex flex-col items-center mt-8 mb-8">
        <span class="text-sm font-semibold text-gray-700 dark:text-gray-400">
            Showing <span class="font-bold">{{ $showTA->firstItem() }}</span> to <span class="font-bold">{{ $showTA->lastItem() }}</span> of <span class="font-bold">{{ $showTA->total() }}</span> entries
        </span>
        <div class="flex flex-wrap justify-center mt-4">
            @if ($showTA->onFirstPage())
            <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded-lg mr-2 cursor-not-allowed">Prev</span>
            @else
            <a href="{{ $showTA->previousPageUrl() }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg mr-2 hover:bg-gray-300">Prev</a>
            @endif

            @php
                $start = 1;
                $end = $showTA->lastPage();

                if ($showTA->lastPage() > 5) {
                    $start = max($showTA->currentPage() - 2, 1);
                    $end = min($showTA->currentPage() + 2, $showTA->lastPage());

                    if ($start == 1) {
                        $end = min($end + abs($start - $showTA->currentPage()) , $showTA->lastPage());
                    }

                    if ($end == $showTA->lastPage()) {
                        $start = max($start - abs($end - $showTA->currentPage()), 1);
                    }
                }
            @endphp

            @foreach ($showTA->getUrlRange($start, $end) as $page => $url)
                @if ($page == $showTA->currentPage())
                    <span class="px-3 py-1 bg-gray-800 text-white rounded-lg mr-2">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg mr-2 hover:bg-gray-300">{{ $page }}</a>
                @endif
            @endforeach

            @if ($showTA->hasMorePages())
            <a href="{{ $showTA->nextPageUrl() }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg mr-2 hover:bg-gray-300">Next</a>
            @else
            <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded-lg mr-2 cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>


@endsection