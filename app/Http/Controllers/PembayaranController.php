<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'all');
        
        $transaksis = Transaksi::query()
            ->when($status !== 'all', function ($query) use ($status) {
                $query->where('dibayar', $status);
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
        $request->validate([
            'dibayar' => 'required|in:Lunas,Belum Lunas'
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update(['dibayar' => $request->dibayar]);

        return back()->with('success', 'Status pembayaran berhasil diubah!');
    }
}
