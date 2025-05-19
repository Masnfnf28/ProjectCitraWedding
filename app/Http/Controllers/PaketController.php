<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Catering;
use App\Models\Client;
use App\Models\Dekorasi;
use App\Models\Hiburan;
use App\Models\Makeup;
use App\Models\Paket;
use App\Models\Tenda;
use App\Models\Wardrobe;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket = Paket::Paginate(3);
        $album = Album::all();
        $makeup = Makeup::all();
        $user = User::all();
        $catering = Catering::all();
        $client = Client::all();
        $hiburan = Hiburan::all();
        $dekorasi = Dekorasi::all();
        $wardrobe = Wardrobe::all();
        $tenda = Tenda::all();
        return View('page.paket.index')->with([
            'paket' => $paket,
            'album' => $album,
            'makeup' => $makeup,
            'user' => $user,
            'catering' => $catering,
            'client' => $client,
            'hiburan' => $hiburan,
            'dekorasi' => $dekorasi,
            'wardrobe' => $wardrobe,
            'tenda' => $tenda,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $album = Album::all();
        $makeup = Makeup::all();
        $user = User::all();
        $catering = Catering::all();
        $hiburan = Hiburan::all();
        $dekorasi = Dekorasi::all();
        $wardrobe = Wardrobe::all();
        $tenda = Tenda::all();
        $kode_paket = Paket::createCode();
        return view('page.paket.create', compact('kode_paket'))->with([
            'album' => $album,
            'makeup' => $makeup,
            'user' => $user,
            'catering' => $catering,
            'hiburan' => $hiburan,
            'dekorasi' => $dekorasi,
            'wardrobe' => $wardrobe,
            'tenda' => $tenda,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'id_client' => $request->input('id_client'),
            'kode_paket' => $request->input('kode_paket'),
            'jenis_paket' => $request->input('jenis_paket'),
            'id_album' => $request->input('id_album'),
            'id_makeup' => $request->input('id_makeup'),
            'id_catering' => $request->input('id_catering'),
            'id_hiburan' => $request->input('id_hiburan'),
            'id_tenda' => $request->input('id_tenda'),
            'id_dekorasi' => $request->input('id_dekorasi'),
            'id_wardrobe' => $request->input('id_wardrobe'),
            // 'tanggal' => $request->input('tanggal'),
            'total_harga' => $request->input('total_bayar'), // total_harga = total_bayar
            'id_user' => Auth::id(),
            'total_bayar' => $request->input('total_bayar'),
            // 'dibayar' => $request->dibayar ?? 'Belum Lunas',
        ];

        Paket::create($data);

        return redirect()
            ->route('paket.index')
            ->with('message', 'Data Berhasil ditambahkan');
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
            'id_client' => $request->input('id_client'),
            // 'kode_paket' => $request->input('kode_paket'),
            'jenis_paket' => $request->input('id_jenis_paket'),
            'id_album' => $request->input('id_album'),
            'id_makeup' => $request->input('id_makeup'),
            'id_catering' => $request->input('id_catering'),
            'id_hiburan' => $request->input('id_hiburan'),
            'id_tenda' => $request->input('id_tenda'),
            'id_dekorasi' => $request->input('id_dekorasi'),
            'id_wardrobe' => $request->input('id_wardrobe'),
            // 'tanggal' => $request->input('tanggal'),
            // 'total_harga' => $request->input('total_harga'), // total_harga = total_bayar
            'id_user' => Auth::id(),
            // 'total_bayar' => $request->input('total_bayar'),
            // 'dibayar' => $request->dibayar ?? 'Belum Lunas',
        ];

        $datas = Paket::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete','Data Paket Sudah Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Paket::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Paket Sudah di Hapus');
    }
}
