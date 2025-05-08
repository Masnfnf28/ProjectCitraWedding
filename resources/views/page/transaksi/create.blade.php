<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full">
                                FORM INPUT TRANSAKSI
                            </div>
                        </div>
                    </div>
                    {{-- FORM INPUTAN --}}
                    <div>
                        <form class="w-full mx-auto" method="POST" action="{{ route('transaksi.store') }}">
                            @csrf
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="kode_invoice"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                        Invoice</label>
                                    <input type="text" id="kode_invoice" name="kode_invoice"
                                        value="{{ $kode_invoice }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        readonly required />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="id_client"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Client</label>
                                    <select name="id_client"
                                        class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500
     bg-gray-50 text-sm rounded-lg block w-full p-2.5
     dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                        data-placeholder="Pilih Client">
                                        <option value="" selected>Pilih...</option>
                                        @foreach ($client as $k)
                                            <option value="{{ $k->id }}"
                                                {{ old('id_client') == $k->id ? 'selected' : '' }}>
                                                {{ $k->namapl }}
                                            </option>
                                        @endforeach
                                    </select>


                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="tanggal"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                    <input type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        required />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="id_album"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Album</label>
                                    <select
                                        class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500
           bg-gray-50 text-sm rounded-lg block w-full p-2.5
           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                        name="id_album" id="id_album">
                                        <option value="" disabled selected>Pilih...</option>
                                        @foreach ($album as $k)
                                            <option value="{{ $k->id }}" data-harga="{{ $k->harga }}">
                                                {{ $k->jenis_album }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="id_makeup"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Make
                                        Up</label>
                                    <select
                                        class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500
bg-gray-50 text-sm rounded-lg block w-full p-2.5
dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                        name="id_makeup" id="id_makeup" data-placeholder="Pilih Make Up">
                                        <option value="" disabled selected>Pilih...</option>
                                        @foreach ($makeup as $k)
                                            <option value="{{ $k->id }}" data-harga="{{ $k->harga }}">
                                                {{ $k->type_makeup }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="id_catering"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catering</label>
                                    <select
                                        class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500
bg-gray-50 text-sm rounded-lg block w-full p-2.5
dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                        name="id_catering" id="id_catering" data-placeholder="Pilih Catering">
                                        <option value="" disabled selected>Pilih...</option>
                                        @foreach ($catering as $k)
                                            <option value="{{ $k->id }}" data-harga="{{ $k->harga }}">
                                                {{ $k->type_catering }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="total_harga_display"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                        Harga</label>
                                    <input type="text" id="total_harga_display" readonly
                                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        placeholder="Total harga">
                                    <input type="hidden" id="total_bayar" name="total_bayar">
                                </div>
                            </div>
                            <div class="flex justify-between mt-5">
                                <a href="{{ route('transaksi.index') }}"
                                    class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-12 py-2.5 text-center">Batal</a>
                                <button type="submit"
                                    class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-12 py-2.5 text-center">Submit</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const album = document.querySelector('#id_album');
            const makeup = document.querySelector('#id_makeup');
            const catering = document.querySelector('#id_catering');
            const totalHargaDisplay = document.querySelector('#total_harga_display');
            const totalHargaInput = document.querySelector('#total_bayar');

            function updateTotal() {
                const albumHarga = parseInt(album?.selectedOptions[0]?.dataset?.harga || 0);
                const makeupHarga = parseInt(makeup?.selectedOptions[0]?.dataset?.harga || 0);
                const cateringHarga = parseInt(catering?.selectedOptions[0]?.dataset?.harga || 0);

                const total = albumHarga + makeupHarga + cateringHarga;
                totalHargaDisplay.value = "Rp " + total.toLocaleString('id-ID');
                totalHargaInput.value = total;
            }

            album.addEventListener('change', updateTotal);
            makeup.addEventListener('change', updateTotal);
            catering.addEventListener('change', updateTotal);
        });
    </script>
</x-app-layout>
