<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Events::with('client')->paginate(5);
        $client = Client::all();
        return view('page.events.index',compact('client'))->with([
            'events' => $events,
            'client' => $client
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
            'id_client' => $request->input('id_client'),
            'tgl_acara' => $request->input('tgl_acara'),
            'lokasi' => $request->input('lokasi'),
        ];

        Events::create($data);

        return back()->with('message_delete', 'Data Paket Sudah dihapus');
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'id_client_edit' => $request->input('id_client_edit'),
            'tgl_acara' => $request->input('tgl_acara'),
            'lokasi' => $request->input('lokasi'),
        ];

        $datas = Events::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Data Events Sudah dihapus');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $data = Events::findOrFail($id);
            $data = Events::where('id',$id)->first();

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
