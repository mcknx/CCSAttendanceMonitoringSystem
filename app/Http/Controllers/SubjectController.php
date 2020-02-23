<?php

namespace App\Http\Controllers;

use App\Professor;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all() ;
        return view('subject',['subjects'=>$subjects,'layout'=>'subjectIndex']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all() ;
        return view('subject',['subjects'=>$subjects,'layout'=>'subjectCreate']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = new Subject() ;
        $subject->Subj_title = $request->input('Subj_title') ;
        $subject->Subj_day = $request->input('Subj_day') ;
        $subject->Subj_time = $request->input('Subj_time') ;
        $subject->Subj_desc = $request->input('Subj_desc') ;
        $subject->Subj_units = $request->input('Subj_units') ;
        $subject->Subj_room = $request->input('Subj_room') ;
        $subject->Subj_yr_sec = $request->input('Subj_yr_sec') ;
        $subject->Prof_code = $request->input('Prof_code') ;
        $professors = Professor::all() ;

        foreach ($professors as $professor) {
            if ($professor->Prof_code === $subject->Prof_code) {
                $professor->Subj_ID += 1;
                $professor->save() ;
                break;
            }
        }
        
        $subject->save() ;
        return redirect('/subject') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        $subjects = Subject::all() ;
        return view('subject',['subjects'=>$subjects,'subject'=>$subject,'layout'=>'subjectShow']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        $subjects = Subject::all() ;
        return view('subject',['subjects'=>$subjects,'subject'=>$subject,'layout'=>'subjectEdit']);
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
        $subject = Subject::find($id);
        $subject->Subj_day = $request->input('Subj_title') ;
        $subject->Subj_day = $request->input('Subj_day') ;
        $subject->Subj_time = $request->input('Subj_time') ;
        $subject->Subj_desc = $request->input('Subj_desc') ;
        $subject->Subj_units = $request->input('Subj_units') ;
        $subject->Subj_room = $request->input('Subj_room') ;
        $subject->Subj_yr_sec = $request->input('Subj_yr_sec') ;

        $professors = Professor::all() ;

        // Old one
        foreach ($professors as $professor) {
            if ($professor->Prof_code === $subject->Prof_code) {
                $professor->Subj_ID -= 1;
                $professor->save() ;
                break;
            }
        }
        // New one
        $subject->Prof_code = $request->input('Prof_code') ;

        foreach ($professors as $professor) {
            if ($professor->Prof_code === $subject->Prof_code) {
                $professor->Subj_ID += 1;
                $professor->save() ;
                break;
            }
        }
        $subject->save() ;
        return redirect('/subject') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete() ;
        return redirect('/subject') ;
    }
}
