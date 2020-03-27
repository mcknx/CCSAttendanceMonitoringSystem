


<div class="card mb-3">
    <div class="card-body">
        <div class="col d-inline col-sm">
            <h5 class="card-title"><b>List of attendances</b></h5>
        </div>
        <input class="card-title float-right btn btn-info d-inline" style="margin-top: -5px; margin-left: 10px;" type="button" value="Print" data-toggle="modal" data-target="#modal-print">
        <input class="card-title float-right btn btn-info d-inline" style="margin-top: -5px; margin-left: 10px;" type="button" value="Select Semester to Show" data-toggle="modal" data-target="#modal-semester">
        <br>
        <form action="{{ url('/recordCreate') }}" method="get">
            <blockquote class="card-text">You can find here all the informations about attendances in the system.
            You can also create attendance <button class="btn btn-outline-info" type="submit"><b> here.</b></button>
            </blockquote>
            
        </form>
        <table class="table table-responsive">
            <thead class="thead-light">
            <tr>
                <!-- <th scope="col">Record ID</th> -->
                <th scope="col">Semester</th>
                <th scope="col">From Year</th>
                <th scope="col">To Year</th>
                <th scope="col">Date created</th>
                <!-- <th scope="col">Total No.</th> -->
                <!-- <th scope="col">No. Present</th> -->
                <!-- <th scope="col">No. Absent</th> -->
                <!-- <th scope="col">No. Late</th> -->
                <th scope="col">Show record</th>
                <!-- <th scope="col">Edit record</th> -->
                <!-- <th scope="col">Print record</th> -->
            </tr>
            </thead>
            <tbody>
            @if ($records != null)
                @foreach($records as $record)
                <?php
                $dt = strtotime($record->Rec_dateCreated);
                $recordDate = date("D, M d, Y", $dt);
                $day = date("l", $dt);
                $dayAbbrv = date("D", $dt);
                ?>
                    <tr>
                        <td>
                            @if ($semester->sem == 1) First @endif
                            @if ($semester->sem == 2) Second @endif
                            @if ($semester->sem == 3) Summer @endif
                        </td>

                        <td>{{ $semester->from_year }}</td>

                        <td>{{ $semester->to_year }}</td>
                        
                        <td>{{ $recordDate }}</td>
                        <!-- <td>{{ $record->Rec_noProf }}</td> -->
                        <!-- <td>{{ $record->Rec_noPresent }}</td> -->
                        <!-- <td>{{ $record->Rec_noAbsent }}</td> -->
                        <!-- <td>{{ $record->Rec_noLate }}</td> -->
                        <td class="text-center">
                            <a href="{{url('/sessionShow/' .$record->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>

                        <!-- <td class="text-center"> -->
                            <!-- <form action="{{ url('/recordEdit/'.$record->id) }}" method="post"> -->
                                <!-- @csrf -->
                                <!-- value="Delete" -->
                                <!-- <input type="number" name="sem_id" value="{{ $semester->id }}" hidden> -->
                                <!-- <button onclick="return confirm('Are you sure?')"  type="submit" class="btn btn-sm btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> -->
                            <!-- </form> -->
                        <!-- </td> -->

                        <!-- <td class="text-center"> -->
                            <!-- <form action="{{ url('/recordDelete/'.$record->id) }}" method="post"> -->
                                <!-- @csrf -->
                                <!-- value="Delete" -->
                                <!-- <button onclick="return confirm('Are you sure?')"  type="submit" class="btn btn-sm btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i></button> -->
                            <!-- </form> -->
                        <!-- </td> -->
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
<?php
    use Carbon\Carbon;
    $date_today = Carbon::now()->toDateTimeString();
    $dt = strtotime($date_today);
    $date = date("Y-m-d", $dt);
?>

<!-- Modals -->
<!-- modal-print -->
<div class="modal" id="modal-print">
    <div class="modal-dialog">
        <form action="{{url('pdf')}}" method="post">
            @csrf
            <div class="modal-content bg-info">
                <div class="modal-header">
                    <h4 class="modal-title">Print Section</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Select Semester</label>
                        <select name="sem-pdf" class="btn btn-sm btn-outline-dark " required>
                            <option value="1">1st Semester</option>
                            <option value="2">2nd Semester</option>
                            <option value="3">Summer</option>
                        </select><br>
                        <div class="col d-inline col-sm">
                            <label class="card-text" for="from" style="margin-top: -5px;">From Year</label>
                            <input type="text" id="date-from" name="from-pdf" class="btn btn-sm btn-outline-dark d-inline" value="2020" required>
                        </div>
                        <div class="col d-inline col-sm"><br>
                            <label class="card-text" for="to" style="margin-top: -5px;">To Year</label>
                            <input type="text" id="date-to" name="to-pdf" class="btn btn-sm btn-outline-dark d-inline" value="2020" required>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Enter Date</label><br>
                        <div class="col d-inline col-sm">
                            <label class=" card-text" for="from" style="margin-top: -5px;">From</label>
                            <input type="date"  value="{{$date}}" name="from-date-pdf">
                        </div>
                        <div class="col d-inline col-sm">
                            <label class="card-text" for="to" style="margin-top: -5px;">To</label>
                            <input type="date" value="{{$date}}" name="to-date-pdf">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subject Day</label>
                        <div class="form-group clearfix bg-info">
                                <div class="icheck-primary d-inline">
                                <input type="checkbox" id="Mon"  name="Subj_dayM" value="1">
                                <label for="Mon">
                                    Mon
                                </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                <input type="checkbox" id="Tue" name="Subj_dayT" value="1">
                                <label for="Tue">
                                    Tue
                                </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                <input type="checkbox" id="Wed" name="Subj_dayW" value="1">
                                <label for="Wed">
                                    Wed
                                </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                <input type="checkbox" id="Thu" name="Subj_dayTH" value="1" >
                                <label for="Thu">
                                    Thu
                                </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                <input type="checkbox" id="Fri" name="Subj_dayF" value="1" >
                                <label for="Fri">
                                    Fri
                                </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                <input type="checkbox" id="Sat" name="Subj_dayS" value="1"  >
                                <label for="Sat">
                                Sat
                                </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                <input type="checkbox" id="Sun" name="Subj_daySu" value="1"  >
                                <label for="Sun">
                                Sun
                                </label>
                                </div>
                        
                        </div>
                        <!-- <input  name="Subj_day" type="text" class="form-control"  placeholder="Enter Last Name"> -->
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light">Print</button>
                </div>
            </div>
        <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal-print -->

<!-- modal-semester -->
<div class="modal" id="modal-semester">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <form action="{{url('record2')}}" method="post" enctype="multipart/form-data">
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
    // function clickOnPrint(){
    //     window.open('http://127.0.0.1:8000/pdf', '_blank');
    // }

    // function clickOnShowSemester(){
    //     window.open('http://127.0.0.1:8000/pdf', '_blank');
    // }
</script>

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


