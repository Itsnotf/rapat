<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Rapat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index(Request $request)
        {
            if ($request->ajax()) {
                $query = Laporan::with('rapat')->get();
                return DataTables::of($query)
                ->addColumn('notulensi', function($row) {
                    return '<a href="'.asset('storage/'.$row->notulensi).'" target="_blank">Download</a>';
                })
                ->rawColumns(['notulensi'])
                ->make(true);
            }
            return view('pages.laporan.index');
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rapat = Rapat::get();
        return view('pages.laporan.create' , compact('rapat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
            $request->validate([
                'id_rapat' => 'required',
                'kesimpulan' => 'required',
                'notulensi' => 'required|file|mimes:pdf,doc,docx|max:5120',
            ]);

            $data = $request->all();

            if ($request->hasFile('notulensi')) {
                $data['notulensi'] = $request->file('notulensi')->store('notulensi', 'public');
            }

            Laporan::create($data);

            return redirect('laporan')->with('toast', 'showToast("Data berhasil disimpan")');
      }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rapat = Rapat::get();
        $laporan = Laporan::findOrFail($id);
        return view('pages.laporan.edit', compact('laporan' , 'rapat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $laporan = Laporan::findOrFail($id);
        $request->validate([
            'id_rapat' => 'required',
            'kesimpulan' => 'required',
        ]);

        $laporan->update($request->all());
        return redirect('laporan')->with('toast', 'showToast("Data berhasil disimpan")');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
