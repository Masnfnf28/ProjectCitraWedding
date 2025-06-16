<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CITRA WEDDING ORGANIZER') }}
        </h2>
    </x-slot>

    @can('role=OWNER')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Cards Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Booking Card -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-500">Total Booking</div>
                                    <div class="text-2xl font-bold text-gray-900">{{ $totalBooking }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pendapatan Card -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V4m0 4h.01m-6.938 4h7.178A2 2 0 0016 12v4a2 2 0 002 2h4v-4a2 2 0 00-2-2H8a2 2 0 00-2 2v4a2 2 0 002 2h7.178A2 2 0 0012 16v-4z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-500">Total Pendapatan</div>
                                    <div class="text-2xl font-bold text-gray-900">Rp
                                        {{ number_format($totalPembayaran, 0, ',', '.') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pengeluaran Card -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-500">Total Pengeluaran</div>
                                    <div class="text-2xl font-bold text-gray-900">Rp 15.000.000</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kontak Card -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-500">Total Client</div>
                                    <div class="text-2xl font-bold text-gray-900">{{ $totalClient }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Content (Optional) -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Statistik Minggu Ini</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Chart Placeholder -->
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <p class="text-gray-700">Grafik Pendapatan</p>
                                <canvas id="incomeChart"></canvas>
                            </div>
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <p class="text-gray-700">Grafik Pengeluaran</p>
                                <canvas id="expenseChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card mt-4">
                    <div class="card-header">
                        <h5>Daftar Acara</h5>
                    </div>
                    <div class="card-body">
                        @if ($daftarAcara->isEmpty())
                            <p class="text-gray-600">Tidak ada acara.</p>
                        @else
                            <ul class="space-y-2">
                                @foreach ($daftarAcara as $acara)
                                    <li class="flex justify-between items-center border-b pb-1">
                                        <span>
                                            {{ optional($acara->client)->nama_client ?? 'Client tidak ditemukan' }}
                                        </span>
                                        <span class="text-sm text-gray-500">
                                            {{ $acara->formatted_date }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

            </div>

        </div>
        </div>
    @endcan

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const incomeCtx = document.getElementById('incomeChart').getContext('2d');
        const incomeChart = new Chart(incomeCtx, {
            type: 'bar',
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                datasets: [{
                    label: 'Pendapatan Harian',
                    data: [5000, 7000, 6000, 8000, 9000, 10000, 12000],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
