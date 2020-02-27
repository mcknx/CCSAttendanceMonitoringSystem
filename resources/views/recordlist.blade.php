<script>
function clickOnPrint(){
    window.open('http://127.0.0.1:8000/pdf', '_blank');
}

</script>


<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><b>List of attendances</b></h5>
        <input class="card-title float-right btn btn-info d-inline" style="margin-top: -5px; margin-left: 10px;" type="button" value="Print" onclick="clickOnPrint()">
            <div class="d-inline float-right">
                <blockquote class="float-left card-text" style="margin-top: -5px;">To</blockquote>
                <input type="date" class=" d-inline float-left" value="2020-02-28">
            </div>
            <div class="d-inline float-right">
                <blockquote class="d-inline float-left card-text" style="margin-top: -5px;">From</blockquote>
                <input type="date" class=" d-inline float-left" value="2020-02-28">
            </div>
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
                <th scope="col">Delete record</th>
                <th scope="col">Print record</th>
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
                    <td>
                    <form action="{{ url('/recordDelete/'.$record->id) }}" method="post">
                        @csrf
                        <input onclick="return confirm('Are you sure?')"  type="submit" class="btn btn-sm btn-danger" value="Delete">
                    </form>

                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


