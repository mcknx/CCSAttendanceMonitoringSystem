
<script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "80%" 
        }
</script>

<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><b>List of attendances</b></h5>
        <br>
        <blockquote class="card-text">You can find here all the informations about attendances in the system.
        You can also create attendance <a href="{{ url('/recordCreate') }}"><b> here.</b></a>
        </blockquote>

        <table class="table table-responsive">
            <thead class="thead-light">
            <tr>
                <th scope="col">Record ID</th>
                <th scope="col">Date created</th>
                <th scope="col">No. Professors</th>
                <th scope="col">No. Present</th>
                <th scope="col">No. Absent</th>
                <th scope="col">No. Late</th>
                <th scope="col">Edit record</th>
                <th scope="col">Delete record</th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->Rec_dateCreated }}</td>
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
                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                    </form>

                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    function getDate() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd<10) {
            dd = '0'+dd
        } 

        if(mm<10) {
            mm = '0'+mm
        } 

        today = yyyy + '-' + mm + '-' + dd ;
        console.log(today);
        document.getElementById("currentDate").value = today;
    }


    window.onload = function() {
        getDate();
    };
</script>
