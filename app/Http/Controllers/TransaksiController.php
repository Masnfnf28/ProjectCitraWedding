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
        $user = User::all();
        $client = Client::all();
        $kode_invoice = Transaksi::createCode();
        return view('page.transaksi.create', compact('kode_invoice'))->with([
            'user' => $user,
            'paket' => $paket,
            'client' => $client,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Transaksi::create([
            'kode_invoice' => $request->kode_invoice,
            'id_client' => $request->id_client,
            'tanggal' => $request->tanggal,
            'tanggal_acara' => $request->tanggal_acara,
            'id_paket' => $request->id_paket,
            'total_bayar' => $request->total_bayar,
            'id_user' => Auth::id(),
        ]);


        return redirect()->route('transaksi.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $data = [
            'id_pembayaran' => $request->input('id_pembayaran'),
            'id_status' => $request->input('id_status'),
            'id_user' => Auth::id(),
        ];

        $datas  = Transaksi::findOrFail($id);
        $datas->update($data);

        return back()->with('message_delete', 'Data Transksi Sudah Di Update');


        // $transaksi = Transaksi::findOrFail($id);

        // // Update status pembayaran
        // $transaksi->update([
        //     'pembayaran' => $request->pembayaran,
        //     'status' => $request->status,
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
        $data = Transaksi::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data paket Sudah dihapus');
    }
}
