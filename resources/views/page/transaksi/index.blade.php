<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
            {{ __('BOOKING') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4 bg-gray-100 rounded-xl mb-2 font-bold flex items-center justify-between ">
                        <div>DATA BOOOKING</div>
                        <div>
                            <a href="{{ route('transaksi.create') }}" onclick="return functionAdd()"
                                class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500 justify-between">
                                <i class="fi fi-sr-square-plus p-"></i></a>
                        </div>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-black dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr class="text-center font-semibold">
                                    <th scope="col" class="px-4 py-3">
                                        NO
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        KODE INVOICE
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        CLIENT
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        KODE PAKET
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        JENIS PAKET
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        TANGGAL
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        TANGGAL ACARA
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        STATUS
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        DIBAYAR
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        TOTAL BAYAR
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
                                @foreach ($transaksi as $key => $t)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $transaksi->perPage() * ($transaksi->currentPage() - 1) + $key + 1 }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $t->kode_invoice }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->client->namapl }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->paket->kode_paket }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->paket->jenis_paket }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->tanggal }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->tanggal_acara }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->status }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->pembayaran }}
                                        </td>
                                        <td class="px-6 py-4">
                                            Rp {{ number_format($t->total_bayar, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button type="button" onclick="editSourceModal(this)"
                                                data-id="{{ $t->id }}" data-modal-target="sourceModal"
                                                data-tanggal_acara="{{ $t->tanggal_acara }}"
                                                data-pembayaran="{{ $t->pembayaran }}"
                                                data-status="{{ $t->status }}"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                Edit
                                            </button>
                                            <button
                                                onclick="return transaksiDelete('{{ $t->id }}','{{ $t->client->namapl }}')"
                                                class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $transaksi->links() }}
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
                        <div class="mb-5">
                            <label for="pembayaran"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                Pembayaran</label>
                            {{-- <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                id="pembayaran" name="pembayaran" data-placeholder="Pilih Status">
                                <option value="">Pilih...</option>
                                <option value="Dana Pertama">Dana Pertama</option>
                                <option value="Lunas">Lunas</option>
                            </select> --}}
                            <select
                                class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                id="pembayaran" name="pembayaran" data-placeholder="Pilih Status Pembayaran">
                                <option value="">Pilih Status Pembayaran...</option>
                                <option value="Dana Pertama"> Dana Pertama</option>
                                <option value="Lunas">Lunas</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                Booking</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                id="status" name="status" data-placeholder="Pilih Status">
                                <option value="">Pilih...</option>
                                <option value="Baru">Baru Booking</option>
                                <option value="Selesai">Selesai</option>
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
        // const formModal = document.getElementById('formSourceModal');
        // const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const pembayaran = button.dataset.pembayaran;
        const status = button.dataset.status;

        document.getElementById('pembayaran').value = pembayaran;
        document.getElementById('status').value = status;

         const form = document.getElementById('formSourceModal');
        form.action = `/transaksi/${id}`; // Pastikan ini sesuai route Anda
        form.method = 'POST';

        // Tambah input hidden _method = PUT untuk update
        if (!form.querySelector('input[name="_method"]')) {
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'PUT';
            form.appendChild(methodInput);
        }

         // Tampilkan modal
        document.getElementById('sourceModal').classList.remove('hidden');

        // let url = "{{ route('transaksi.update', ':id') }}".replace(':id', id);

        // let status = document.getElementById(modalTarget);

        // // Set nilai untuk combobox
        // const pembayaranSelect = document.getElementById('pembayaran');
        // pembayaranSelect.value = pembayaran;

        // // Jika menggunakan Select2 atau plugin serupa, trigger event change
        // $(pembayaranSelect).trigger('change');

        // document.getElementById('formSourceButton').innerText = 'Simpan';
        // document.getElementById('formSourceModal').setAttribute('action', url);

        // let csrfToken = document.createElement('input');
        // csrfToken.setAttribute('type', 'hidden');
        // csrfToken.setAttribute('name', '_token');
        // csrfToken.setAttribute('value', '{{ csrf_token() }}');
        // formModal.appendChild(csrfToken);

        // let methodInput = document.createElement('input');
        // methodInput.setAttribute('type', 'hidden');
        // methodInput.setAttribute('name', '_method');
        // methodInput.setAttribute('value', 'PATCH');
        // formModal.appendChild(methodInput);

        // status.classList.toggle('hidden');
    }

    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let status = document.getElementById(modalTarget);
        status.classList.toggle('hidden');
    }

    const transaksiDelete = async (id, ) => {
        let tanya = confirm(`Apakah anda yakin untuk menghapus transaksi ${client}?`);
        if (tanya) {
            try {
                const response = await axios.post(`/transaksi/${id}`, {
                    '_method': 'DELETE',
                    '_token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                });

                if (response.status === 200) {
                    alert('Transaksi berhasil dihapus');
                    location.reload();
                } else {
                    alert('Gagal menghapus transaksi. Silakan coba lagi.');
                }
            } catch (error) {
                console.error(error);
                alert('Terjadi kesalahan saat menghapus transaksi. Silakan cek konsol untuk detail.');
            }
        }
    }
</script>
