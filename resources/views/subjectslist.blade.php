
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><b>List of subjects</b></h5><br>
        <input class="card-title float-right btn btn-info d-inline" style="margin-top: -5px; margin-left: 10px;" type="button" value="Select Semester to Show" data-toggle="modal" data-target="#modal-semester">
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
            @if ($subjects != null)
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
            @endif
            </tbody>
        </table>
    </div>
</div>
<!-- modal-semester -->
<div class="modal" id="modal-semester">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <form action="{{url('subject2')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Select (Semester and Year)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                        <div class="row text-center">
                            <!-- <div class="col-lg-12 mr-auto text-right d-sm-inline"> -->
                                <!-- <p class="lead"> -->
                                <div class="form-group col-12">
                                    <label for="sem">Select Semester</label>
                                    <select name="sem" class="btn btn-sm btn-outline-dark " required>
                                        <option value="1">1st Semester</option>
                                        <option value="2">2nd Semester</option>
                                        <option value="3">Summer</option>
                                    </select><br>
                                </div>
                                
                                <div class="form-group col-6">
                                    <label for="from">From Year</label>
                                        <input type="text" id="date-own" name="from" class="btn btn-sm btn-outline-dark d-inline" value="2020" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for="to">To Year</label><br>
                                        <input type="text" id="date-own1" name="to" class="btn btn-sm btn-outline-dark d-inline" value="2020" required><br>
                                </div>
                                <!-- </p> -->
                            <!-- </div> -->
                        </div>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light">Show Semester</button>
                </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal-semester -->

<script type="text/javascript">
    $('#date-own').datepicker({
        minViewMode: 2,
        format: 'yyyy'
    });
    $('#date-own1').datepicker({
        minViewMode: 2,
        format: 'yyyy'
    });

    $('#date-from').datepicker({
        minViewMode: 2,
        format: 'yyyy'
    });
    $('#date-to').datepicker({
        minViewMode: 2,
        format: 'yyyy'
    });

</script>





