<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
            {{ __('PAKET') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4 bg-gray-100 rounded-xl mb-2 font-bold flex items-center justify-between ">
                        <div>DATA PAKET</div>
                        <div>
                            <a href="{{ route('paket.create') }}" onclick="return functionAdd()"
                                class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500 justify-between">
                                <i class="fi fi-sr-square-plus p-"></i></a>
                        </div>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr class="text-center font-semibold">
                                    <th scope="col" class="px-4 py-3">
                                        NO
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        KODE PAKET
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        JENIS PAKET
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        TYPE MAKEUP
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        TYPE ALBUM
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        TYPE WARDROBE
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        TYPE CATERING
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        UKURAN TENDA
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        TYPE DEKORASI
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        TYPE HIBURAN
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        TOTAL HARGA
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        ACTION
                                    </th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($paket as $key => $p)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $paket->perPage() * ($paket->currentPage() - 1) + $key + 1 }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $p->kode_paket }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $p->jenis_paket }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $p->makeup->id_makeup }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $p->album->jenis_album }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $p->wardrobe->type_wardrobe }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $p->catering->type_catering }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $p->tenda->uk_tenda }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $p->dekorasi->type_dekorasi }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $p->hiburan->type_hiburan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            Rp{{ $p->total_harga }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button type="button" data-id="{{ $p->id }}"
                                                data-modal-target="sourceModal" {{-- data-dibayar="{{ $p->dibayar }}" --}}
                                                data-makeup="{{ $p->makeup->type_makeup }}"
                                                data-wardrobe="{{ $p->wardrobe->type_wardrobe }}"
                                                data-album="{{ $p->album->jenis_album }}"
                                                data-catering="{{ $p->catering->type_catering }}"
                                                data-tenda="{{ $p->tenda->uk_tenda }}"
                                                data-dekorasi="{{ $p->dekorasi->type_dekorasi }}"
                                                data-hiburan="{{ $p->hiburan->type_hiburan }}"
                                                onclick="editSourceModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                Edit
                                            </button>
                                            <button
                                                onclick="return transaksiDelete('{{ $p->id }}','{{ $p->client->namapl }}')"
                                                class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">
                                                Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $paket->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Update Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col  p-4 space-y-6">
                        {{-- <div class="mb-5">
                            <label for="makeup"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MAKEUP
                                Pembayaran</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                id="dibayar" name="dibayar" data-placeholder="Pilih Konsinyasi">
                                <option value="">Pilih...</option>
                                <option value="Lunas">Lunas</option>
                                <option value="Belum Lunas" selected>Belum Lunas</option>
                            </select>
                        </div> --}}
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Paket
                            </label>
                            <input type="text" id="paket" name="paket"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Paket">
                        </div>
                        <div class="mb-5 w-full">
                            <label for="id_makeup"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Make Up</label>
                            <select
                                class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                name="id_makeup" id="id_makeup">
                                <option value="" disabled selected>Pilih...</option>
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
                                class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                name="id_album" id="id_album">
                                <option value="" disabled selected>Pilih...</option>
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
                                class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                name="id_wardrobe" id="id_wardrobe">
                                <option value="" disabled selected>Pilih...</option>
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
                                class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                name="id_catering" id="id_catering">
                                <option value="" disabled selected>Pilih...</option>
                                @foreach ($catering as $c)
                                    <option value="{{ $c->id }}" data-harga="{{ $c->harga }}">
                                        {{ $c->type_catering }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5 w-full">
                            <label for="id_tenda"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tenda</label>
                            <select
                                class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                name="id_tenda" id="id_tenda">
                                <option value="" disabled selected>Pilih...</option>
                                @foreach ($tenda as $t)
                                    <option value="{{ $t->id }}" data-harga_tenda="{{ $t->harga }}">
                                        {{ $t->uk_tenda }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5 w-full">
                            <label for="id_hiburan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dekorasi</label>
                            <select
                                class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                name="id_dekorasi" id="id_dekorasi">
                                <option value="" disabled selected>Pilih...</option>
                                @foreach ($dekorasi as $d)
                                    <option value="{{ $d->id }}" data-harga_dekorasi="{{ $d->harga }}">
                                        {{ $d->type_dekorasi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5 w-full">
                            <label for="id_hiburan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hiburan</label>
                            <select
                                class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                name="id_hiburan" id="id_hiburan">
                                <option value="" disabled selected>Pilih...</option>
                                @foreach ($hiburan as $h)
                                    <option value="{{ $h->id }}" data-harga_hiburan="{{ $h->harga }}">
                                        {{ $h->type_hiburan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const id_makeup = button.dataset.id_makeup;
        const id_paket = button.dataset.id_paket;
        const id_album = button.dataset.id_album;
        const id_wardrobe = button.dataset.id_wardrobe;
        const id_catering = button.dataset.id_catering;
        const id_tenda = button.dataset.id_tenda;
        const id_hiburan = button.dataset.id_hiburan;
        const id_dekorasi = button.dataset.id_dekorasi;
        let url = "{{ route('transaksi.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);

        // Set nilai untuk combobox
        // const dibayarSelect = document.getElementById('dibayar');
        // dibayarSelect.value = dibayar;

        // Jika menggunakan Select2 atau plugin serupa, trigger event change
        // $(dibayarSelect).trigger('change');

        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);

        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('name', '_token');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        formModal.appendChild(csrfToken);

        let methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PATCH');
        formModal.appendChild(methodInput);

        status.classList.toggle('hidden');
    }

    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let status = document.getElementById(modalTarget);
        status.classList.toggle('hidden');
    }

    const paketDelete = async (id, client) => {
        let tanya = confirm(`Apakah anda yakin untuk menghapus ${paket}?`);
        if (tanya) {
            try {
                const response = await axios.post(`/paket/${id}`, {
                    '_method': 'DELETE',
                    '_token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                });

                if (response.status === 200) {
                    alert('Paket berhasil dihapus');
                    location.reload();
                } else {
                    alert('Gagal menghapus paket. Silakan coba lagi.');
                }
            } catch (error) {
                console.error(error);
                alert('Terjadi kesalahan saat menghapus paket. Silakan cek konsol untuk detail.');
            }
        }
    }
</script>
