<?php

namespace App\Http\Controllers;

use App\Professor;
// use App\Http\Controllers\Reservation;
use App\User;
use App\Record;
use App\Subject;
use App\Semester;
use App\Session;
use Auth;
use App;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function show(Request $request)
    {
        $sem = $request->input('sem-pdf');
        $from_year = $request->input('from-pdf');
        $to_year = $request->input('to-pdf');
        
        $m = $request->input('Subj_dayM');
        $t = $request->input('Subj_dayT');
        $w = $request->input('Subj_dayW');
        $th = $request->input('Subj_dayTH');
        $f = $request->input('Subj_dayF');
        $s = $request->input('Subj_dayS');
        $su = $request->input('Subj_daySu');
        
        $semesters = Semester::where('sem', '=', $sem)->where('from_year', '=', $from_year)->where('to_year', '=', $to_year)->first();
        
        if ($semesters != null) {
            $records_to_print = []; // (0 = semester) -> (1 = from year) -> (2 = to year) -> (3 = days selected) -> (4 = subject and teacher) -> (5 = record)
            $from_date = $request->input('from-date-pdf');
            $to_date = $request->input('to-date-pdf');

            // 0 = semester
            if ($sem == 1) {
                array_push($records_to_print, "1st Semester"); 
            }
            if ($sem == 2) {
                array_push($records_to_print, "2nd Semester"); 
            }
            if ($sem == 3) {
                array_push($records_to_print, "Summer"); 
            }

            array_push($records_to_print, $from_year, $to_year); // 1 = from year | 2 = to year

            // 3 = days selected
            $days_selected = [];
            if ($m) {
                array_push($days_selected, "Mon,"); 
            }else {
                array_push($days_selected, "0"); 
            }
            if ($t) {
                array_push($days_selected, "Tue,"); 
            }else {
                array_push($days_selected, "0"); 
            }
            if ($w) {
                array_push($days_selected, "Wed,"); 
            }else {
                array_push($days_selected, "0"); 
            }
            if ($th) {
                array_push($days_selected, "Thu,"); 
            }else {
                array_push($days_selected, "0"); 
            }
            if ($f) {
                array_push($days_selected, "Fri,"); 
            }else {
                array_push($days_selected, "0"); 
            }
            if ($s) {
                array_push($days_selected, "Sat,"); 
            }else {
                array_push($days_selected, "0"); 
            }
            if ($su) {
                array_push($days_selected, "Sun."); 
            }else {
                array_push($days_selected, "0"); 
            }

            $count = 0;
            foreach ($days_selected as $day) {
                if ($day != "0") {
                    $count++;
                }
            }

            // Return because there is no sense to continue
            if ($count == 0) {
                return redirect('/record');
            }

            array_push($records_to_print, $days_selected); // 3 = days selected
            $record_dates = Record::whereBetween('Rec_dateCreated', [$from_date, $to_date])->get();
            $weekNumber = 1;

            $from_d = strtotime($from_date);
            $to_d = strtotime($to_date);
            $from_dMPos = date("m", $from_d); // 01 - January
            $to_dMPos = date("m", $to_d); // 03 - March
            $from_dDaysCount = date("n", $from_d); // January Days
            $to_dDaysCount = date("n", $to_d); // 01 - March Days

            $currentEndOfWeek = strtotime("next saturday",$from_d);
            $currentEndOfWeek = date("Y-m-d",$currentEndOfWeek);
            dd($currentEndOfWeek);

            if ($from_dMPos == $to_dMPos){ // Same month (no repeat)
                $currentDayPos = date("j", $from_d);
                $currentDay = date("l", $from_d);
            }
            dd($from_dMPosCount < $from_dMPosCount);

            
    
        
            foreach ($record_dates as $day) {
                if($day->date->dayOfWeek == Carbon::FRIDAY)
                {
                    $weekNumber++;
                }
            }
            
            $subject_teacher = [];
            $records = [];
            foreach ($record_dates as $record_date) {
                $session = Session::where('record_id', '=', $record_date->id)->first();
                $subject = Subject::where('id', '=', $session->subject_id)->first();
                
                if (intval($m) == $subject->Subj_dayM or intval($t) == $subject->Subj_dayT or intval($w)== $subject->Subj_dayW
                    or intval($th) == $subject->Subj_dayTH or intval($f) == $subject->Subj_dayF or intval($s) == $subject->Subj_dayS
                    or intval($su) == $subject->Subj_daySu ) {
                    array_push($subject_teacher, $subject); // (4 = subject and teacher)
                    array_push($records, $session); // (5 = record status)
                }
            }
            array_push($records_to_print, $subject_teacher, $records); // (4 = subject) (5 = record)    
            // dd($records_to_print);
            $pdf = PDF::loadView('report', ['records_to_print'=>$records_to_print]);
            return $pdf->setPaper('a4', 'landscape')->stream();
            
        //     // $pdf = App::make('dompdf.wrapper');
        //     // $pdf->loadHTML('
        //     //   <p>asdasd</p>
        //     // ');
        //     // $pdf = PDF::loadView('report', $data);
        //     // return $pdf->download('invoice.pdf');
            
        //     // $professors = Professor::with('subjects')->get();
        }
        return redirect('/record');
    }

}


?>