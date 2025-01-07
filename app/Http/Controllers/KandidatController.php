<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Kandidat;

class KandidatController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
            'kelas' => 'required|string',
        ]);

        $photo = $request->file('photo');
        $photo_name = uniqid() . "_" . $photo->getClientOriginalName();
        $photo->move(public_path('images'), $photo_name);

        Kandidat::create([
            'nama' => $request->nama,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'photo' => $photo_name,
            'kelas' => $request->kelas,
            'total_votes' => 0,
        ]);

        return redirect()->back()->with('success', 'Kandidat berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6000',
            'kelas' => 'required|string',
        ]);

        $kandidat = Kandidat::find($id);

        if ($request->hasFile('photo')) {
            if ($kandidat->photo && file_exists(public_path('images/' . $kandidat->photo))) {
                unlink(public_path('images/' . $kandidat->photo));
            }

            $photo = $request->file('photo');
            $photo_name = uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $photo_name);
            $kandidat->photo = $photo_name;
        }

        $kandidat->nama = $request->nama;
        $kandidat->visi = $request->visi;
        $kandidat->misi = $request->misi;
        $kandidat->kelas = $request->kelas;
        $kandidat->save();

        return redirect()->back()->with('success', 'Kandidat berhasil diubah!');
    }

    public function delete($id)
    {
        $kandidat = Kandidat::find($id);
        if ($kandidat->photo && file_exists(public_path('images/' . $kandidat->photo))) {
            unlink(public_path('images/' . $kandidat->photo));
        }
        $kandidat->delete();

        return redirect()->back()->with('success', 'Kandidat berhasil dihapus!');
    }
}
