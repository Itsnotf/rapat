<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Laporan;
use App\Models\Rapat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::whereNot('role', 'superadmin')->count();
        $totalBidang = Bidang::count();
        $totalRapat = Rapat::count();
        $totalLaporan = Laporan::count();
        return view('pages.dashboard',compact('totalUser', 'totalBidang', 'totalRapat', 'totalLaporan'));
    }

    public function profile()
    {
        return view('pages.profile');
    }

    public function changeAvatar(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
            $path = "avatar/";
            $oldfile = $path.basename($user->avatar);
            Storage::disk('public')->delete($oldfile);
            $data['avatar'] = Storage::disk('public')->put($path, $request->file('avatar'));

            $user->update($data);
        }

        return redirect()->back();
    }

    public function removeAvatar()
    {
        $user = User::findOrFail(auth()->user()->id);

        $path = "avatar/";
        $oldfile = $path.basename($user->avatar);
        Storage::disk('public')->delete($oldfile);
        $data['avatar'] = NULL;

        $user->update($data);

        return redirect()->back();
    }
}
