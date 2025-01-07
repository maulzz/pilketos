<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voting;
use App\Models\Kandidat;
use App\Models\Setting;

class VotingController extends Controller
{
    public function vote(Request $request)
    {
        $request->validate([
            'kandidat_id' => 'required|exists:kandidat,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Voting::create([
            'kandidat_id' => $request->kandidat_id,
            'user_id' => $request->user_id,
        ]);

        Kandidat::where('id', $request->kandidat_id)->increment('total_votes');

        return redirect('/home')->with('success', 'Voting berhasil!');
    }

    public function voting_setting(Request $request)
    {
        $request->validate([
            'status' => 'required|in:open,close,end',
        ]);

        $setting = Setting::where('key', 'voting_status')->first();

        if ($setting) {
            $setting->update(['value' => $request->status]);
        } else {
            return redirect()->back()->with('error', 'Setting tidak ditemukan!');
        }



        return redirect('/admin/monitoring')->with('success', 'Status voting berhasil diubah!');
    }
}
