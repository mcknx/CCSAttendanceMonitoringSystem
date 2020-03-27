
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><b>List of subjects</b></h5><br>
        <blockquote class="card-text">You can find here all the informations about subjects in the system.
                    You can also create a subject <a href="{{ url('/subjectCreate/') }}"><b> here.</b></a></blockquote>
        
        <table class="table table-responsive">
            <thead class="thead-light">
            <tr>
     
                <th scope="col">Title</th>
                <th scope="col">Day</th>
                <th scope="col">Time-in</th>
                <th scope="col">Time-out</th>
                <th scope="col">Description</th>
                <th scope="col">Units</th>
                <th scope="col">Room</th>
                <th scope="col">Year & Section</th>
                <th scope="col">Professor Code</th>
                <th scope="col">Action</th>
                
            </tr>
            </thead>
            <tbody>
            @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->Subj_title }}</td>
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
                    <td>{{ $subject->Subj_timein }}</td>
                    <td>{{ $subject->Subj_timeout }}</td>
                    <td>{{ $subject->Subj_desc }}</td>
                    <td>{{ $subject->Subj_units }}</td>
                    <td>{{ $subject->Subj_room }}</td>
                    <td>{{ $subject->Subj_yr_sec }}</td>
                    <td>{{ $subject->Prof_code }}</td>
                    <td>

                        <a href="{{ url('/subjectEdit/'.$subject->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>






