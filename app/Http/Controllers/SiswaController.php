<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\IndexDefinition;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Validators\ValidationException;

class SiswaController extends Controller
{

    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|numeric|unique:users,nis',
            'password' => 'required|string|min:6',
        ]);

        if (User::where('nis', $request->nis)->exists()) {
            return redirect()->back()->withErrors(['nis' => 'NIS sudah dipakai.']);
        } else {
            User::create([
                'nama' => $request->nama,
                'nis' => $request->nis,
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
            ]);
            return redirect()->back()->with('success', 'User berhasil ditambahkan!');
        }
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|numeric|unique:users,nis,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        $user = User::findOrFail($id);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->nama = $request->nama;
        $user->nis = $request->nis;
        $user->save();

        return redirect()->back()->with('success', 'User berhasil diupdate!');
    }

    public function import(Request $request)
    {
       Excel::import(new UsersImport, $request->file('excelimport'));

         return redirect()->back()->with('success', 'Data berhasil diimport!');
    }
}
