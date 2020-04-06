<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
html, body {
    font-size: 12px;
    
}
table, td, th {  
  border: 1px solid black;
  text-align: left;
  
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 5px;
}

#head {
    background-color: lavender;
    opacity: 0;
}
</style>

<body>
    <center>
    <b>UNIVERSITY OF THE IMMACULATE CONCEPTION</b>
    <p>FR.SELGA ST., DAVAO CITY</p>
    <b>TEACHER'S CLASS ATTENDANCE</b>
    <p>{{ $records_to_print[0] }}, {{ $records_to_print[1] }} - {{ $records_to_print[2] }}</p>
    <p>
    <?php
        use Carbon\Carbon;
        $date_today = Carbon::now()->toDateTimeString();
        $dateStart = strtotime($records_to_print[4][0][0]);
        $dateEnd = strtotime($records_to_print[4][0][0]);
        $dateStartM = date("F", $dateStart);
        $dateEndM = date("F", $dateEnd);
        $dateStartY = date("Y", $dateStart);
        $dateEndY = date("Y", $dateEnd);
    ?>
    {{ $dateStartM }} {{ $dateStartY }}
    (
    @foreach($records_to_print[3] as $days)
        @if ($days != "0")
            {{ $days }}
        @endif        
    @endforeach
    ) Report
    </p>
    <br>
    </center>
    <!-- // (0 = semester) -> (1 = from year) -> (2 = to year) -> (3 = days selected) -> (4 = subject and teacher) -> (5 = record) -->
    <table border="1" align="center" style="overflow: wrap">
    <tr>
        <th>TIME</th>
        <th>DAY/S</th>
        <th>SUBJECT TITLE</th>
        <th>DESCRIPTION</th>
        <th>UNITS</th>
        <th>ROOM</th>
        <th>Yr & Sec</th>
        <th>TEACHER</th>
        <th>Day</th>
        <th>Status</th>
        <th>Remarks</th>
    </tr>
    @foreach ($records_to_print[4] as $month) 
        <?php $weekCount = 1;?>
        @foreach ($month[2] as $week) 
            <!-- $startOfWeek = $week[0];
            $endOfWeek = $week[1]; -->
            <tr id="head">
                <td colspan="11">
                    <center>
                        
                        <b> 
                        @if($week[2] == null) 
                            No record.
                        @endif
                        
                        Week {{ $weekCount }}
                        <?php 
                            $start_date = strtotime($week[0]);
                            $end_date = strtotime($week[1]);
                            $start_date = date("F j, Y", $start_date);
                            $end_date = date("F j, Y", $end_date);
                            $weekCount++;
                        ?>
                        ( {{ $start_date }} - {{ $end_date }} )
                        </b>
                    </center>
                </td>
            </tr>
            @foreach ($week[2] as $session)
                <tr>
                    <td>{{ $session->subject->Subj_timein }} - {{ $session->subject->Subj_timeout }}</td>
                    
                    <td>
                        @if($session->subject->Subj_dayM == 1 )
                        
                        <kbd><strong>Mon</strong></kbd>,  
                    
                        @endif

                        @if($session->subject->Subj_dayT == 1 )   
                        
                            <kbd><strong>Tue</strong></kbd>,  
                    
                        @endif

                        @if($session->subject->Subj_dayW == 1 ) 
                        
                            <kbd><strong>Wed</strong></kbd>,  
                    
                        @endif

                        @if($session->subject->Subj_dayTH == 1 ) 
                
                            <kbd><strong>Thu</strong></kbd>,  
                    
                        @endif

                        @if($session->subject->Subj_dayF == 1 ) 
                
                            <kbd><strong>Fri</strong></kbd>,  
                    
                        @endif

                        @if($session->subject->Subj_dayS == 1 ) 
                    
                            <kbd><strong>Sat</strong></kbd>,  
            
                        @endif

                        @if($session->subject->Subj_daySu == 1 ) 
                    
                            <kbd><strong>Sun</strong></kbd>. 
                    
                        @endif
                    </td>

                    <td>{{ $session->subject->Subj_title }}</td>
                    <td>{{ $session->subject->Subj_desc }}</td>
                    <td>{{ $session->subject->Subj_units }}</td>
                    <td>{{ $session->subject->Subj_room }}</td>
                    <td>{{ $session->subject->Subj_yr_sec }}</td>
                    <td>{{ Strtoupper($session->subject->professor->Prof_lname) }}, {{ Strtoupper($session->subject->professor->Prof_fname) }} {{ Strtoupper($session->subject->professor->Prof_mname) }}</td>
                    <td>
                        <?php 
                            $date_ = strtotime($session->record->Rec_dateCreated);
                            $date_d = date("F j, Y", $date_);
                            $day_d = date("l", $date_);
                        ?> {{ $date_d }} <br>( {{ $day_d }} )
                    </td>
                    <td>
                        @if ($session->Ses_status == 1) Present @endif
                        @if ($session->Ses_status == 2) Absent @endif
                        @if ($session->Ses_status == 3) Late @endif
                    </td>
                    <td>{{ $session->Ses_remarks }}</td>
                </tr>
            @endforeach
            
        @endforeach
    @endforeach
    </table>
</body>
</html>