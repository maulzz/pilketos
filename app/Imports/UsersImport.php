<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;


class UsersImport implements ToCollection, ToModel
{
    private $rows = 0;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection($rows)
    {

    }

    public function model(array $row)
    {
        $this->rows++;
        if ($this->rows > 1) {
            $count = User::where('nis', '=',$row[1])->count();

            if (empty($count)) {
                $user = new User;
                $user->nama = $row[0];
                $user->nis = $row[1];
                $user->password = Hash::make($row[2]);
                $user->remember_token = Str::random(60);
                $user->save();
            }  
        }
    }
}
