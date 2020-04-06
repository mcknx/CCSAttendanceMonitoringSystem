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
            $records = [];
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
            // $record_dates = Record::whereBetween('Rec_dateCreated', [$from_date, $to_date])->get();
            // dd($record_dates);
            $from_d = strtotime($from_date);
            $to_d = strtotime($to_date);
            $from_month_Pos = date("n", $from_d); // 03 - March
            $to_month_Pos = date("n", $to_d); // 03 - March
            $from_month_Pos = intval($from_month_Pos);
            $to_month_Pos = intval($to_month_Pos);
            $from_year_Pos = date("Y", $from_d);
            $to_year_Pos = date("Y", $to_d);
            $from_year = intval($from_year_Pos);
            $to_year = intval($to_year_Pos);
            $from_day = date("j", $from_d); // 1 (Day Calendar)
            $first = false;

            for (; $from_year_Pos <= $to_year_Pos; ) { //year
                for (; $from_month_Pos <= $to_month_Pos; ) { //month
                    if ($from_month_Pos == 12) {
                        break;
                    }
                    $monthStart = $from_year_Pos . "-" . $from_month_Pos . "-" . $from_day;
                    if ($from_month_Pos <= 9 && $from_month_Pos != 0 ) {
                        if ( $from_day <= 9 && $from_day != 0) {
                            // $weekStart = $from_year_Pos . "-" . 0 . $from_month_Pos . "-" . 0 .($from_day);
                            $monthStart = $from_year_Pos . "-" . 0 . $from_month_Pos . "-" . 0 . $from_day;
                        }else {
                            $monthStart = $from_year_Pos . "-" . $from_month_Pos . "-" . 0 . $from_day;
                            // $weekStart = $from_year_Pos . "-" . 0 . $from_month_Pos . "-" .($from_day);
                        }
                    }
                    
                    $monthEnd = date("Y-m-t", strtotime($from_date));
                    $current_date = strtotime($from_year_Pos . "-" . $from_month_Pos . "-" . $from_day); //2020-03-01
                    $end_date = strtotime($monthEnd); //2020-03-01
                    
                    // if ($first == false) {
                    //     $current_date = strtotime($from_year_Pos . "-" . $from_month_Pos . "-" . 01); //2020-03-01
                    //     if ($from_month_Pos <= 9 && $from_month_Pos != 0 ) {
                    //         if ( $from_day <= 9 && $from_day != 0) {
                    //             // $weekStart = $from_year_Pos . "-" . 0 . $from_month_Pos . "-" . 0 .($from_day);
                    //             $monthStart = $from_year_Pos . "-" . 0 . $from_month_Pos . "-" . 01;
                    //         }else {
                    //             $monthStart = $from_year_Pos . "-" . $from_month_Pos . "-" . 01;
                    //             // $weekStart = $from_year_Pos . "-" . 0 . $from_month_Pos . "-" .($from_day);
                    //         }
                    //     }
                    //     // $monthStart = $from_year_Pos . "-" . $from_month_Pos . "-" . 01;
                    // }
                    // dd($current_date . "waw");
                    // $from_month = date("m", $current_date);
                    // $to_month = date("m", $current_date);
                    $from_day = date("j", $current_date); // 1 (Day Calendar)
                    $to_day = date("j", $end_date); // 28 Day Calendar
                    $from_day_Pos = date("w", $current_date); // 1 (Position)
                    $to_day_Pos = date("w", $end_date); // 6 Position
                    $from_dayOfWeek = date("l", $current_date); // Sunday (Day of week)
                    $to_dayOfWeek = date("l", $end_date); // Saturday
                    
                    $month = [];
                    // if ($from_month_Pos == $to_month_Pos){ // Same month (no repeat)
                    $_month = [];
                    

                    array_push($_month, $monthStart); // Month Start
                    array_push($_month, $monthEnd); // Month End
                    $week = [];
                    
                    // $first_day_from_m = date("Y-m-01", strtotime($from_date));
                    // $last_day_from_m = date("Y-m-t", strtotime($from_date));
                    // $current_day = strtotime($from_year . "-" . $from_month . "-" . $from_day); //2020-03-01
                    for (; $from_day <= $to_day; ) { // Stops after from date is equals to date
                        $_week = [];
                        $current_day = strtotime($from_year_Pos . "-" . $from_month_Pos . "-" . $from_day); //2020-03-01
                        if ($from_month_Pos <= 9 && $from_month_Pos != 0 ) {
                            if ( $from_day <= 9 && $from_day != 0) {
                                $weekStart = $from_year_Pos . "-" . 0 . $from_month_Pos . "-" . 0 .($from_day);
                            }else {
                                $weekStart = $from_year_Pos . "-" . 0 . $from_month_Pos . "-" .($from_day);
                            }
                        }else {
                            $weekStart = $from_year_Pos . "-" . $from_month_Pos . "-" . ($from_day);
                        }
                        
                        $weekEnd = $from_year_Pos . "-" . $from_month_Pos . "-" . ($from_day);
                        $dayOfWeek = date("w", $current_day); // Sunday (Day of week)
                        $dayOfWeekRemaining = 0;
                        // dd($dayOfWeek);
                        // Watch if the day of week is sunday if not then
                        if ($dayOfWeek != 0) {
                            // $res = $from_dayOfWeek + $res;
                            $dayOfWeekRemaining = 7 - $dayOfWeek; //para makuha kung pila kulang na days para next week
                            $from_day += $dayOfWeekRemaining;
                        }else {
                            // if ($from_dayOfWeek == 0) 
                            $from_day += 7;
                        }

                        if ($from_day > intval($to_day)) {
                            $toReduct = $from_day - intval($to_day);
                            $from_day = $from_day - $toReduct;
                        }
                        
                        if ($to_day == $from_day) {
                            if ($from_month_Pos <= 9 && $from_month_Pos != 0 ) {
                                if ( $from_day <= 9 && $from_day != 0) {
                                    $weekEnd = $from_year_Pos . "-" . 0 . $from_month_Pos . "-" . 0 .($from_day);
                                }else {
                                    $weekEnd = $from_year_Pos . "-" . 0 . $from_month_Pos . "-" .($from_day);
                                }
                            }else {
                                $weekEnd = $from_year_Pos . "-" . $from_month_Pos . "-" . ($from_day);
                            }
                            array_push($_week, $weekStart); // Month
                            array_push($_week, $weekEnd); // Month
                            
                            $record_dates = Record::whereBetween('Rec_dateCreated', [$weekStart, $weekEnd])->get();
                            // dd($weekStart);

                            $subject_teacher = [];
                            $_session = [];
                            foreach ($record_dates as $record_date) {
                                $session = Session::where('record_id', '=', $record_date->id)->first();
                                // dd($session);
                                if ($session != null) {
                                    // dd($record_date);
                                    $subject = Subject::where('id', '=', $session->subject_id)->first();
                                    
                                    if (intval($m) == $subject->Subj_dayM or intval($t) == $subject->Subj_dayT or intval($w)== $subject->Subj_dayW
                                        or intval($th) == $subject->Subj_dayTH or intval($f) == $subject->Subj_dayF or intval($s) == $subject->Subj_dayS
                                        or intval($su) == $subject->Subj_daySu ) {
                                        array_push($subject_teacher, $subject); // (4 = subject and teacher)
                                        array_push($_session, $session); // (5 = record status)
                                    }
                                }
                                // (0 = semester) -> (1 = from year) -> (2 = to year) -> (3 = days selected) -> (4 = subject and teacher) -> (5 = record)
                            }
                            array_push($_week, $_session); // Month
                            array_push($week, $_week); // Month
                            break;
                        }else {
                            if ($from_month_Pos < 9 && $from_month_Pos != 0) {
                                if ( $from_day <= 9 && $from_day != 0) {
                                    $weekEnd = $from_year_Pos . "-" . 0 . $from_month_Pos . "-" . 0 . ($from_day-1);
                                }else {
                                    $weekEnd = $from_year_Pos . "-" . 0 . $from_month_Pos . "-" .($from_day-1);
                                }  
                            }else {
                                $weekEnd = $from_year_Pos . "-" . $from_month_Pos . "-" . ($from_day-1);
                            }
                 
                            // $weekEnd = $from_year_Pos . "-" . $from_month_Pos . "-" . ($from_day-1);
                            $record_dates = Record::whereBetween('Rec_dateCreated', [$weekStart, $weekEnd])->get();
                            // dd($record_dates);
                            array_push($_week, $weekStart); // Month
                            array_push($_week, $weekEnd); // Month
                            
                            $subject_teacher = [];
                            $_session = [];
                            foreach ($record_dates as $record_date) {
                                $session = Session::where('record_id', '=', $record_date->id)->first();
                                
                                if ($session != null) {
                                    // dd($record_date);
                                    $subject = Subject::where('id', '=', $session->subject_id)->first();
                                    
                                    if (intval($m) == $subject->Subj_dayM or intval($t) == $subject->Subj_dayT or intval($w)== $subject->Subj_dayW
                                        or intval($th) == $subject->Subj_dayTH or intval($f) == $subject->Subj_dayF or intval($s) == $subject->Subj_dayS
                                        or intval($su) == $subject->Subj_daySu ) {
                                        array_push($subject_teacher, $subject); // (4 = subject and teacher)
                                        array_push($_session, $session); // (5 = record status)
                                    }
                                }
                                // (0 = semester) -> (1 = from year) -> (2 = to year) -> (3 = days selected) -> (4 = subject and teacher) -> (5 = record)
                            }
                            array_push($_week, $_session); // Month
                            array_push($week, $_week); // Month
                        }
                       
                    }
                    array_push($_month, $week); // Month
                    array_push($month, $_month); // Month
                    // }
                    $from_month_Pos++;
                    $first = true;
                }
                $from_year_Pos++;
            }
            array_push($records_to_print, $month); // Month
            
            // array_push($records_to_print, $subject_teacher, $records); // (4 = subject) (5 = record)    
            // array_push($records_to_print, $month); // Month
            // foreach ($records_to_print[4] as $month) {
            //     $startOfMonth = $month[0];
            //     $endOfMonth = $month[1];

            //     foreach ($month[2] as $week) {
            //         $startOfWeek = $week[0];
            //         $endOfWeek = $week[1];

            //         foreach ($week[2] as $session) {

            //         }
            //     }
            // }
            // dd($records_to_print);
            // dd($records_to_print[4][0][2][0][2]);
            $pdf = PDF::loadView('report', ['records_to_print'=>$records_to_print]);
            return $pdf->setPaper('a4', 'landscape')->stream();   
        }
        
        return redirect('/record');
    }

}


?>