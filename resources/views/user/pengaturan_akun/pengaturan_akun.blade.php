@extends('layouts.master')

@section('title', 'Pengaturan Akun')

@section('content')

<div class="fixed inset-0 bg-gray-50 flex justify-center items-center">
    <div class="border border-gray-900 bg-blue-900 shadow-xl w-11/12 h-4/6 md:w-2/6 md:h-4/6 px-5 md:px-24 rounded-lg absolute inset-x-0 m-auto">
        
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
        @endif

        <div class="flex items-center justify-center mt-4 md:mt-8">

            @if(auth()->user()->image != new \MongoDB\BSON\Binary('', \MongoDB\BSON\Binary::TYPE_GENERIC))
                <!-- profile image -->
                <div class="relative w-20 h-20 md:w-32 md:h-32 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-600">
                    <img class="object-cover w-full h-full" src="{{ route('profile-image', auth()->user()->_id) }}" alt="">
                </div>
            @else
                <!-- avatar default -->
                <div class="relative w-20 h-20 md:w-32 md:h-32 overflow-hidden bg-gray-200 rounded-full dark:bg-gray-600">
                    <svg class="absolute w-20 h-20 mt-2.5 md:w-32 md:h-32 md:mt-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                </div>
            @endif
        </div>

        <div class="flex justify-center mt-4">
            <!-- form aktif -->
            <form action="/edit-pengaturan-akun/{{ auth()->user()->_id }}" method="GET">
                @csrf
                <button type="submit" class="focus:outline-none text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm md:px-6 px-4 md:py-2 py-1 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
            </form>
        </div>
        <!-- isi content -->
        <div class="mt-4 md:mt-18 overflow-x-auto">
            <table class="table-auto w-9/12 overflow-hidden mx-auto">
                <tbody class="text-sm md:text-xl font-semibold text-white">
                    <tr class=" hover:bg-green-300 hover:text-black">
                        <td class="py-2 px-1 text-left w-1/12 md:w-2/6">Nama</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ auth()->user()->nama_lengkap }} 
                        </td>
                    </tr>

                    <tr class=" hover:bg-green-300 hover:text-black">
                        <td class="py-2 px-1 text-left w-1/12 md:w-2/6">
                            @if(auth()->user()->user_status == "user")
                                NIM
                            @else
                                NIP
                            @endif
                        </td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            @if(auth()->user()->user_status == "user")
                                {{ auth()->user()->nim }} 
                            @else
                                {{ auth()->user()->nip }} 
                            @endif
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-300 hover:text-black">
                        <td class="py-2 px-1 text-left w-1/12 md:w-2/6">Nomor Hp</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ auth()->user()->nomor_hp }} 
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-300 hover:text-black">
                        <td class="py-2 px-1 text-left w-1/12 md:w-2/6">Email</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ auth()->user()->email }} 
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-300 hover:text-black">
                        <td class="py-2 px-1 text-left w-1/12 md:w-2/6">Jenis Kelamin</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ auth()->user()->jenis_kelamin }} 
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-300 hover:text-black">
                        <td class="py-2 px-1 text-left w-1/12 md:w-2/6">
                            @if(auth()->user()->user_status == "user")
                                Jurusan
                            @else
                                Status
                            @endif
                        </td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            @if(auth()->user()->user_status == "user")
                                {{ auth()->user()->jurusan }} 
                            @else
                                {{ auth()->user()->jabatan }} 
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection