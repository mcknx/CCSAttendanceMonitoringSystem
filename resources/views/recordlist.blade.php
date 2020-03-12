<script>
function clickOnPrint(){
    window.open('http://127.0.0.1:8000/pdf', '_blank');
}

</script>


<div class="card mb-3">
    <div class="card-body">
        <div class="col d-inline col-sm">
            <h5 class="card-title"><b>List of attendances</b></h5>
        </div>
        <input class="card-title float-right btn btn-info d-inline" style="margin-top: -5px; margin-left: 10px;" type="button" value="Print" data-toggle="modal" data-target="#modal-print">
        <br>
        <blockquote class="card-text">You can find here all the informations about attendances in the system.
        You can also create attendance <a href="{{ url('/recordCreate') }}"><b> here.</b></a>
        </blockquote>
        <table class="table table-responsive">
            <thead class="thead-light">
            <tr>
                <th scope="col">Record ID</th>
                <th scope="col">Date created</th>
                <th scope="col">Total No.</th>
                <th scope="col">No. Present</th>
                <th scope="col">No. Absent</th>
                <th scope="col">No. Late</th>
                <th scope="col">Edit record</th>
                <!-- <th scope="col">Delete record</th> -->
                <!-- <th scope="col">Print record</th> -->
            </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
            <?php
            $dt = strtotime($record->Rec_dateCreated);
            $recordDate = date("D, M d, Y", $dt);
            $day = date("l", $dt);
            $dayAbbrv = date("D", $dt);
            ?>
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $recordDate }}</td>
                    <td>{{ $record->Rec_noProf }}</td>
                    <td>{{ $record->Rec_noPresent }}</td>
                    <td>{{ $record->Rec_noAbsent }}</td>
                    <td>{{ $record->Rec_noLate }}</td>
                    <td>

                        <a href="{{url('/sessionShow/' .$record->id)}}" class="btn btn-sm btn-warning">Edit</a>

                    </td>
                    <!-- <td> -->
                    <!-- <form action="{{ url('/recordDelete/'.$record->id) }}" method="post">
                        @csrf
                        <input onclick="return confirm('Are you sure?')"  type="submit" class="btn btn-sm btn-danger" value="Delete">
                    </form> -->

                    <!-- </td> -->

                </tr>
            @endforeach
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
<!-- User View -->
<div class="modal" id="modal-print">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title">Print Section</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Select Semester</label><br>
                    <div class="col d-inline col-sm">
                        <label class=" card-text" for="from" style="margin-top: -5px;">From</label>
                        <input type="date"  value="{{$date}}" name="from">
                    </div>
                    <div class="col d-inline col-sm">
                        <label class="card-text" for="to" style="margin-top: -5px;">To</label>
                        <input type="date" value="{{$date}}" name="to">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label>Enter Date</label><br>
                    <div class="col d-inline col-sm">
                        <label class=" card-text" for="from" style="margin-top: -5px;">From</label>
                        <input type="date"  value="{{$date}}" name="from">
                    </div>
                    <div class="col d-inline col-sm">
                        <label class="card-text" for="to" style="margin-top: -5px;">To</label>
                        <input type="date" value="{{$date}}" name="to">
                        
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
                <button type="button" class="btn btn-outline-light" onclick="clickOnPrint()">Print</button>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.user View -->


