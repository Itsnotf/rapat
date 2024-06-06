<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Bidang::get();
            return DataTables::of($query)->make(true);
        }
        return view('pages.bidang.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.bidang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'desc' => 'required',
        ]);

        Bidang::create($request->all());

        return redirect('bidang')->with('toast', 'showToast("Data berhasil disimpan")');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bidang $bidang)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bidang $bidang)
    {
        return view('pages.bidang.edit',compact('bidang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bidang $bidang)
    {
        $request->validate([
            'nama'=> 'required',
            'desc'=> 'required',
        ]);

        $bidang->update($request->all());
        return redirect('bidang')->with('toast', 'showToast("Data berhasil Di Update")');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bidang $bidang)
    {
        $bidang->delete();
        return redirect('bidang')->with('toast', 'showToast("Data berhasil Di Hapus")');

    }
}
