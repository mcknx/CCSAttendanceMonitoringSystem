

<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><b>List of attendances</b></h5>
        <input class="card-title" style="float:right;" class="form-control"  type="date" id="currentDate" name="currentDate" required pattern="\d{4}-\d{2}-\d{2}">
        <label class="card-title" style="float:right;" class="form-control"  for="currentDate">Date:</label>
        <br>
        <blockquote class="card-text">You can find here all the informations about attendances in the system.
        You can also create a attendance <a href="{{ url('/attendanceCreate/') }}"><b> here.</b></a>
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
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->id }}</td>
                    <td>{{ $attendance->Prof_fname }}</td>
                    <td>{{ $attendance->Prof_lname }}</td>
                    <td>{{ $attendance->Prof_mname }}</td>
                    <td>{{ $attendance->Subj_ID }}</td>
                    <td>

                        <a href="{{ url('/attendanceEdit/'.$attendance->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    </td>
                    <td>

                        <a href="{{ url('/attendanceEdit/'.$attendance->id) }}" class="btn btn-sm btn-warning">Open</a>

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
