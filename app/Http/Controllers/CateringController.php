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
        // $catering = Catering::paginate(5);
        // return view('page.catering.index')->with([
        //     'catering' => $catering
        // ]);
        try{
            $catering = Catering::paginate(5);
            return view('page.catering.index')->with([
                'catering' => $catering,
            ]);
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }

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
        try{
        $data = [
            'type_catering' => $request->input('type_catering'),
            'deskripsi' => $request->input('deskripsi'),
            'porsi' => $request->input('porsi'),
            'harga' => $request->porsi * 10000,
        ];
        Catering::create($data);
        
        // return back()->with('message_delete','Data Catering Sudah di Hapus');
        return redirect()
                ->route('catering.index')
                ->with('message_insert', 'Data Album Sudah ditambahkan');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
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
        try {
        $data = [
            'type_catering' => $request->input('type_catering'),
            'deskripsi' => $request->input('deskripsi'),
            'porsi' => $request->input('porsi'),
            'harga' => $request->input('harga'),
        ];


        $datas = Catering::findOrFail($id);
        $datas->update($data);
        // return back()->with('message_update','Data Catering Sudah di Update');

        return redirect()
                ->route('catering.index')
                ->with('message_insert', 'Data Album Sudah ditambahkan');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
        $data = Catering::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Customer Sudah dihapus');
        return redirect()
                ->route('catering.index')
                ->with('message_insert', 'Data Album Sudah ditambahkan');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }
}
