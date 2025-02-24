<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $album = Album::paginate(5);
        return view('page.album.index')->with([
            'album' => $album
        ]);
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
        $data = [
            'jenis_album' => $request->input('jenis_album'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
        ];
        Album::create($data);
        
        return back()->with('message_delete','Data Customer Sudah di Hapus');
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
            'jenis_album' => $request->input('jenis_album'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
        ];


        $datas = Album::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete','Data Album Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Album::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Customer Sudah dihapus');
    }
}
