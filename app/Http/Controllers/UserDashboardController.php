<?php

namespace App\Http\Controllers;

use App\Professor;
use App\Session;
use App\User;
use Auth;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $professors = Professor::with('subjects')->get();
        $date_today = Carbon::now()->toDateTimeString();
        $dt = strtotime($date_today);
        $dayAbbrv = date("D", $dt);
        $user = Auth()->user();
        $userID = $user->id;
        // $professor = Professor::where('user_id', '=', $userID)->first();
        $professor = $user->professor;
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
        // dd($activity_requests);
        return view('userdashboard',['professor'=>$professor, 'subject_today'=>$subject_today, 'subjects'=>$subjects, 'sessions'=>$sessions, 'activity_requests'=>$activity_requests, 'layout'=>'professorIndex']);
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