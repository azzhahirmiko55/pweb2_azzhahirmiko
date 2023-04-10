<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Orders::get();
        return view('admin.order', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.order_tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_makanan'     => 'required',
            'porsi'     => 'required',
            'tambahan'     => 'required',
            'pesan'     => 'required',
            'harga'     => 'required|integer',
            'status'     => 'required',
        ]);

        Orders::create([
            'nama_makanan' => $request->nama_makanan,
            'porsi'        => $request->porsi,
            'tambahan'     => $request->tambahan,
            'pesan'        => $request->pesan,
            'harga'        => $request->harga,
            'status'       => $request->status,
        ]);

        //redirect to index
        return redirect()->route('order')->with(['success' => 'Data Berhasil Disimpan!']);
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
         $data = Orders::findOrFail($id);

         return view('admin.order_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'nama_makanan'     => 'required',
            'porsi'     => 'required',
            'tambahan'     => 'required',
            'pesan'     => 'required',
            'harga'     => 'required|integer',
            'status'     => 'required',
        ]);

        $data = Orders::findOrFail($id);

        $data->update([
            'nama_makanan' => $request->nama_makanan,
            'porsi'        => $request->porsi,
            'tambahan'     => $request->tambahan,
            'pesan'        => $request->pesan,
            'harga'        => $request->harga,
            'status'       => $request->status,
        ]);

    return redirect()->route('order')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Orders::findOrFail($id);

        $data->delete();

        return redirect()->route('order')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
