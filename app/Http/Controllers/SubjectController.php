<?php

namespace App\Http\Controllers;

use App\Professor;
use App\Subject;
use App\Semester;
use Auth;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $res)
    {
        // $sem = $res->input('sem');
        // $from = $res->input('from');
        // $to = $res->input('to');
        
        // $semester = Semester::all() ;
        // $semester = $semester->where('sem', '=', $sem)->where('from_year', '=', $from)->where('to_year', '=', $to);
        // dd($semester);
        // $subjects = Subject::all() ;
        $subjects = null;
        // $subjects = $subjects->where('sem', '=', $sem)->where('from_year', '=', $from)->where('to_year', '=', $to);
        // $professors = Professor::all() ;
        // return view('subject',['subjects'=>$subjects,'professors'=>$professors,'layout'=>'subjectIndex']);
        return view('subject',['subjects'=>$subjects,'layout'=>'subjectIndex']);
    }

    public function index2(Request $request)
    {
        $sem = $request->input('sem') ;
        $from_year = $request->input('from') ;
        $to_year = $request->input('to') ;
        $semester = Semester::where('sem', '=', $sem)->where('from_year', '=', $from_year)->where('to_year', '=', $to_year)->first();
        
        if ($semester == null) {
            $subjects = null;    
            return view('subject',['subjects'=>$subjects,'layout'=>'subjectIndex']);
            // return view('record',['records'=>$records,'layout'=>'recordIndex']);

        }
        
        $subjects = Subject::where('sem_id', '=', $semester->id)->get();
        
        // dd($records);
        return view('subject',['subjects'=>$subjects,'layout'=>'subjectIndex']);
        // return view('record',['semester'=>$semester, 'records'=>$records,'layout'=>'recordIndex']);
        // return view('record',['layout'=>'recordIndex']);
    }

    public function showSubjectSem(Request $res)
    {
        $sem = $res->input('sem');
        $from = $res->input('from');
        $to = $res->input('to');
        
        // $semester = Semester::all() ;
        $semester = $semester->where('sem', '=', $sem)->where('from_year', '=', $from)->where('to_year', '=', $to);
        
        $subjects = Subject::all() ;
        $subjects = $subjects->where('sem', '=', $sem)->where('from_year', '=', $from)->where('to_year', '=', $to);
        dd($subjects);
        $professors = Professor::all() ;
        return view('subject',['subjects'=>$subjects,'professors'=>$professors,'layout'=>'subjectIndex']);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all() ;
        $professors = Professor::all() ;
        return view('subject',['subjects'=>$subjects,'professors'=>$professors,'layout'=>'subjectCreate']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $professor = Professor::where('prof_code', $request->input('Prof_code'))->first();
        $subject = new Subject() ;
        $subject->prof_id = $professor->id;
        $sem = $request->input('sem') ;
        $from_year = $request->input('from') ;
        $to_year = $request->input('to') ;
        
        // $semester = Semester::all() ;
        $semester = Semester::where('sem', '=', $sem)->where('from_year', '=', $from_year)->where('to_year', '=', $to_year)->first();
        if ($semester == null) {
            // $subjects = null;    
            return redirect()->back();
            // return view('record',['records'=>$records,'layout'=>'recordIndex']);

        }
        $subject->sem_id = $semester->id;
        $subject->Subj_title = $request->input('Subj_title') ;
        $subject->Subj_dayM = $request->input('Subj_dayM') ;
        $subject->Subj_dayT = $request->input('Subj_dayT') ;
        $subject->Subj_dayW = $request->input('Subj_dayW') ;
        $subject->Subj_dayTH = $request->input('Subj_dayTH') ;
        $subject->Subj_dayF = $request->input('Subj_dayF') ;
        $subject->Subj_dayS = $request->input('Subj_dayS') ;
        $subject->Subj_daySu = $request->input('Subj_daySu') ;
        $subject->Subj_timein = $request->input('Subj_timein') ;
        $subject->Subj_timeout = $request->input('Subj_timeout') ;
        $subject->Subj_desc = $request->input('Subj_desc') ;
        $subject->Subj_units = $request->input('Subj_units') ;
        $subject->Subj_room = $request->input('Subj_room') ;
        $subject->Subj_yr_sec = $request->input('Subj_yr_sec') ;
        $subject->Prof_code = $request->input('Prof_code') ;
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
        $sem = $res->input('sem');
        $from = $res->input('from');
        $to = $res->input('to');
        
        $semester = Semester::all() ;
        $semester = $semester->where('sem', '=', $sem)->where('from_year', '=', $from)->where('to_year', '=', $to);
        dd($semester);
        $subjects = Subject::all() ;
        $professors = Professor::all() ;
        return view('subject',['subjects'=>$subjects,'professors'=>$professors,'layout'=>'subjectIndex']);
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
        $professors = Professor::all() ;
        return view('subject',['subjects'=>$subjects,'subject'=>$subject,'professors'=>$professors,'layout'=>'subjectEdit']);
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
        $subject->Subj_title = $request->input('Subj_title') ;
        $subject->Subj_dayM = $request->input('Subj_dayM') ;
        $subject->Subj_dayT = $request->input('Subj_dayT') ;
        $subject->Subj_dayW = $request->input('Subj_dayW') ;
        $subject->Subj_dayTH = $request->input('Subj_dayTH') ;
        $subject->Subj_dayF = $request->input('Subj_dayF') ;
        $subject->Subj_dayS = $request->input('Subj_dayS') ;
        $subject->Subj_daySu = $request->input('Subj_daySu') ;
        $subject->Subj_timein = $request->input('Subj_timein') ;
        $subject->Subj_timeout = $request->input('Subj_timeout') ;
        $subject->Subj_desc = $request->input('Subj_desc') ;
        $subject->Subj_units = $request->input('Subj_units') ;
        $subject->Subj_room = $request->input('Subj_room') ;
        $subject->Subj_yr_sec = $request->input('Subj_yr_sec') ;
        // $subject->Prof_code = $request->input('Prof_code') ;
        $subject->save() ;
        
        $sessions = $subject->sessions;
        foreach($sessions as $session) {
            $session->timein = $subject->Subj_timein;
            $session->timeout = $subject->Subj_timeout;
            $session->save();
        }

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
        $professors = Professor::all() ;
        $subject->delete() ;
        return redirect('/subject') ;
    }
}
