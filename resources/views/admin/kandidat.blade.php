@extends('layouts.main-app')
<layouts-main-app>
    <x-sidebar-admin>
    </x-sidebar-admin>
    <div class="p-4 sm:ml-64 bg-white dark:bg-gray-900">

        <!-- table -->

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div
                class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <button data-modal-target="tambah-kandidat" data-modal-toggle="tambah-kandidat"
                        class="flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tambah
                    </button>
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-4">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="w-12 px-6 py-3 border-r dark:border-gray-600">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="w-28 py-3">
                            Kelas
                        </th>
                        <th scope="col" class="w-56 px-6 py-3">
                            Visi
                        </th>
                        <th scope="col" class="w-56 px-6 py-3">
                            Misi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Suara
                        </th>
                        <th scope="col" class="w-36 px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kandidat as $kandidat)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 h-32  ">
                            <td class="px-6 py-4 border-r dark:border-gray-600">
                                {{$loop->iteration}}
                            </td>
                            <td class="py-4 px-3">
                                <div class="flex items-center space-x-2">
                                    <img class="w-24 h-24 rounded-md object-cover"
                                        src="{{asset('images/' . $kandidat->photo)}}" alt="Photo">
                                    <div class="text-base font-semibold text-gray-900 dark:text-white">{{$kandidat->nama}}
                                    </div>

                                </div>
                            </td>
                            <td class="py-4">
                                {{$kandidat->kelas}}
                            </td>
                            <td class="">
                                <div class="max-h-36 overflow-y-auto">
                                    {{$kandidat->visi}}
                                </div>
                            </td>
                            <td class="">
                                <div class="max-h-36 overflow-y-auto">
                                    {{$kandidat->misi}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                {{$kandidat->total_votes}} Suara
                            </td>
                            <td class="px-6 py-4">
                                <!-- Modal toggle -->
                                <a type="button" data-modal-target="edit-kandidat{{$kandidat->id}}"
                                    data-modal-toggle="edit-kandidat{{$kandidat->id}}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer">Edit
                                    user</a>
                                <form action="{{ route('admin.kandidat.delete', $kandidat->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this kandidat?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <x-update-kandidat :kandidat="$kandidat"></x-update-kandidat>
                    @endforeach
                </tbody>
            </table>

        </div>


        <!-- end table -->

        <!-- modal tambah kandidat -->

        <x-upload-kandidat></x-upload-kandidat>

        <!-- modal tambah kandidat end -->


    </div>

    <x-message_action></x-message_action>

</layouts-main-app>