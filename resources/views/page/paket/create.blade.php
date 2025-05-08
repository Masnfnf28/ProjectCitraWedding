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
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                        Paket</label>
                                    <select
                                        class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500
           bg-gray-50 text-sm rounded-lg block w-full p-2.5
           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                        name="jenis_paket" data-placeholder="Pilih Jenis Paket" readonly required>
                                        <option value="" disabled selected>Pilih Jenis Paket...</option>
                                        <option value="Wedding"> Paket Wedding</option>
                                        <option value="Khitan">Paket Khitanan</option>
                                        <option value="Engagement">Paket Engagement</option>
                                        <option value="Graduation">Paket Graduation</option>
                                        <option value="Birthday">Paket Birthday Party</option>
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
                                        name="id_makeup" id="id_makeup">
                                        <option value="" disabled selected>Pilih Jenis Makeup...</option>
                                        @foreach ($makeup as $m)
                                            <option value="{{ $m->id }}" data-harga="{{ $m->harga }}">
                                                {{ $m->type_makeup }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="id_album"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Album</label>
                                    <select
                                        class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500
           bg-gray-50 text-sm rounded-lg block w-full p-2.5
           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                        name="id_album" id="id_album">
                                        <option value="" disabled selected>Pilih Jenis Album...</option>
                                        @foreach ($album as $a)
                                            <option value="{{ $a->id }}" data-harga="{{ $a->harga }}">
                                                {{ $a->jenis_album }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="id_wardrobe"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wardrobe</label>
                                    <select
                                        class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500
           bg-gray-50 text-sm rounded-lg block w-full p-2.5
           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                        name="id_wardrobe" id="id_wardrobe">
                                        <option value="" disabled selected>Pilih Jenis Wardrobe...</option>
                                        @foreach ($wardrobe as $w)
                                            <option value="{{ $w->id }}" data-harga="{{ $w->harga }}">
                                                {{ $w->type_wardrobe }}
                                            </option>
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
                                        name="id_catering" id="id_catering">
                                        <option value="" disabled selected>Pilih Jenis Catering...</option>
                                        @foreach ($catering as $c)
                                            <option value="{{ $c->id }}" data-harga="{{ $c->harga }}">
                                                {{ $c->type_catering }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="id_tenda"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tenda</label>
                                    <select
                                        class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500
           bg-gray-50 text-sm rounded-lg block w-full p-2.5
           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                        name="id_tenda" id="id_tenda">
                                        <option value="" disabled selected>Pilih Ukuran Tenda...</option>
                                        @foreach ($tenda as $t)
                                            <option value="{{ $t->id }}" data-harga="{{ $t->harga }}">
                                                {{ $t->uk_tenda }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="id_dekorasi"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dekorasi</label>
                                    <select
                                        class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500
           bg-gray-50 text-sm rounded-lg block w-full p-2.5
           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                        name="id_dekorasi" id="id_dekorasi">
                                        <option value="" disabled selected>Pilih Dekorasi...</option>
                                        @foreach ($dekorasi as $d)
                                            <option value="{{ $d->id }}" data-harga="{{ $d->harga }}">
                                                {{ $d->type_dekorasi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="id_hiburan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hiburan</label>
                                    <select
                                        class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500
           bg-gray-50 text-sm rounded-lg block w-full p-2.5
           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                        name="id_hiburan" id="id_hiburan">
                                        <option value="" disabled selected>Pilih Hiburan...</option>
                                        @foreach ($hiburan as $h)
                                            <option value="{{ $h->id }}" data-harga="{{ $h->harga }}">
                                                {{ $h->type_hiburan }}
                                            </option>
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
                                <a href="{{ route('paket.index') }}"
                                    class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-12 py-2.5 text-center">Batal</a>
                                <button type="submit"
                                    class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-12 py-2.5 text-center">Submit</button>
                            </div>
                        </form>
                    </div>
                    {{-- END FORMULIR --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const album = document.querySelector('#id_album');
            const makeup = document.querySelector('#id_makeup');
            const catering = document.querySelector('#id_catering');
            const wardrobe = document.querySelector('#id_wardrobe');
            const dekorasi = document.querySelector('#id_dekorasi');
            const hiburan = document.querySelector('#id_hiburan');
            const tenda = document.querySelector('#id_tenda');
            const totalHargaDisplay = document.querySelector('#total_harga_display');
            const totalHargaInput = document.querySelector('#total_bayar');

            function updateTotal() {
                const albumHarga = parseInt(album?.selectedOptions[0]?.dataset?.harga || 0);
                const makeupHarga = parseInt(makeup?.selectedOptions[0]?.dataset?.harga || 0);
                const cateringHarga = parseInt(catering?.selectedOptions[0]?.dataset?.harga || 0);
                const wardrobeHarga = parseInt(wardrobe?.selectedOptions[0]?.dataset?.harga || 0);
                const dekorasiHarga = parseInt(dekorasi?.selectedOptions[0]?.dataset?.harga || 0);
                const hiburanHarga = parseInt(hiburan?.selectedOptions[0]?.dataset?.harga || 0);
                const tendaHarga = parseInt(tenda?.selectedOptions[0]?.dataset?.harga || 0);

                const total = albumHarga + makeupHarga + cateringHarga + wardrobeHarga + dekorasiHarga + hiburanHarga + tendaHarga;
                totalHargaDisplay.value = "Rp " + total.toLocaleString('id-ID');
                totalHargaInput.value = total;
            }

            album.addEventListener('change', updateTotal);
            makeup.addEventListener('change', updateTotal);
            catering.addEventListener('change', updateTotal);
            wardrobe.addEventListener('change', updateTotal);
            dekorasi.addEventListener('change', updateTotal);
            hiburan.addEventListener('change', updateTotal);
            tenda.addEventListener('change', updateTotal);
        });
    </script>
</x-app-layout>
