<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Catering;
use App\Models\Client;
use App\Models\Makeup;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::paginate(5);
        $paket = Paket::all();
        $user = User::all();
        $client = Client::all();
        return View('page.transaksi.index')->with([
            'transaksi' => $transaksi,
            'paket' => $paket,
            'user' => $user,
            'client' => $client,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paket = Paket::all();
        // $makeup = Makeup::all();
        $user = User::all();
        // $catering = Catering::all();
        $client = Client::all();
        $kode_invoice = Transaksi::createCode();
        return view('page.transaksi.create', compact('kode_invoice'))->with([
            // 'album' => $album,
            // 'makeup' => $makeup,
            'user' => $user,
            // 'catering' => $catering,
            'paket' => $paket,
            'client' => $client,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = [
        //     'id_client' => $request->input('id_client'),
        //     'kode_invoice' => $request->input('kode_invoice'),
        //     'id_album' => $request->input('id_album'),
        //     'id_makeup' => $request->input('id_makeup'),
        //     'id_catering' => $request->input('id_catering'),
        //     'tanggal' => $request->input('tanggal'),
        //     'total_harga' => $request->input('total_bayar'), // total_harga = total_bayar
        //     'id_user' => Auth::id(),
        //     'total_bayar' => $request->input('total_bayar'),
        //     'dibayar' => $request->dibayar ?? 'Belum Lunas',
        // ];

        // Transaksi::create($data);

        // return redirect()
        //     ->route('transaksi.index')
        //     ->with('message', 'Data Berhasil ditambahkan');
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
        // $transaksi = Transaksi::findOrFail($id);

        // // Update status pembayaran
        // $transaksi->update([
        //     'dibayar' => $request->dibayar,
        // ]);

        // // Redirect dengan pesan sukses
        // return redirect()->route('transaksi.index')
        //     ->with('success', 'Status pembayaran berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $data = Transaksi::findOrFail($id);
        // $data->delete();
        // return back()->with('message_delete','Data paket Sudah dihapus');
    }
}
