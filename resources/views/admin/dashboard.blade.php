@extends('layouts.main-app')
<layouts-main-app>
    <x-sidebar-admin>

    </x-sidebar-admin>

    <div class="p-4 sm:ml-64 bg-white dark:bg-gray-900">
        <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
            <div
                class="items-center justify-between p-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="w-full">
                    <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total Siswa</h3>
                    <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{$totalsiswa}} Siswa</span>
                </div>
                <div class="w-full" id="new-products-chart"></div>
            </div>
            <div
                class="items-center justify-between p-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="w-full">
                    <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Suara Masuk</h3>
                    <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{$suaramasuk}} Suara</span>
                </div>
                <div class="w-full" id="week-signups-chart"></div>
            </div>
            <div
                class="items-center justify-between p-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="w-full">
                    <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Belum Voting</h3>
                    <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{$belumvoting}} Siswa</span>
                    
                </div>
                <div class="w-full" id="week-signups-chart"></div>
            </div>
        </div>
    </div>
    
    <x-message_action></x-message_action>
</layouts-main-app>