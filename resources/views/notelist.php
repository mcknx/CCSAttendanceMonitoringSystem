
<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><b>List of attendances</b></h5>
        <br>
        <blockquote class="card-text">You can find here all the informations about attendances in the system.
        You can also create a attendance <a href="{{ url('/attendanceCreate/') }}"><b> here.</b></a>
        </blockquote>

        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">attendance ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Subject(s)</th>
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


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>