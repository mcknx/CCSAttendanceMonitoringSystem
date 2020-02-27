
<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><b>List of Professors</b></h5>
        <br>
        <blockquote class="card-text">You can find here all the informations about professors in the system.
        You can also create a professor <a href="{{ url('/professorCreate/') }}"><b> here.</b></a>
        </blockquote>

        <table class="table table-responsive">
            <thead class="thead-light">
            <tr>
                <th scope="col">Professor ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Professor Code</th>
                <th scope="col">Subject(s)</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($professors as $professor)
                <tr>
                    <td>{{ $professor->id }}</td>
                    <td>{{ $professor->Prof_fname }}</td>
                    <td>{{ $professor->Prof_lname }}</td>
                    <td>{{ $professor->Prof_mname }}</td>
                    <td>{{ $professor->Prof_code }}</td>
                    <td>{{ $professor->subjects->count() }}</td>
                    <td>

                        <a href="{{ url('/professorEdit/'.$professor->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    </td>
                    <td>
                    <form action="{{ url('/professorDelete/'.$professor->id) }}" method="post">
                        <input onclick="return confirm('Are you sure?')"  type="submit" class="btn btn-sm btn-danger" value="Delete">
                    </form>
                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>






