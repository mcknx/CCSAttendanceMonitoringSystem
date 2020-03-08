<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\ActivityRequest;
use App\Subject;
use Carbon\Carbon;

class ActivityRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($prof_code ,Request $request)
    {
        // dd($request);
        if($file = $request->file('file')){
            $name = $file->getClientOriginalName();
            if($file->move('user-files/'.$prof_code, $name)){
                $activityRequest = new ActivityRequest();
                $current_date_time = Carbon::now()->toDateTimeString(); 
                $selectedSubject = $request->input('selectedSubject');
                $subject = Subject::find($selectedSubject);
                $activityRequest->subject_id = $subject->id;
                $activityRequest->file = $name;
                $activityRequest->post = $request->input('post');
                $activityRequest->notified_at = $current_date_time;
                $activityRequest->save();
                return redirect('userdashboard');
            };
        }
        $activityRequest = new ActivityRequest();
        $current_date_time = Carbon::now()->toDateTimeString(); 
        $selectedSubject = $request->input('selectedSubject');
        $subject = Subject::find($selectedSubject);
        $activityRequest->subject_id = $subject->id;
        $activityRequest->file = null;
        $activityRequest->post = $request->input('post');;
        $activityRequest->notified_at = $current_date_time;
        $activityRequest->save();
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activityRequest = ActivityRequest::find($id);
        return $activityRequest;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function edit($id, Request $request)
    {
        $activityRequest = ActivityRequest::find($id);
        // dd($activityRequest);
        $file = $request->file('file');
        if ($file != null) {
            $name = $file->getClientOriginalName();
            if($file->move('user-files/'.$activityRequest->subject->Prof_code, $name)){
                File::delete($activityRequest->file);
                $current_date_time = Carbon::now()->toDateTimeString(); 
                $activityRequest->file = $name;
                $activityRequest->post = $request->input('post');
                $activityRequest->notified_at = $current_date_time;
                $activityRequest->save();
                return redirect('userdashboard');
            }
        }

        $current_date_time = Carbon::now()->toDateTimeString(); 
        $activityRequest->post = $request->input('post');;
        $activityRequest->notified_at = $current_date_time;
        $activityRequest->save();
        return redirect('userdashboard');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activityRequest = ActivityRequest::find($id);
        $activityRequest->delete() ;
        return redirect('/userdashboard') ;
    }
}
