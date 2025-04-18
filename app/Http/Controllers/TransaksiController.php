<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Catering;
use App\Models\Client;
use App\Models\Makeup;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::paginate(5);
        $album = Album::all();
        $makeup = Makeup::all();
        $user = User::all();
        $catering = Catering::all();
        $client = Client::all();
        return View('page.transaksi.index')->with([
            'transaksi' => $transaksi,
            'album' => $album,
            'makeup' => $makeup,
            'user' => $user,
            'catering' => $catering,
            'client' => $client,
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
        $client = Client::all();
        $kode_invoice = Transaksi::createCode();
        return view('page.transaksi.create', compact('kode_invoice'))->with([
            'album' => $album,
            'makeup' => $makeup,
            'user' => $user,
            'catering' => $catering,
            'client' => $client,
        ]);
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
