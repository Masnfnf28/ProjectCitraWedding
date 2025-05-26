<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TRACKING PEMBAYARAN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filter Status -->
            <div class="mb-4 flex space-x-2">
                <a href="{{ route('pembayaran.index', ['status' => 'all']) }}"
                    class="px-4 py-2 rounded-lg {{ request('status') === 'all' ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">
                    Semua
                </a>
                <a href="{{ route('pembayaran.index', ['status' => 'Dana Pertama']) }}"
                    class="px-4 py-2 rounded-lg {{ request('status') == 'Dana Pertama' ? 'bg-red-500 text-white' : 'bg-gray-200' }}">
                    Dana Pertama
                </a>
                <a href="{{ route('pembayaran.index', ['status' => 'Lunas']) }}"
                    class="px-4 py-2 rounded-lg {{ request('status') == 'Lunas' ? 'bg-green-500 text-white' : 'bg-gray-200' }}">
                    Lunas
                </a>
            </div>

            <!-- Tabel Pembayaran -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 p-4 mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Invoice</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Client</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Bayar
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaksi->kode_invoice }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaksi->client->namapl }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Rp
                                        {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($transaksi->pembayaran === 'Lunas')
                                            <div class="w-32 bg-gray-200 rounded-full h-4">
                                                <div class="bg-green-500 h-4 rounded-full text-xs text-center text-white"
                                                    style="width: 100%;">
                                                    100%
                                                </div>
                                            </div>
                                        @else
                                            <div class="w-32 bg-gray-200 rounded-full h-4">
                                                <div class="bg-yellow-400 h-4 rounded-full text-xs text-center text-white"
                                                    style="width: 50%;">
                                                    50%
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form method="POST"
                                            action="{{ route('pembayaran.update-status', $transaksi->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <select name="pembayaran" onchange="this.form.submit()"
                                                class="text-xs p-1 border rounded 
            {{ $transaksi->pembayaran == 'Lunas' ? 'bg-green-50' : 'bg-red-50' }}">
                                                <option value="Dana Pertama"
                                                    {{ $transaksi->pembayaran == 'Dana Pertama' ? 'selected' : '' }}>
                                                    Dana Pertama</option>
                                                <option value="Lunas"
                                                    {{ $transaksi->pembayaran == 'Lunas' ? 'selected' : '' }}>Lunas
                                                </option>
                                            </select>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $transaksis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
