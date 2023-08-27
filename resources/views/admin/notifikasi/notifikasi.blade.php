@extends('layouts.master')

@section('title', 'Notifikasi')

@section('content')
<div class="w-full md:w-1/2 mt-4 mb-7 md:mt-6 mx-auto">
    @foreach($notifikasi as $notif)
        @if($notif->jenis == "tugas akhir")
            <!-- notifikasi yang dikirimkan untuk user -->
            @if($notif->status == "ACC")
                <div id="alert-additional-content-3"
                    @if($notif->is_read == "read")
                        class="p-4 mb-4 text-gray-500 border border-gray-300 rounded-lg bg-gray-300 dark:bg-gray-400 dark:text-green-400 dark:border-green-800" role="alert"
                    @else
                        class="p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert"
                    @endif
                    >
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-bold">{{ $notif->title }}</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm text-black">
                        Tugas Akhir yang berjudul <label class="text-green-800 font-bold">{{ $notif->title }}</label> telah di <label class="text-green-800 font-bold">{{ $notif->status }}</label> oleh <label class="text-green-800 font-bold">{{ $notif->perespon }}</label> dengan alasan <label class="text-green-800 font-bold">"{{ $notif->message }}"</label>. @if(auth()->user()->user_status == "user") Jika ada yang kurang jelas anda dipersilahkan untuk menghubungi orang yang bersangkutan. @endif
                    </div>
                    <div class="flex mt-6">
                        
                        <!-- button notifikasi sudah dibaca tugas akhir (ACC) -->
                        @if($notif->is_read == "unread")
                            <form action="/notifikasi-read/{{$notif->_id}}" method="POST">
                                @csrf
                                <button type="submit" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                    Tandai sudah dibaca
                                </button>
                            </form>
                        @endif

                        <form action="/notifikasi/{{$notif->_id}}" method="POST">
                            @csrf
                            <!-- button notifikasi hapus (ACC) -->
                            <button type="submit" 
                            @if($notif->is_read == "read")
                                class="text-green-800 bg-transparent border border-green-800 hover:bg-green-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-green-600 dark:border-green-600 dark:text-green-400 dark:hover:text-white dark:focus:ring-green-800"
                            @else
                                class="text-green-800 bg-transparent border border-green-800 hover:bg-green-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-green-600 dark:border-green-600 dark:text-green-400 dark:hover:text-white dark:focus:ring-green-800"
                            @endif
                            >
                                Hapus
                            </button>
                        </form>

                    </div>
                </div>
            @elseif($notif->status == "TOLAK")
                <div id="alert-additional-content-2"
                    @if($notif->is_read == "read")
                        class="p-4 mb-4 text-gray-500 border border-gray-300 rounded-lg bg-gray-300 dark:bg-gray-400 dark:text-red-400 dark:border-red-800" role="alert"
                    @else
                        class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert"
                    @endif
                >
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-bold">{{ $notif->title }}</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm text-black">
                        Tugas Akhir yang berjudul <label class="text-red-800 font-bold">{{ $notif->title }}</label> telah di <label class="text-red-800 font-bold">{{ $notif->status }}</label> oleh <label class="text-red-800 font-bold">{{ $notif->perespon }}</label> dengan alasan <label class="text-red-800 font-bold">"{{ $notif->message }}"</label>. @if(auth()->user()->user_status == "user") Jika ada yang kurang jelas anda dipersilahkan untuk menghubungi orang yang bersangkutan. @endif
                    </div>
                    <div class="flex mt-6">

                        <!-- button notifikasi sudah dibaca tugas akhir (TOLAK) -->
                        @if($notif->is_read == "unread")
                            <form action="/notifikasi-read/{{$notif->_id}}" method="POST">
                                @csrf
                                <button type="submit" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                    Tandai sudah dibaca
                                </button>
                            </form>
                        @endif

                        <form action="/notifikasi/{{$notif->_id}}" method="POST">
                            @csrf
                            <!-- button notifikasi hapus (TOLAK) -->
                            <button type="submit" 
                            @if($notif->is_read == "read")
                                class="text-red-800 bg-transparent border border-red-800 hover:bg-red-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800"
                            @else
                                class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800"
                            @endif
                            >
                                Hapus
                            </button>
                        </form>

                    </div>
                </div>
            @endif
        @else
            <div id="alert-additional-content-3"
            @if($notif->is_read == "read")
                class="p-4 mb-4 text-gray-500 border border-gray-300 rounded-lg bg-gray-300 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert"
            @else
                class="p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert"
            @endif
            >
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <h3 class="text-lg font-bold">{{ $notif->title }}</h3>
                </div>
                <div class="mt-2 mb-4 text-sm text-black">
                    {{ $notif->message }}
                </div>
                <div class="flex mt-6">

                    <!-- button sudah dibaca notifikasi admin -->
                    @if($notif->is_read == "unread")
                        <form action="/notifikasi-read/{{$notif->_id}}" method="POST">
                            @csrf
                            <button type="submit" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                Tandai sudah dibaca
                            </button>
                        </form>
                    @endif

                    <form action="/notifikasi/{{$notif->_id}}" method="POST">
                        @csrf
                        <!-- button hapus notifikasi admin -->
                        <button type="submit" 
                        @if($notif->is_read == "read")
                            class="text-green-800 bg-transparent border border-green-800 hover:bg-green-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-green-600 dark:border-green-600 dark:text-green-400 dark:hover:text-white dark:focus:ring-green-800"
                        @else
                            class="text-green-800 bg-transparent border border-green-800 hover:bg-green-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-green-600 dark:border-green-600 dark:text-green-400 dark:hover:text-white dark:focus:ring-green-800"
                        @endif
                        >
                            Hapus
                        </button>
                    </form>

                </div>
            </div>
        @endif
    @endforeach
</div>
@endsection