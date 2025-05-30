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
                                    <select name="id_client" id="id_client"
                                        class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500
     bg-gray-50 text-sm rounded-lg block w-full p-2.5
     dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                        data-placeholder="Pilih Client">
                                        <option value="" selected>Pilih...</option>
                                        @foreach ($client as $k)
                                            <option value="{{ $k->id }}"
                                                {{ old('id_client') == $k->id ? 'selected' : '' }}>
                                                {{ $k->namapl }} -  {{ $k->namapr }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="tanggal"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Booking</label>
                                    <input type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        required />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="tanggal_acara"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Acara</label>
                                    <input type="date" id="tanggal_acara" name="tanggal_acara"
                                        value="{{ date('Y-m-d') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        required />
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="id_paket"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                        Paket</label>
                                    <select
                                        class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500
bg-gray-50 text-sm rounded-lg block w-full p-2.5
dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                        name="id_paket" id="id_paket" data-placeholder="Pilih Paket">
                                        <option value="" disabled selected>Pilih...</option>
                                        @foreach ($paket as $p)
                                            <option value="{{ $p->id }}"
                                                data-total_harga="{{ $p->total_harga }}">
                                                {{ $p->kode_paket }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="total_harga"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                        Harga</label>
                                    <input type="text" id="total_harga" readonly
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
            const paket = document.querySelector('#id_paket'); // dropdown paket
            const totalHarga = document.querySelector('#total_harga'); // input tampil harga (text)
            const totalHargaInput = document.querySelector('#total_bayar'); // input hidden (submit)

            paket.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const harga = parseInt(selectedOption.dataset.total_harga || 0);

                totalHarga.value = "Rp " + harga.toLocaleString('id-ID');
                totalHargaInput.value = harga;
            });
        });
    </script>

</x-app-layout>
