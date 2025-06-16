<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // use Carbon\Carbon;

    public function index()
    {
        $totalBooking = Transaksi::count();

        $totalPembayaran = Transaksi::sum('total_bayar');

        $totalClient = Client::distinct('id')->count('id');

        $daftarTanggalAcara = Transaksi::orderBy('tanggal_acara', 'asc')->get();

        $now = Carbon::now();

        $acaraBulanIni = Transaksi::whereMonth('tanggal_acara', $now->month)
            ->whereYear('tanggal_acara', $now->year)
            ->with('client') // Load relasi client
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->tanggal_acara)->day;
            });

        $daysInMonth = $now->daysInMonth;
        $startDay = $now->startOfMonth()->dayOfWeek;

        // Ambil semua transaksi dengan relasi client dan format tanggal
        $daftarAcara = Transaksi::with('client')
            ->orderBy('tanggal_acara', 'asc')
            ->get()
            ->map(function ($transaksi) {
                $transaksi->formatted_date = Carbon::parse($transaksi->tanggal_acara)
                    ->translatedFormat('d F Y');
                return $transaksi;
            });

        return view('dashboard', compact(
            'totalBooking',
            'totalClient',
            'daftarTanggalAcara',
            'now',
            'acaraBulanIni',
            'daysInMonth',
            'startDay',
            'daftarAcara',
            'totalPembayaran' // tambahkan variabel ini
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
