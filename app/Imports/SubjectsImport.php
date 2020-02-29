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
        // if(!empty($emptyRow)){
        // dd(array_filter($row));
        // }
        
        if(!empty($emptyRow)){
            $strDateTimein = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['subj_timein']);
            // $strDateTimein = $strDateTimein->format('Y-m-d H:i:s');
            // $strDateTimein = explode(" ",$strDateTimein);
            // $strDateTimein = $strDateTimein[1];

            $strDateTimeout = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['subj_timeout']);
            // $strDateTimeout = $strDateTimeout->format('Y-m-d H:i:s');
            // $strDateTimeout = explode(" ",$strDateTimeout);
            // $strDateTimeout = $strDateTimeout[1];

            $str = $row['days'];

            // dd($row['prof_mname'][0]);
            $profcode = strtolower($row['prof_fname'][0] . $row['prof_lname']);
            
            $professor = Professor::where('Prof_code', '=', $profcode)->first();
            
            if ($professor === null){
                $arr = [$row['prof_fname'], $row['prof_mname'], $row['prof_lname'], $profcode];
                // dd($arr);
                $professor = new ProfessorsImport();
                $professor = $professor->model($arr);
                // dd($professor->id);
                // dd( $createProfessor);

            }
            
            $subject = new Subject() ;

            $subject->prof_id = $professor->id;
            
            $subject->Subj_timein = $strDateTimein->format('H:i:s');
            
            $subject->Subj_timeout = $strDateTimeout->format('H:i:s');

            

            // $arr[] = [
            //     'prof_id' => $value->prof_id,
            //     'Subj_timein' => $value->Subj_timein,
            //     'Subj_timeout' => $value->Subj_timeout,
            //     // 'Subj_dayM' => $value->Subj_dayM,
            //     // 'Subj_dayT' => $value->Subj_dayT,
            //     // 'Subj_dayW' => $value->Subj_dayW,
            //     // 'Subj_dayTH' => $value->Subj_dayTH,
            //     // 'Subj_dayF' => $value->Subj_dayF,
            //     // 'Subj_dayS' => $value->Subj_dayS,
            //     // 'Subj_daySu' => $value->Subj_daySu,
            // ];

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


            return $subject;
        }
    }
    
}
