<?php

namespace App\Http\Controllers;

use App\Professor;
use App\User;
use Auth;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professors = Professor::with('subjects')->get();
        // foreach ($professors as $professor){
        //     var_dump($professor->subjects->count());
        // }
        // dd($professors);
        
        // foreach ($professors as $professor) {

        //     $subject = Subject::where('Prof_code', '=', $professor->Prof_code);
        //     if ($subject->Prof_code === null) {
        //         $professor->Subj_count = 0;
        //     }
        //     if ($subject->Prof_code === $professor->Prof_code) {
        //         $professor->Subj_count += 1;
        //     }
        //     if ($subject) {
        //     }
        //     $professor->save();
        // }
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
        $user = User::create([
            'name' => $request->input('Prof_fname') ." ". $request->input('Prof_mname') ." ". $request->input('Prof_lname'),
            'username' => $request->input('Prof_code'),
            'password' => Hash::make($request->input('Prof_code')),
            'role' => 2
          ]);

        $professor = new Professor() ;
        $professor->user_id = $user->id;
        $professor->Prof_fname = $request->input('Prof_fname');
        $professor->Prof_lname = $request->input('Prof_lname');
        $professor->Prof_mname = $request->input('Prof_mname');
        $professor->Prof_code = $request->input('Prof_code');
        // $professor->Subj_count = 0;        
        // $professor->Subj_count = $request->input('Subj_count') ;
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
        $professor->Prof_code = $request->input('Prof_code') ;
        $professor->Subj_count = 0;
        // $professor->Subj_count = $request->input('Subj_count') ;
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
