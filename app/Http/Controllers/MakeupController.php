<?php

namespace App\Http\Controllers;

use App\Models\Makeup;
use Illuminate\Http\Request;

class MakeupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $makeup = Makeup::paginate(5);
        return view('page.makeup.index')->with([
            'makeup' => $makeup
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.makeup.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'type_makeup' => $request->input('type_makeup'),
            'description' => $request->input('description'),
            'harga' => $request->input('harga'),
        ];

        Makeup::create($data);
        
        return back()->with('message_delete','Data Member Sudah di Hapus');
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
            'type_makeup' => $request->input('type_makeup'),
            'description' => $request->input('description'),
            'harga' => $request->input('harga'),
        ];

        $datas = Makeup::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete','Data Member Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $data = Makeup::findOrFail($id);
            $data = Makeup::where('id',$id)->first();

            $data->delete();

            return response()->json([
                'message_delete' => "Data Deleted!"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete data.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
