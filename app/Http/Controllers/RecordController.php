<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::all() ;
        return view('record',['records'=>$records,'layout'=>'recordIndex']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $records = Record::all() ;
        return view('record',['records'=>$records,'layout'=>'recordCreate']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = new Record() ;
        $record->Rec_dateCreated = $request->input('currentDate') ;
        $record->Rec_noProf = 0;
        $record->Rec_noPresent = 0;
        $record->Rec_noAbsent = 0;
        $record->Rec_noLate = 0;
        $record->save() ;
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
        $record = Record::find($id);
        $records = Record::all() ;
        return view('record',['records'=>$records,'record'=>$record,'layout'=>'recordShow']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Record::find($id);
        $records = Record::all() ;
        return view('record',['records'=>$records,'record'=>$record,'layout'=>'recordEdit']);
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
        $record->delete() ;
        return redirect('/record') ;
    }
}
