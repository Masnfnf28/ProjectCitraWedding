<?php

namespace App\Http\Controllers;

use App\Models\Hiburan;
use Illuminate\Http\Request;

class HiburanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $hiburans = Hiburan::paginate(3); // Harus menggunakan paginate, bukan all()
            return view('page.hiburan.index', compact('hiburans'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
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
        try {
            $data = [
                'type_hiburan' => $request->input('type_hiburan'),
                'deskripsi' => $request->input('deskripsi'),
                'harga' => $request->input('harga'),
            ];
            Hiburan::create($data);

            // return back()->with('message_delete', 'Data Customer Sudah di Hapus');

            return redirect()
                ->route('hiburan.index')
                ->with('message_insert', 'Data Hiburan Sudah ditambahkan');
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
                'type_hiburan' => $request->input('type_hiburan'),
                'deskripsi' => $request->input('deskripsi'),
                'harga' => $request->input('harga'),
            ];


            $datas = Hiburan::findOrFail($id);
            $datas->update($data);
            // return back()->with('message_delete', 'Data Album Sudah dihapus');

            return redirect()
                ->route('hiburan.index')
                ->with('message_insert', 'Data Hiburan Sudah ditambahkan');
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
        try {
            $data = Hiburan::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Data Hiburan Sudah dihapus');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }
}
