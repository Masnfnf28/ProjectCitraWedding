<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Album') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full">
                                ALBUM
                            </div>
                            {{-- BUTTON REDIRECT HALAMAN ADD PENJUALAN --}}
                            <div>
                                <a href="{{ route('photo.create') }}"
                                    class="bg-sky-400 p-1 text-white rounded-xl px-4">Tambah</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-align-center text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            PHOTOGRAPHY
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            JENIS ALBUM
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            DESCRIPTION
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            HARGA
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            ACTION
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($photo as $p)
                                        <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $no++ }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $p->photography }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $p->album }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100 text-left">
                                                {{ $p->desc }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $p->harga }}
                                            </td>
                                                <td class="px-6 py-4 bg-gray-100">
                                                    <button type="button"
                                                    class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500"
                                                    onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                                    data-id="{{ $p->id }}" data-photography="{{ $p->photography }}"data-album="{{ $p->album }}"
                                                    data-alamat="{{ $p->desc }}" data-notelp="{{ $p->harga }}">
                                                    <i class="fi fi-sr-file-edit"></i>
                                                    </button>
                                                    <button
                                                        class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                                        onclick="return photoDelete('{{ $p->id }}','{{ $p->photography}}')">
                                                        <i class="fi fi-sr-delete-document"></i>
                                                    </button>
                                                </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $photo->links() }}
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
                                    <div class="">
                                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Type
                                            Makeup</label>
                                        <input type="text" id="photography" name="photograpy"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Type">
                                    </div>
                                    <div class="">
                                        <label for="text"
                                            class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                        <input type="text" id="album" name="album"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                    <div class="">
                                        <label for="text"
                                            class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                                        <input type="text" id="desc" name="desc"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                    <div class="">
                                        <label for="text"
                                            class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                                        <input type="text" id="harga" name="harga"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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

            </div>
        </div>
    </div>
    <script>
        const photoDelete = async (id, photography) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus transaksi ${photography}?`);
            if (tanya) {
                try {
                    const response = await axios.post(`/photo/${id}`, {
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
        };
    </script>
</x-app-layout>
