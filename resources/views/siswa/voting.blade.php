<x-app-layout>
    @if ($userHasVoted)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 font-bold text-gray-900 dark:text-gray-100">
                        {{ __("Kamu Telah Memilih Calon!") }}
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="min-h-screen flex items-center justify-center">
            <div class="flex flex-wrap gap-6 justify-center">
                @foreach ($kandidat as $kandidat)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-4 mt-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white">
                            Calon Nomor Urut {{ $loop->iteration }}
                        </h5>
                        <img class="w-full h-96 object-cover" src="{{asset('images/' . $kandidat->photo)}}"
                            alt="Foto Kandidat" />
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $kandidat->nama }}
                            </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$kandidat->kelas}}</p>
                            <button data-modal-target="konfirmasi{{$kandidat->id}}"
                                data-modal-toggle="konfirmasi{{$kandidat->id}}" type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Pilih
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <x-modal-konfirmasipilih :kandidat="$kandidat"></x-modal-konfirmasipilih>
                @endforeach
            </div>
        </div>
    @endif




</x-app-layout>