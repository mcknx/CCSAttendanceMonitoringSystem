<?php

namespace App\Http\Controllers;
use App\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::all() ;
        return view('record',['attendances'=>$attendances,'layout'=>'attendanceIndex']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attendances = Attendance::all() ;
        return view('record',['attendances'=>$attendances,'layout'=>'attendanceCreate']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $attendance->Subj_ID = $request->input('Subj_ID') ;
        $attendance->save() ;
        return redirect('/record') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendance = Attendance::find($id);
        $attendances = Attendance::all() ;
        return view('record',['attendances'=>$attendances,'attendance'=>$attendance,'layout'=>'attendanceShow']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attendance = Attendance::find($id);
        $attendances = Attendance::all() ;
        return view('record',['attendances'=>$attendances,'attendance'=>$attendance,'layout'=>'attendanceEdit']);
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
        $attendance = Attendance::find($id);
        $attendance->Prof_fname = $request->input('Prof_fname') ;
        $attendance->Prof_lname = $request->input('Prof_lname') ;
        $attendance->Prof_mname = $request->input('Prof_mname') ;
        $attendance->Subj_ID = 0;
        // $attendance->Subj_ID = $request->input('Subj_ID') ;
        $attendance->save() ;
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
        $attendance = Attendance::find($id);
        $attendance->delete() ;
        return redirect('/record') ;
    }
}
