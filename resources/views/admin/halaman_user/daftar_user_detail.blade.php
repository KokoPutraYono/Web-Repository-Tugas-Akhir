@extends('layouts.master')

@section('title', 'Daftar User Detail')

@section('content')
<div class="fixed inset-0 bg-gray-50 flex justify-center items-center">
    <div class="border border-gray-900 bg-blue-900 shadow-xl w-11/12 h-4/6 md:w-2/6 md:h-4/6 px-5 md:px-24 rounded-lg absolute inset-x-0 m-auto">
        <div class="flex items-center justify-center mt-8 md:mt-16">
            
            <!-- avatar default -->
            <div class="relative w-20 h-20 md:w-32 md:h-32 overflow-hidden bg-gray-200 rounded-full dark:bg-gray-600">
                <svg class="absolute w-20 h-20 mt-2.5 md:w-32 md:h-32 md:mt-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
            </div>
        </div>

        <!-- isi content -->
        <div class="mt-5 md:mt-10 overflow-x-auto">
            <table class="table-auto w-9/12 overflow-hidden mx-auto">
                <tbody class="text-sm md:text-xl font-semibold text-white">
                    <tr class=" hover:bg-green-300 hover:text-black">
                        <td class="py-2 px-1 text-left w-1/12 md:w-2/6">Nama</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $userDetail->nama_lengkap }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-300 hover:text-black">
                        <td class="py-2 px-1 text-left w-1/12 md:w-2/6">Nim</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $userDetail->nim }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-300 hover:text-black">
                        <td class="py-2 px-1 text-left w-1/12 md:w-2/6">Nomor Hp</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $userDetail->nomor_hp }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-300 hover:text-black">
                        <td class="py-2 px-1 text-left w-1/12 md:w-2/6">Email</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $userDetail->email }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-300 hover:text-black">
                        <td class="py-2 px-1 text-left w-1/12 md:w-2/6">Jenis Kelamin</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $userDetail->jenis_kelamin }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-300 hover:text-black">
                        <td class="py-2 px-1 text-left w-1/12 md:w-2/6">Angkatan</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $userDetail->angkatan }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-300 hover:text-black">
                        <td class="py-2 px-1 text-left w-1/12 md:w-2/6">Tingkatan</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $userDetail->tingkatan }}
                        </td>
                    </tr>
                    <tr class=" hover:bg-green-300 hover:text-black">
                        <td class="py-2 px-1 text-left w-1/12 md:w-2/6">Jurusan</td>
                        <td class="py-2 pl-2 pr-6 text-center">:</td>
                        <td class="py-2 px-2 text-left sm:whitespace-normal">
                            {{ $userDetail->jurusan }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection