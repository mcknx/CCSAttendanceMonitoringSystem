<?php

namespace App\Http\Controllers;

use App\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professors = Professor::all() ;
        return view('professor',['professors'=>$professors,'layout'=>'professorIndex']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professors = Professor::all() ;
        return view('professor',['professors'=>$professors,'layout'=>'professorCreate']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $professor = new Professor() ;
        $professor->Prof_fname = $request->input('Prof_fname') ;
        $professor->Prof_lname = $request->input('Prof_lname') ;
        $professor->Prof_mname = $request->input('Prof_mname') ;
        $professor->Subj_ID = 0;
        
        // $professor->Subj_ID = $request->input('Subj_ID') ;
        $professor->save() ;
        return redirect('/professor') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $professor = Professor::find($id);
        $professors = Professor::all() ;
        return view('professor',['professors'=>$professors,'professor'=>$professor,'layout'=>'professorShow']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professor = Professor::find($id);
        $professors = Professor::all() ;
        return view('professor',['professors'=>$professors,'professor'=>$professor,'layout'=>'professorEdit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $professor = Professor::find($id);
        $professor->Prof_fname = $request->input('Prof_fname') ;
        $professor->Prof_lname = $request->input('Prof_lname') ;
        $professor->Prof_mname = $request->input('Prof_mname') ;
        $professor->Subj_ID = 0;
        // $professor->Subj_ID = $request->input('Subj_ID') ;
        $professor->save() ;
        return redirect('/professor') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professor = Professor::find($id);
        $professor->delete() ;
        return redirect('/professor') ;
    }
}
