<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use App\Subject;
use App\Semester;
use App\Session;
use Carbon\Carbon;
// use App\Http\Controllers\Carbon;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = null;
        // dd($records);
        return view('record',['records'=>$records,'layout'=>'recordIndex']);
        // return view('record',['layout'=>'recordIndex']);
    }

    public function index2(Request $request)
    {
        $sem = $request->input('sem') ;
        $from_year = $request->input('from') ;
        $to_year = $request->input('to') ;
        $semester = Semester::where('sem', '=', $sem)->where('from_year', '=', $from_year)->where('to_year', '=', $to_year)->first();
        
        if ($semester == null) {
            $records = null;    
            return view('record',['records'=>$records,'layout'=>'recordIndex']);
        }
        
        $records = Record::where('sem_id', '=', $semester->id)->get();
        
        // dd($records);
        return view('record',['semester'=>$semester, 'records'=>$records,'layout'=>'recordIndex']);
        // return view('record',['layout'=>'recordIndex']);
    }

    public function show($id)
    {
        $record = Record::find($id);
        $records = Record::all() ;
        return view('record',['records'=>$records,'record'=>$record,'layout'=>'recordShow']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sem = $request->input('sem_id') ;
        // dd($sem);
        
        $semester = Semester::find($sem);
        $records = Record::where('sem_id', '=', $sem)->get();
        return view('record',['semester'=>$semester,'records'=>$records,'layout'=>'recordCreate']);
        // return view('record',['records'=>$records,'layout'=>'recordCreate']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Carbon::now());
        $record = new Record() ;
        $record->Rec_dateCreated = $request->input('currentDate') ;
        $sem = $request->input('sem2') ;
        $from_year = $request->input('date-own2') ;
        $to_year = $request->input('date-own3') ;

        $semester = Semester::where('sem', '=', $sem)->where('from_year', '=', $from_year)->where('to_year', '=', $to_year)->first();
        // dd ($semester);
        
        if ($semester != null) {
            // dd($request->input('currentDate'));
            if (Record::where('Rec_dateCreated', '=', $request->input('currentDate'))->first()){
                return redirect()->back();
            }
            $record->sem_id = $semester->id;
            $record->Rec_noProf = 0;
            $record->Rec_noPresent = 0;
            $record->Rec_noAbsent = 0;
            $record->Rec_noLate = 0;
            $record->save() ;

            // Loop Subjects and then 
            // Display items based on the same day of the week only
            // Professor can be duplicated if section is different
            $dt = strtotime($record->Rec_dateCreated);
            $dayAbbrv = date("D", $dt);
            $subjects = Subject::all();
            foreach ($subjects as $subject){
                if ($dayAbbrv == 'Mon'){
                    if ($subject->Subj_dayM == 1) {
                        $session = new Session();
                        $session->record_id =  $record->id;
                        $session->subject_id = $subject->id;
                        $session->timein = $subject->Subj_timein;
                        $session->timeout = $subject->Subj_timeout;
                        $current_date_time = Carbon::now()->toDateTimeString(); 
                        $session->notified_at = $current_date_time;
                        $session->save() ;
                    }
                }
                // Tue
                if ($dayAbbrv == 'Tue'){
                    if ($subject->Subj_dayT == 1) {
                        $session = new Session();
                        $session->record_id =  $record->id;
                        $session->subject_id = $subject->id;
                        $session->timein = $subject->Subj_timein;
                        $session->timeout = $subject->Subj_timeout;
                        $current_date_time = Carbon::now()->toDateTimeString(); 
                        $session->notified_at = $current_date_time;
                        $session->save() ;
                    }
                }
                // Wed
                if ($dayAbbrv == 'Wed'){
                    if ($subject->Subj_dayW == 1) {
                        $session = new Session();
                        $session->record_id =  $record->id;
                        $session->subject_id = $subject->id;
                        $session->timein = $subject->Subj_timein;
                        $session->timeout = $subject->Subj_timeout;
                        $current_date_time = Carbon::now()->toDateTimeString(); 
                        $session->notified_at = $current_date_time;
                        $session->save() ;
                    }
                }
                // Thu
                if ($dayAbbrv == 'Thu'){
                    if ($subject->Subj_dayTH == 1) {
                        $session = new Session();
                        $session->record_id =  $record->id;
                        $session->subject_id = $subject->id;
                        $session->timein = $subject->Subj_timein;
                        $session->timeout = $subject->Subj_timeout;
                        $current_date_time = Carbon::now()->toDateTimeString(); 
                        $session->notified_at = $current_date_time;
                        $session->save() ;
                    }
                }
                // Fri
                if ($dayAbbrv == 'Fri'){
                    if ($subject->Subj_dayF == 1) {
                        $session = new Session();
                        $session->record_id =  $record->id;
                        $session->subject_id = $subject->id;
                        $session->timein = $subject->Subj_timein;
                        $session->timeout = $subject->Subj_timeout;
                        $current_date_time = Carbon::now()->toDateTimeString(); 
                        $session->notified_at = $current_date_time;
                        $session->save() ;
                    }
                }
                // Sat
                if ($dayAbbrv == 'Sat'){
                    if ($subject->Subj_dayS == 1) {
                        $session = new Session();
                        $session->record_id =  $record->id;
                        $session->subject_id = $subject->id;
                        $session->timein = $subject->Subj_timein;
                        $session->timeout = $subject->Subj_timeout;
                        $current_date_time = Carbon::now()->toDateTimeString(); 
                        $session->notified_at = $current_date_time;
                        $session->save() ;
                    }
                }
                // Sun
                if ($dayAbbrv == 'Sun'){
                    if ($subject->Subj_daySu == 1) {
                        $session = new Session();
                        $session->record_id =  $record->id;
                        $session->subject_id = $subject->id;
                        $session->timein = $subject->Subj_timein;
                        $session->timeout = $subject->Subj_timeout;
                        $current_date_time = Carbon::now()->toDateTimeString(); 
                        $session->notified_at = $current_date_time;
                        $session->save() ;
                    }
                }
            }
            $record->Rec_noProf = count($record->sessions);
            $record->save() ;
        }

        return redirect('/record') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $sem = $request->input('sem_id') ;
        $semester = Semester::find($sem);
        $record = Record::find($id);
        $records = Record::where('sem_id', '=', $sem)->get();
        // dd($record);
        // $records = Record::all() ;
        return view('record',['semester'=>$semester,'records'=>$records,'record'=>$record,'layout'=>'recordEdit']);
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
        $record = Record::find($id);
        $record->Rec_dateCreated = $request->input('currentDate') ;
        $record->Rec_noProf = 0;
        $record->Rec_noPresent = 0;
        $record->Rec_noAbsent = 0;
        $record->Rec_noLate = 0;
        $record->save() ;
        return redirect('/record') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Record::find($id);
        $record->sessions()->delete();
        $record->delete() ;
        return redirect('/record') ;
    }
}
