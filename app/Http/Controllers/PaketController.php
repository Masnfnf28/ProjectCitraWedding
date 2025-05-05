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
