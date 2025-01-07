<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\Models\Kandidat;
use App\Models\Voting;
use Illuminate\Support\Facades\Auth;
use App\Charts\HasilVoteChart;

class ViewController extends Controller
{

    public function dashboard()
    {
        $totalsiswa = User::where('role', 'siswa')->count();
        $suaramasuk = Voting::count();
        $belumvoting = $totalsiswa - $suaramasuk;
        return view('admin.dashboard', compact('totalsiswa', 'suaramasuk', 'belumvoting'));
    }

    public function siswa()
    {
        $user = User::where('role', 'siswa')->paginate(10);
        $user->map(function ($user) {
            $user->hasVoted = Voting::where('user_id', $user->id)->exists();
            return $user;
        });
        return view('admin.siswa', compact('user'));
    }

    public function kandidat()
    {
        $kandidat = Kandidat::all();
        return view('admin.kandidat', compact('kandidat'));
    }

    public function monitoring()
    {
        $chart = new HasilVoteChart();
        return view('admin.monitoring', compact('chart'));
    }

    public function home_siswa()
    {
       
        return view('siswa.home');
    }

    public function profil_kandidat()
    {
        $kandidat = Kandidat::all();
        return view('siswa.profil_kandidat', compact('kandidat'));
    }

    public function voting()
    {
        $userHasVoted = Voting::where('user_id', Auth::id())->exists();
        $kandidat = $userHasVoted ? [] : Kandidat::all();
        return view('siswa.voting', compact('kandidat', 'userHasVoted'));
    }
}
