<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $clients = Client::paginate(3);
            return view('page.client.index', compact('clients'));
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
        $data = [
            'namapl' => $request->input('namapl'),
            'namapr' => $request->input('namapr'),
            'alamat' => $request->input('alamat'),
            'notelp' => $request->input('notelp'),
            'email' => $request->input('email'),
        ];
        $dataUser = [
            'name' => $request->input('namapl'),
            'email' => $request->input('email'),
            'password' => Hash::make('12345678'),
            'role' => 'CLIENT'
        ];

        Client::create($data);
        User::create($dataUser);

        return back()->with('message_delete', 'Data Customer Sudah di Hapus');
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
            'namapl' => $request->input('namapl'),
            'namapr' => $request->input('namapr'),
            'alamat' => $request->input('alamat'),
            'notelp' => $request->input('notelp'),
        ];


        $datas = Client::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Data Customer Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Client::findOrFail($id);
        $email = $data->email;

        User::where('email', $email)->delete();

        $data->delete();
        return back()->with('message_delete', 'Data Customer Sudah dihapus');
    }
}
