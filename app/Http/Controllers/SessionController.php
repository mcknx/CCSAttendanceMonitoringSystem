<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;

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
    public function show($id)
    {
        $session = Session::find($id);
        $sessions = Session::all() ;
        return view('session',['sessions'=>$sessions,'session'=>$session,'layout'=>'sessionShow']);
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
        $session->Prof_ID = $request->input('Prof_ID');
        $session->Prof_code = $request->input('Prof_code'); //IF 1 present, 2 absent, 3 late, 4 excused
        $session->Ses_status = $request->input('Ses_status');
        $session->Ses_remarks = $request->input('Ses_remarks');
        $session->Ses_timeCreated = $request->input('Ses_timeCreated');        
        $session->save() ;
        return redirect('/session') ;
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
