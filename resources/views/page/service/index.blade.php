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
                                    {{-- @php
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
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $photo->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
