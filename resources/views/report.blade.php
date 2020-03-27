<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <b>UNIVERSITY OF THE IMMACULATE CONCEPTION</b>
    <p>FR.SELGA ST., DAVAO CITY</p>
    <b>TEACHER'S CLASS ATTENDANCE</b>
    <p>{{ $records_to_print[0] }}, {{ $records_to_print[1] }} - {{ $records_to_print[2] }}</p>
    <p>
    @foreach($records_to_print[3] as $days)
        @if ($days != "0")
            {{ $days }}
        @endif        
    @endforeach
    </p>
    <br>
    </center>
    <!-- // (0 = semester) -> (1 = from year) -> (2 = to year) -> (3 = days selected) -> (4 = subject and teacher) -> (5 = record) -->
    <table border="1" align="center">
    <tr>
        <th>TIME</th>
        <th>DAY/S</th>
        <th>SUBJECT TITLE</th>
        <th>DESCRIPTION</th>
        <th>UNITS</th>
        <th>ROOM</th>
        <th>YEAR/SECTION</th>
        <th>TEACHER</th>
    </tr>
    @foreach ($records_to_print[4] as $subject)
        <tr>
            <td>{{ $subject->Subj_timein }} - {{ $subject->Subj_timeout }}</td>
            
            <td>
                @if($subject->Subj_dayM == 1 )
                
                <kbd><strong>Mon</strong></kbd>,  
            
                @endif

                @if($subject->Subj_dayT == 1 )   
                
                    <kbd><strong>Tue</strong></kbd>,  
            
                @endif

                @if($subject->Subj_dayW == 1 ) 
                
                    <kbd><strong>Wed</strong></kbd>,  
            
                @endif

                @if($subject->Subj_dayTH == 1 ) 
        
                    <kbd><strong>Thu</strong></kbd>,  
            
                @endif

                @if($subject->Subj_dayF == 1 ) 
        
                    <kbd><strong>Fri</strong></kbd>,  
            
                @endif

                @if($subject->Subj_dayS == 1 ) 
            
                    <kbd><strong>Sat</strong></kbd>,  
    
                @endif

                @if($subject->Subj_daySu == 1 ) 
            
                    <kbd><strong>Sun</strong></kbd>. 
            
                @endif
            </td>

            <td>{{ $subject->Subj_title }}</td>
            <td>{{ $subject->Subj_desc }}</td>
            <td>{{ $subject->Subj_units }}</td>
            <td>{{ $subject->Subj_room }}</td>
            <td>{{ $subject->Subj_yr_sec }}</td>
            <td>{{ Strtoupper($subject->professor->Prof_lname) }}, {{ Strtoupper($subject->professor->Prof_fname) }} {{ Strtoupper($subject->professor->Prof_mname) }}</td>
        </tr>
    @endforeach
    </table>

    <table border="1" align="center">
    <tr>
        <th>TIME</th>
        <th>DAY/S</th>
        <th>SUBJECT TITLE</th>
        <th>DESCRIPTION</th>
        <th>YEAR/SECTION</th>
        <th>TEACHER</th>
    </tr>
    @foreach ($records_to_print[4] as $subject)
        <tr>
            <td>{{ $subject->Subj_timein }} - {{ $subject->Subj_timeout }}</td>
            
            <td>
                @if($subject->Subj_dayM == 1 )
                
                <kbd><strong>Mon</strong></kbd>,  
            
                @endif

                @if($subject->Subj_dayT == 1 )   
                
                    <kbd><strong>Tue</strong></kbd>,  
            
                @endif

                @if($subject->Subj_dayW == 1 ) 
                
                    <kbd><strong>Wed</strong></kbd>,  
            
                @endif

                @if($subject->Subj_dayTH == 1 ) 
        
                    <kbd><strong>Thu</strong></kbd>,  
            
                @endif

                @if($subject->Subj_dayF == 1 ) 
        
                    <kbd><strong>Fri</strong></kbd>,  
            
                @endif

                @if($subject->Subj_dayS == 1 ) 
            
                    <kbd><strong>Sat</strong></kbd>,  
    
                @endif

                @if($subject->Subj_daySu == 1 ) 
            
                    <kbd><strong>Sun</strong></kbd>. 
            
                @endif
            </td>

            <td>{{ $subject->Subj_title }}</td>
            <td>{{ $subject->Subj_desc }}</td>
            <td>{{ $subject->Subj_units }}</td>
            <td>{{ $subject->Subj_room }}</td>
            <td>{{ $subject->Subj_yr_sec }}</td>
            <td>{{ Strtoupper($subject->professor->Prof_lname) }}, {{ Strtoupper($subject->professor->Prof_fname) }} {{ Strtoupper($subject->professor->Prof_mname) }}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>