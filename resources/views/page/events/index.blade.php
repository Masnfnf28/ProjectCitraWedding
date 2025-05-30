    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Events') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="gap-5 items-start flex">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-1/2 p-4">
                        <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                            FORM INPUT EVENTS
                        </div>
                        <div>
                            <form class="max-w-sm mx-auto" method="POST" action="{{ route('events.store') }}">
                                @csrf
                                <div class="mb-5">
                                    <label for="id_client"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Client</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full"
                                        name="id_client" id="id_client" data-placeholder="Pilih Client">
                                        <option value="">Pilih...</option>
                                        @foreach ($client as $c)
                                            <option value="{{ $c->id}}">{{ $c->namapl}} &
                                                {{ $c->namapr}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <label for="tgl_acara"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Acara</label>
                                    <input type="date" name="tgl_acara"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" "> </textarea>
                                </div>
                                <div class="mb-5">
                                    <label for="lokasi"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi</label>
                                    <input type="text" name="lokasi"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ">
                                    </textarea>
                                </div>
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            </form>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                        <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                            EVENTS
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
                                                CLIENT
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                TANGGAL ACARA
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                LOKASI
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
                                        @foreach ($events as $e)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 px-4"
                                                align="center">
                                                <th scope="row"
                                                    class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                    {{ $no++ }}
                                                </th>
                                                <td class="px-5 py-3">
                                                    {{ $e->client->namapl ?? 'N/A' }}
                                                </td>
                                                <td class="px-5 py-3 bg-gray-100">
                                                    {{ $e->tgl_acara }}
                                                </td>
                                                <td class="px-5 py-3 bg-gray-100">
                                                    {{ $e->lokasi }}
                                                </td>
                                                <td class="px-5 py-3">
                                                    <button type="button"
                                                        class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500"
                                                        onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                                        data-id="{{ $e->id }}"
                                                        data-id_client="{{ $e->id_client }}"
                                                        data-client="{{ $e->client->namapl ?? 'N/A' }}"
                                                        data-tgl_acara="{{ $e->tgl_acara }}"
                                                        data-lokasi="{{ $e->lokasi }}">
                                                        <i class="fi fi-sr-file-edit"></i>
                                                    </button>
                                                    <button
                                                        class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                                        onclick="return eventsDelete('{{ $e->id }}','{{ $e->id_client }}')"
                                                        >
                                                        <i class="fi fi-sr-delete-document"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {{ $events->links() }}
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
                                <label for="id_client_edit"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Client</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="id_client_edit" id="id_client" data-placeholder="Pilih Client">
                                    <option value="">Pilih...</option>
                                    @foreach ($client as $c)
                                        <option value="{{ $c->id }}">{{ $c->namapl}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                    Acara</label>
                                <input type="date" id="tgl_acara" name="tgl_acara"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Lokasi</label>
                                <input type="text" id="lokasi" name="lokasi"
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
    </x-app-layout>
    <script>
        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const id_client = button.dataset.id_client;
            const client = button.dataset.client;
            const tgl_acara = button.dataset.tgl_acara;
            const lokasi = button.dataset.lokasi;
            let url = "{{ route('events.update', ':id') }}".replace(':id', id);

            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `UPDATE EVENTS ${button.dataset.client}`;

            let event = new Event('change');

            document.querySelector('[name="id_client_edit"]').value = id_client;
            document.querySelector('[name="id_client_edit"]').dispatchEvent(event);

            document.getElementById('tgl_acara').value = tgl_acara;
            document.getElementById('lokasi').value = lokasi;

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

        const eventsDelete = async (id, client) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus Events ${client} ?`);
            if (tanya) {
                await axios.post(`/events/${id}`, {
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
    </script>
