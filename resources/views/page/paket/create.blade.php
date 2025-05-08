<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PAKET') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full">
                                FORM INPUT PAKET
                            </div>
                        </div>
                    </div>
                    {{-- FORMULIR --}}
                    <div>
                        <form class="w-full mx-auto" method="POST" action="{{ route('paket.store') }}">
                            @csrf
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="kode_paket"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Kode Paket
                                    </label>
                                    <input type="text" id="kode_paket" name="kode_paket" value="{{ $kode_paket }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Kode Paket" readonly required />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="base-input"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                        name="jenis_paket" data-placeholder="Pilih Jenis" readonly required>
                                        <option value="">Pilih...</option>
                                        <option value="Wedding"> Paket Wedding</option>
                                        <option value="Khitan">Paket Khitan</option>
                                        <option value="Engagement">Paket Engagement</option>
                                        <option value="Graduation">Paket Graduation</option>
                                        <option value="Birthday">Paket Birthday</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- END FORMULIR --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
