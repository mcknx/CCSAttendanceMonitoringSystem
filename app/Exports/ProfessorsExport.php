<?php

namespace App\Exports;

use App\Professor;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProfessorsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Professor::all();
    }
}
