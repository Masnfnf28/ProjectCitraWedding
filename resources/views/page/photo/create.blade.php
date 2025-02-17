<x-app-layout>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="gap-5 items-start flex">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-1/3 p-4">
                <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                    FORM INPUT CLIENT
                </div>
                <div>
                    <form class="max-w-sm mx-auto" method="POST" action="{{ route('photo.store') }}">
                        @csrf
                        <div class="mb-5">
                            <label for="photography"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photograpy</label>
                            <input type="text" name="photography"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required placeholder="Masukkan Vendor Foto" />
                        </div>
                        <div class="mb-5">
                            <label for="album"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">JENIS ALBUM</label>
                            <input type="text" name="album"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required placeholder="Masukkan Nama Pengantin Wanita" />
                        </div>
                        <div class="mb-5">
                            <label for="desc"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea type="text" name="desc"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> </textarea>
                        </div>
                        <div class="mb-5">
                            <label for="harga"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                            </label>
                            <input type="text" name="harga"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required placeholder="Masukkan No Telepon" />
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
