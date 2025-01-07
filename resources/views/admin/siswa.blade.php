@extends('layouts.main-app')
<layouts-main-app>
    <x-sidebar-admin>
    </x-sidebar-admin>


    <div class="p-4 sm:ml-64 bg-white dark:bg-gray-900">

        <!-- table -->

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div
                class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="cari-nama-siswa" name="cari-nama-siswa"
                        class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari nama siswa">
                </div>
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <button data-modal-target="tambah-siswa" data-modal-toggle="tambah-siswa"
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
                    <button data-modal-target="import" data-modal-toggle="import"type="button"
                        class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Import
                    </button>
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-2 mb-3">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="w-12 px-6 py-3 border-r dark:border-gray-600">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NIS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status Voting
                        </th>
                        <th scope="col" class="w-36 px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $siswa)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 border-r dark:border-gray-600">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-bold text-gray-900 dark:text-white">{{$siswa->nama}}</p>
                            </td>
                            <td class="px-6 py-4">
                                {{ $siswa->nis }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if ($siswa->hasVoted)
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Sudah
                                    @else
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Belum
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <!-- Modal toggle -->
                                <a type="button" data-modal-target="editUserModal{{$siswa->id}}"
                                    data-modal-toggle="editUserModal{{$siswa->id}}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer">Edit
                                    user</a>
                            </td>
                        </tr>

                        <x-update-siswa :siswa="$siswa" :></x-update-siswa>
                    @endforeach
                </tbody>
            </table>
            {{ $user->links() }}
        </div>
        <!-- end table -->

        <!-- modal -->

        <x-upload-siswa></x-upload-siswa>
        <x-modal-importsiswa></x-modal-importsiswa>

        <!-- modal end -->


    </div>

    <x-message_action></x-message_action>
</layouts-main-app>