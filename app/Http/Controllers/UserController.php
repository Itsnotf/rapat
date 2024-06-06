<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest\Store;
use App\Http\Requests\UserRequest\Update;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = User::whereNot('role', 'superadmin')->with('bidang')->get();
            return DataTables::of($query)->make();
            dd($query);
        }

        return view('pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidangs = Bidang::get();
        return view('pages.user.create',compact('bidangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        // dd($request);
        $data = [
            'name' => $request->name,
            'NoHandphone' => $request->NoHandphone,
            'id_bidang' => $request->id_bidang,
            'email' => $request->email,
            'role' => $request->role,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ];

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatar', 'public');
        }

        // dd($data);

        User::create($data);

        return redirect('user')->with('toast', 'showToast("Data berhasil disimpan")');
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
        $bidangs = Bidang::get();
        $item = User::find($id);

        return view('pages.user.edit',compact('item','bidangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = [
            'name' => $request->name,
            'NoHandphone' => $request->NoHandphone,
            'bidang' => $request->bidang,
            'email' => $request->email,
            'role' => $request->role,
            'username' => $request->username,
        ];

        if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
            $path = "avatar/";
            $oldfile = $path.basename($user->avatar);
            Storage::disk('public')->delete($oldfile);
            $data['avatar'] = Storage::disk('public')->put($path, $request->file('avatar'));
        }

        if($request->password){
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect('user')->with('toast', 'showToast("Data berhasil diupdate")');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('toast', 'showToast("Data berhasil dihapus")');
    }
}
