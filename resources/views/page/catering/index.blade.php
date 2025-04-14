<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Catering') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-1/2 p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        FORM INPUT CATERING
                    </div>
                    <div>
                        <form class="max-w-sm mx-auto" method="POST" action="{{ route('catering.store') }}">
                            @csrf
                            <div class="mb-5">
                                <label for="type_catering"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type Catering
                                </label>
                                <input type="text" name="type_catering"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" " />
                            </div>
                            <div class="mb-5">
                                <label for="deskripsi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                <textarea type="text" name="deskripsi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                            </div>
                            <div class="mb-5">
                                <label for="porsi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Porsi Catering</label>
                                <input type="number" name="porsi" id="create_porsi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                            </div>
                            <div class="mb-5">
                                <label for="harga"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                <input type="int" name="harga" id="create_harga"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly/>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        DATA CATERING
                    </div>
                    <div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 bg-gray-100">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            TYPE CATERING
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            DESKRIPSI
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            PORSI CATERING
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
                                     @foreach ($catering as $c)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 px-4" align="center">
                                    <th scope="row"
                                        class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                        {{ $no++ }}
                                    </th>
                                    <td class="px-5 py-3">
                                        {{ $c->type_catering }}
                                    </td>
                                    <td class="px-5 py-3 bg-gray-100">
                                        {{ $c->deskripsi }}
                                    </td>
                                    <td class="px-5 py-3 bg-gray-100">
                                        {{ $c->porsi }} Orang
                                    </td>
                                    <td class="px-5 py-3 bg-gray-100">
                                        Rp{{ $c->harga }}
                                    </td>
                                    <td class="px-5 py-3">
                                        <button type="button"
                                            class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500"
                                            onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                            data-id="{{ $c->id }}" data-type_catering="{{ $c->type_catering }}"
                                            data-deskripsi="{{ $c->deskripsi }}" data-porsi="{{ $c->porsi }}"
                                            data-harga="{{ $c->harga }}">
                                            <i class="fi fi-sr-file-edit"></i>
                                        </button>
                                        <button class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                            onclick="return cateringDelete('{{ $c->id }}','{{ $c->type_catering }}')">
                                            <i class="fi fi-sr-delete-document"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {{ $catering->links() }}
                            </div>
                    </div>
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
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Type
                                Catering</label>
                            <input type="text" id="type_catering" name="type_catering"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Type Catering">
                        </div>
                        <div class="">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                            <textarea type="text" name="deskripsi" id="deskripsi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> </textarea>
                        </div>
                        <div class="">
                            <label for="number" class="block mb-2 text-sm font-medium text-gray-900">Porsi
                                Catering</label>
                            <input type="number" id="porsi" name="porsi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="">
                            <label for="int" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                            <input type="int" id="harga" name="harga"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                readonly>
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
        const type_catering = button.dataset.type_catering;
        const deskripsi = button.dataset.deskripsi;
        const porsi = button.dataset.porsi;
        const harga = button.dataset.harga;
        let url = "{{ route('catering.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `UPDATE CATERING ${type_catering}`;

        document.getElementById('type_catering').value = type_catering;
        document.getElementById('deskripsi').value = deskripsi;
        document.getElementById('porsi').value = porsi;
        document.getElementById('harga').value = harga;

        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);
        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
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

    const cateringDelete = async (id, type_catering) => {
        let tanya = confirm(`Apakah anda yakin untuk menghapus Catering ${type_catering} ?`);
        if (tanya) {
            await axios.post(`/catering/${id}`, {
                    '_method': 'DELETE',
                    '_token': $('meta[name="csrf-token"]').attr('content')
                })
                .then(function(response) {
                    // Handle success
                    location.reload();
                })
                .catch(function(error) {
                    // Handle error
                    alert('Error deleting record');
                    console.log(error);
                });
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        const porsiInput = document.getElementById('create_porsi');
        const hargaInput = document.getElementById('create_harga');

        if (porsiInput && hargaInput) {
            porsiInput.addEventListener('input', function() {
                const porsi = parseInt(this.value) || 0;
                hargaInput.value = porsi * 10000;
            });
        }
    });

    // Modal (update)
    document.getElementById('formSourceModal').addEventListener('input', function() {
        const porsi = parseInt(document.getElementById('porsi').value) || 0;
        document.getElementById('harga').value = porsi * 10000;
    });
</script>
