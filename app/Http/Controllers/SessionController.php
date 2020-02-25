<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Record;
use App\Professor;
use App\Subject;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::all() ;
        return view('session',['sessions'=>$sessions,'layout'=>'sessionIndex']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sessions = Session::all() ;
        return view('session',['sessions'=>$sessions,'layout'=>'sessionCreate']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session = new Session() ;
        $session->Prof_ID = $request->input('Prof_ID');
        $session->Prof_code = $request->input('Prof_code'); //IF 1 present, 2 absent, 3 late, 4 excused
        $session->Ses_status = $request->input('Ses_status');
        $session->Ses_remarks = $request->input('Ses_remarks');
        $session->Ses_timeCreated = $request->input('Ses_timeCreated');
        $session->save() ;
        return redirect('/session') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($rec_id)
    {   
        $sessions = Session::with(['record', 'subject'])->get();
        $record = Session::find($rec_id);

        // foreach ($sessions as $session) {
        //   var_dump($session->subject->professor->Prof_fname);
        // }
        // // $subject = Subject::find(1);
        // // var_dump($subject->professor);
        // dd('');
        return view('session',['sessions'=>$sessions, 'record'=>$record,'layout'=>'sessionShow']);
        // return view('session',['professors'=>$professors,'sessions'=>$sessions, 'record'=>$record, 'layout'=>'sessionShow']);
    }

    public function showSessionData($id)
    {   
        $session = Session::find($id);
        return $session;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = Session::find($id);
        $sessions = Session::all() ;
        return view('session',['sessions'=>$sessions,'session'=>$session,'layout'=>'sessionEdit']);
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
        $session = Session::find($id);
        $session->Ses_status = $request->input('Ses_status');
        // $session->Ses_remarks = $request->input('Ses_remarks');
        $session->save() ;
        return "success";
        // return redirect('/session') ;
    }

    public function updateRemarks(Request $request, $id)
    {
        $session = Session::find($id);
        $session->Ses_status = $session->Ses_status;
        $session->Ses_remarks = $request->input('Ses_remarks');
        // $session->Ses_remarks = $request->input('Ses_remarks');
        $session->save() ;
        return "success";
        // return redirect('/session') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::find($id);
        $session->delete() ;
        return redirect('/session') ;
    }
}
