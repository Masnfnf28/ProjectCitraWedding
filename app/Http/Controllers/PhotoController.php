<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photo = Photo::paginate(5);
        return view('page.photo.index')->with([
            'photo' => $photo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.photo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'photography' => $request->input('photography'),
            'album' => $request->input('album'),
            'desc' => $request->input('desc'),
            'harga' => $request->input('harga'),
        ];
        Photo::create($data);

        // return back()->with('message_delete','Data Customer Sudah di Hapus');
        return redirect()->route('photo.index')->with('message_input', 'Success');
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
            'photography' => $request->input('photography'),
            'album' => $request->input('album'),
            'desc' => $request->input('desc'),
            'harga' => $request->input('harga'),
        ];

        $datas = Photo::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete','Data Member Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $data = Photo::findOrFail($id);
            $data = Photo::where('id',$id)->first();

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
