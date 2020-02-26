<?php

namespace App\Http\Controllers;

use App\Professor;
use App\User;
use Auth;
use App;
use PDF;
use App\Subject;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function show()
    {
        $subjects = Subject::all();
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('
        //   <p>asdasd</p>
        // ');
        // $pdf = PDF::loadView('report', $data);
        $pdf = PDF::loadView('report', ['subjects' => $subjects]);
      
        // return $pdf->download('invoice.pdf');
        return $pdf->setPaper('a4', 'landscape')->stream();
        // $professors = Professor::with('subjects')->get();
        // return view('professor',['professors'=>$professors,'layout'=>'professorIndex']);
    }

}


?>