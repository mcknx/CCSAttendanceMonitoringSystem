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
        $current_date_time = Carbon::now()->toDateTimeString(); 
        $session->notified_at = $current_date_time;
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
        // foreach ($sessions as $session){
        //     dd($session->subject->activity_requests);
        // }
        $record->save();
        // dd($sessions);
        return view('session',['sessions'=>$sessions, 'record'=>$record,'layout'=>'sessionShow']);
    }

    public function showUserData($ses_id)
    {   
        // $date_today = Carbon::now()->toDateTimeString();
        $date_today = Session::find($ses_id);
        $userID = $date_today->subject->professor->user_id;
        // dd($userID);
        $date_today = $date_today->record->Rec_dateCreated;
        
        $dt = strtotime($date_today);
        $dayAbbrv = date("D", $dt);
        // $user = $id;
        
        $professor = Professor::where('user_id', '=', $userID)->first();
        // dd($professor);
        $user = $professor->user;
        // $professor = $user->professor;
        $subjects = $professor->subjects;
        $subject_today = null;
        $session_array = [];
        $activityRequests_array = [];

        foreach ($subjects as $subject){
            // Mon
            if ($dayAbbrv == 'Mon'){
                if ($subject->Subj_dayM == 1) {
                    $subject_today = $subject;
                }
            }
            // Tue
            if ($dayAbbrv == 'Tue'){
                if ($subject->Subj_dayT == 1) {
                    $subject_today = $subject;
                }
            }
            // Wed
            if ($dayAbbrv == 'Wed'){
                if ($subject->Subj_dayW == 1) {
                    $subject_today = $subject;
                }
            }
            // Thu
            if ($dayAbbrv == 'Thu'){
                if ($subject->Subj_dayTH == 1) {
                    $subject_today = $subject;
                }
            }
            // Fri
            if ($dayAbbrv == 'Fri'){
                if ($subject->Subj_dayF == 1) {
                    $subject_today = $subject;
                }
            }
            // Sat
            if ($dayAbbrv == 'Sat'){
                if ($subject->Subj_dayS == 1) {
                    $subject_today = $subject;
                }
            }
            // Sun
            if ($dayAbbrv == 'Sun'){
                if ($subject->Subj_daySu == 1) {
                    $subject_today = $subject;
                }
            }

            // Finish
            $subjectSessions = $subject->sessions;
            $activityRequests = $subject->activity_requests;
            array_push($session_array, $subjectSessions);
            array_push($activityRequests_array, $activityRequests);
        }
        
        $sessions = $session_array;
        $activity_requests = $activityRequests_array;
        

        foreach ($activity_requests as $activity_request) {
            $activity_requests_final = [];
            
            foreach ($activity_request as $item) {
                // Notify 
                    // Date
                $dt = strtotime($item->notified_at);
                $record = date("l, M d, Y", $dt);
                $dayAbbrv = date("D", $dt);
                $strRec = strval($record);

                $activity_requests_final[0] = $strRec;
                    // Time
                $dt2 = strtotime($item->notified_at);
                $recordN = date("g:i:sa", $dt2);
                $strRecN = strval($recordN);
                $activity_requests_final[1] = $strRecN;

                // Subject
                $activity_requests_final[2] =  $item->subject->Subj_desc;
                // room
                $activity_requests_final[3] = $item->subject->Subj_room;
                // section
                $activity_requests_final[4] =  $item->subject->Subj_yr_sec;

                $dt = strtotime($item->subject->Subj_timein);
                $dt2 = strtotime($item->subject->Subj_timeout);
                $record1 = date("g:i:sa", $dt);
                $record2 = date("g:i:sa", $dt2);
                $strRec1 = strval($record1);
                $strRec2 = strval($record2);
                // Schedule
                    // timein
                $activity_requests_final[5] = $strRec1;
                    // timeout
                $activity_requests_final[6] = $strRec2;

                // Activity Req Desc
                $activity_requests_final[7] = $item->post;

                // File
                $activity_requests_final[8] = $item->file;

                // Notified
                $activity_requests_final[9] = $item->notified;

                // id
                $activity_requests_final[10] = $item->id;

                // Finish
                array_push($activity_requests,  $activity_requests_final);
            }
        }
        $arr = [$user, $professor, $subject_today, $subjects, $sessions, $activity_requests];
        
        return $arr;
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

    public function updateRemarksByUser(Request $request, $id)
    {
        $session = Session::find($id);
        $session->Ses_status = $session->Ses_status;
        $session->Ses_remarks = $request->input('Ses_remarks');
        // $session->Ses_remarks = $request->input('Ses_remarks');
        $session->save() ;
        return redirect('/userdashboard');
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
