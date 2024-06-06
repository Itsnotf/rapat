<?php

namespace App\Http\Controllers;

use App\Models\Rapat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RapatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Rapat::get();
            return DataTables::of($query)->make(true);
        }
        return view('pages.jadwalRapat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.jadwalRapat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'agenda' => 'required',
        'waktu' => 'required',
        'tanggal' => 'required',
        'tempat' => 'required',
        'acara' => 'required',
        'dihadiri' => 'required',
        'dipimpin' => 'required',
    ]);

    Rapat::create($request->all());
    return redirect('rapat')->with('toast', 'showToast("Data berhasil disimpan")');
}


    /**
     * Display the specified resource.
     */
    public function getDetail(string $id)
    {
        $rapat = Rapat::findOrFail($id);
        return response()->json($rapat);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Rapat::findOrFail($id);
        return view('pages.jadwalRapat.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rapat = Rapat::findOrFail($id);
        $request->validate([
            'agenda' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required',
            'tempat' => 'required',
            'acara' => 'required',
            'dihadiri' => 'required',
            'dipimpin' => 'required',
        ]);

        $rapat->update($request->all());
        return redirect('rapat')->with('toast', 'showToast("Data berhasil diperbarui")');

    }


        public function updateOpsi(Request $request, int $id) {
            $setujuh = $request->input('opsi');
            $rapat = Rapat::findOrFail($id);
            $rapat->update(['opsi' => $setujuh]);

            return redirect()->back()->with('toast', 'Data berhasil diupdate');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Rapat::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('toast', 'showToast("Data berhasil dihapus")');
    }
}
