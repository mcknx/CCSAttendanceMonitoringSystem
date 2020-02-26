<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Record;
use App\Professor;
use App\Subject;
use Carbon\Carbon;

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
        $record = Record::find($rec_id);
        $cabon_record_dateCreated = new Carbon($record->Rec_dateCreated);
        $dayOfWeek = $cabon_record_dateCreated->dayOfWeek;
        $sessions = Session::with(['record', 'subject'])->whereHas('subject', function($q) use($dayOfWeek) {
            // Monday
            if ($dayOfWeek == 1){
                $q->where('Subj_dayM', '=', 1);
            }
            // Tue
            if ($dayOfWeek == 2){
                $q->where('Subj_dayT', '=', 1);
            }
            // Wed
            if ($dayOfWeek == 3){
                $q->where('Subj_dayW', '=', 1);
            }
            // Thu
            if ($dayOfWeek == 4){
                $q->where('Subj_dayTH', '=', 1);
            }
            // Fri
            if ($dayOfWeek == 5){
                $q->where('Subj_dayF', '=', 1);
            }
            // Sat
            if ($dayOfWeek == 6){
                $q->where('Subj_dayS', '=', 1);
            }
            // Sun
            if ($dayOfWeek == 0){
                $q->where('Subj_daySu', '=', 1);
            }
        })->whereHas('record', function($q) use($rec_id) {
                $q->where('id', '=', $rec_id);
        })->orderBy('timein', 'ASC')->get();
        $record->Rec_noProf = count($sessions);
        $record->Rec_noPresent = count($sessions->where('Ses_status', '=' ,'1'));
        $record->Rec_noAbsent = count($sessions->where('Ses_status', '=' ,'2'));
        $record->Rec_noLate = count($sessions->where('Ses_status', '=' ,'3'));
        $record->save();
        // dd($sessions);
        return view('session',['sessions'=>$sessions, 'record'=>$record,'layout'=>'sessionShow']);
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
        $record = Record::find($session->record->id);
        if ($session->Ses_status == 1) {
            $record->Rec_noPresent -= 1;
        }
        if ($session->Ses_status == 2) {
            $record->Rec_noAbsent -= 1;
        }
        if ($session->Ses_status == 3) {
            $record->Rec_noLate -= 1;
        }

        $session->Ses_status = $request->input('Ses_status');
        $current_date_time = Carbon::now()->toDateTimeString(); 
        $session->notified_at = $current_date_time;

        if ($session->Ses_status == 1) {
            $record->Rec_noPresent += 1;
        }
        if ($session->Ses_status == 2) {
            $record->Rec_noAbsent += 1;
        }
        if ($session->Ses_status == 3) {
            $record->Rec_noLate += 1;
        }
        $record->save();
        
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
