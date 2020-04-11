
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
                <th scope="col">Time</th>
                <th scope="col">Description</th>
                <th scope="col">Units</th>
                <th scope="col">Room</th>
                <th scope="col">Yr & Sec</th>
                <th scope="col">Professor ID</th>
                <th scope="col">Action</th>
                
            </tr>
            </thead>
            <tbody>
            @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->Subj_title }}</td>
                    <td>{{ $subject->Subj_day }}</td>
                    <td>{{ $subject->Subj_time }}</td>
                    <td>{{ $subject->Subj_desc }}</td>
                    <td>{{ $subject->Subj_units }}</td>
                    <td>{{ $subject->Subj_room }}</td>
                    <td>{{ $subject->Subj_yr_sec }}</td>
                    <td>{{ $subject->Prof_ID }}</td>
                    <td>

                        <a href="{{ url('/subjectEdit/'.$subject->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>






