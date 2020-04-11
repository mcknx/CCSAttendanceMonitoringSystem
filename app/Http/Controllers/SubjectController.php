<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Professor;
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
        $subjects = Subject::all();
        $professors = Professor::all();
        return view('subject',['subjects'=>$subjects,'layout'=>'subjectCreate','professors'=>$professors]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $subjects = DB::table('subjects')->where('Subj_title', 'like', '%' .$search. '%')->paginate(5);
        return view('subject',['subjects'=>$subjects,'layout'=>'subjectIndex']);
        // return view('professorslist', ['professors' => $professors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function TextNode ($classname, $msg) {
        $element = "<h6 class='$classname'>$msg</h6>";
        echo $element;
    }
    
    public function store(Request $request)
    {
        $subjects = Subject::all();
        if($request->input('Prof_ID')) {
            $subject = new Subject() ;
            $subject->Subj_title = $request->input('Subj_title') ;
            $subject->Subj_day = $request->input('Subj_day') ;
            $subject->Subj_time = $request->input('Subj_time') ;
            $subject->Subj_desc = $request->input('Subj_desc') ;
            $subject->Subj_units = $request->input('Subj_units') ;
            $subject->Subj_room = $request->input('Subj_room') ;
            $subject->Subj_yr_sec = $request->input('Subj_yr_sec') ;
            $subject->Prof_ID = $request->input('Prof_ID') ;
            $subject->save() ;
            return view('subject',['subject'=>$subject,'layout'=>'subjectShow', 'classname'=>'success', 'message'=>'Subject Successfully Added.']);
        }else {
            return view('subject',['subjects'=>$subjects,'layout'=>'subjectShow', 'classname'=>'error', 'message'=>'Please make sure all fields are filled.']);
        }
        // return redirect('/subject') ;
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
        $subject->Prof_ID = $request->input('Prof_ID') ;
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
