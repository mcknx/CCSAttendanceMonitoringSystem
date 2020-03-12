<?php

namespace App\Imports;

use App\Imports\ProfessorsImport;
use App\Subject;
use App\Professor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SubjectsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $emptyRow = array_filter($row);
        
        if(!empty($emptyRow)){
            $strDateTimein = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['subj_timein']);


            $strDateTimeout = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['subj_timeout']);

            $str = $row['days'];
            $profcode = strtolower($row['prof_fname'][0] . $row['prof_lname']);
            
            $professor = Professor::where('Prof_code', '=', $profcode)->first();
            
            if ($professor === null){
                $arr = [$row['prof_fname'], $row['prof_mname'], $row['prof_lname'], $profcode, $row['prof_gender']];
                $professor = new ProfessorsImport();
                $professor = $professor->model($arr);

            }
            
            $subject = new Subject() ;

            $subject->prof_id = $professor->id;
            
            $subject->Subj_timein = $strDateTimein->format('H:i:s');
            
            $subject->Subj_timeout = $strDateTimeout->format('H:i:s');

            $arr1 = str_split($str, 3);

            for ($x = 0; $x < count($arr1); $x++) {
                if (strtolower($arr1[$x]) == strtolower('MON')){
                    $subject->Subj_dayM = 1;
                // $arr[count($arr)+1] = ['Subj_dayM' => 1];
                    // $day[0] = 1;
                }
                if (strtolower($arr1[$x]) == strtolower('TUE')){
                    $subject->Subj_dayT = 1;
                // $arr[count($arr)+1] = ['Subj_dayT' => 1];
                // $day[1] = 1;
                }
                if (strtolower($arr1[$x]) == strtolower('WED')){
                    $subject->Subj_dayW = 1;
                // $arr[count($arr)+1] = ['Subj_dayW' => 1];
                // $day[2] = 1;
                }
                if (strtolower($arr1[$x]) == strtolower('THU')){
                    $subject->Subj_dayTH = 1;
                // $arr[count($arr)+1] = ['Subj_dayTH' => 1];
                // $day[3] = 1;
                }
                if (strtolower($arr1[$x]) == strtolower('FRI')){
                    $subject->Subj_dayF = 1;
                // $arr[count($arr)+1] = ['Subj_dayF' => 1];
                // $day[4] = 1;
                }
                if (strtolower($arr1[$x]) == strtolower('SAT')){
                    $subject->Subj_dayS = 1;
                // $arr[count($arr)+1] = ['Subj_dayS' => 1];
                // $day[5] = 1;
                }
                if (strtolower($arr1[$x]) == strtolower('SUN')){
                    $subject->Subj_daySu = 1;
                // $arr[count($arr)+1] = ['Subj_daySu' => 1];
                // $day[6] = 1;
                }
            }

            $subject->Subj_title = $row['subj_title'];
            $subject->Subj_desc = $row['subj_desc'];
            $subject->Subj_units = $row['subj_units'];
            $subject->Subj_room = $row['subj_room'];
            $subject->Subj_yr_sec = $row['subj_yr_sec'];
            $subject->Prof_code = $profcode;

            // $i = 0;
            // $subjects = Subject::all();
            // if ($subjects->isEmpty()) {
            //     return $subject;
            // }
            // dd($subjects);
            // $finish = count($subjects);
            // dd($subjects);
            // while ($i < $finish-1){
            //     $i++;
            //     $sub_title = $subjects[$i]->Subj_title;
            //     $sub_yr_sec = $subjects[$i]->Subj_yr_sec;
            //     $sub_prof_code = $subjects[$i]->Prof_code;

            //     if ($i == $finish-1) {
            //         return;
            //     }
            //     if ($subject->Subj_title == $sub_title) {
            //         if ($subject->Subj_yr_sec == $sub_yr_sec) {
            //             if ($subject->Prof_code == $sub_prof_code) {
            //                 if ($subject->Subj_dayM == 1) {
            //                     // dd($subjects[$i]);
            //                     if ($subjects[$i]->Subj_dayM == 1) {
            //                         continue;
            //                     }else {
            //                         return $subject;
            //                     }
            //                 }
            //                 if ($subject->Subj_dayT == 1) {
            //                     if ($subjects[$i]->Subj_dayT == 1) {
            //                         continue;
            //                     }else {
            //                         return $subject;
            //                     }
            //                 }if ($subject->Subj_dayW == 1) {
            //                     if ($subjects[$i]->Subj_dayW == 1) {
            //                         continue;
            //                     }
            //                 }if ($subject->Subj_dayTH == 1) {
            //                     if ($subjects[$i]->Subj_dayTH == 1) {
            //                         continue;
            //                     }else {
            //                         return $subject;
            //                     }
            //                 }if ($subject->Subj_dayF == 1) {
            //                     if ($subjects[$i]->Subj_dayF == 1) {
            //                         continue;
            //                     }else {
            //                         return $subject;
            //                     }
            //                 }if ($subject->Subj_dayS == 1) {
            //                     if ($subjects[$i]->Subj_dayS == 1) {
            //                         continue;
            //                     }else {
            //                         return $subject;
            //                     }
            //                 }if ($subject->Subj_daySu == 1) {
            //                     if ($subjects[$i]->Subj_daySu == 1) {
            //                         continue;
            //                     }else {
            //                         return $subject;
            //                     }
            //                 }
            //             }
            //         }
            //     }
            //     // $subjects = Subject::where('Subj_title', '=', $subject->Subj_title)->where('Subj_yr_sec', '=', $subject->Subj_yr_sec)->where('Prof_code', '=', $subject->Prof_code)->first();
                
            // }
            
            return $subject;
        }
    }
    
}
