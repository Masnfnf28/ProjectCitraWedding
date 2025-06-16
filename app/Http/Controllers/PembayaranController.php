<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'all', 'Lunas', 'Dana Pertama');

        $transaksis = Transaksi::query()
            ->when($status !== 'all', function ($query) use ($status) {
                $query->where('pembayaran', $status);
            })
            ->with(['client', 'album', 'makeup', 'catering'])
            ->latest()
            ->paginate(10);
        

        return view('page.pembayaran.index', [
            'transaksis' => $transaksis,
            'currentStatus' => $status
        ]);
    }

    // Update status pembayaran
    public function updateStatus(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->pembayaran = $request->pembayaran;
        $transaksi->save();

        return redirect()->route('pembayaran.index')->with('success', 'Status pembayaran berhasil diubah!');
    }
}
