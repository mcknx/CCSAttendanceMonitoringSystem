<?php

namespace App\Imports;

use App\Professor;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class ProfessorsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {
        // dd($row[4]);
        $a = $row[0];
        $b = $row[1];
        $c = $row[2];
        $d = $row[3];
        $e = $row[4];
        // dd($d);
        $user = User::create([
            'name' => $a ." ". $c ." ". $b,
            'username' => $d,
            'password' => Hash::make($d),
            'role' => 2
        ]);
        
        // $row[4] = $user->id;
        // dd($row[4]);
        $professor = new Professor() ;
        $professor->user_id = $user->id;
        
        $professor->Prof_fname = $row[0];
        $professor->Prof_mname = $row[1];
        $professor->Prof_lname = $row[2];
        $professor->Prof_code = $row[3];
        $professor->Prof_gender = $row[4];
        $professor->save();
        $user->save();
        return $professor;
    }
}
