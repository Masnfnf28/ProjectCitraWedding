<?php

namespace App\Http\Controllers;

use App\Models\Catering;
use Illuminate\Http\Request;

class CateringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catering = Catering::paginate(5);
        return view('page.catering.index')->with([
            'catering' => $catering
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
        // dd($request->all());
        $data = [
            'type_catering' => $request->input('type_catering'),
            'deskripsi' => $request->input('deskripsi'),
            'porsi' => $request->input('porsi'),
            'harga' => $request->input('harga'),
        ];
        Catering::create($data);
        
        return back()->with('message_delete','Data Catering Sudah di Hapus');
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
            'type_catering' => $request->input('type_catering'),
            'deskripsi' => $request->input('deskripsi'),
            'porsi' => $request->input('porsi'),
            'harga' => $request->input('harga'),
        ];


        $datas = Catering::findOrFail($id);
        $datas->update($data);
        return back()->with('message_update','Data Catering Sudah di Update');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Catering::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Customer Sudah dihapus');
    }
}
