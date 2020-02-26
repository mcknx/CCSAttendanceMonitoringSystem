<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <b>UNIVERSITY OF THE IMMACULATE CONCEPTION</b>
    <p>FR.SELGA ST., DAVAO CITY</p>
    <b>TEACHER'S CLASS ATTENDANCE</b>
    <br>
    <br>
    <br>
    </center>

    <table border="1" align="center">
    <tr>
        <th>TIME</th>
        <th>DAY/S</th>
        <th>SUBJECT TITLE</th>
        <th>DESCRIPTION</th>
        <th>UNITS</th>
        <th>ROOM</th>
        <th>YEAR/SECTION</th>
        <th>TEACHER</th>
    </tr>
    @foreach ($subjects as $subject)
        <tr>
            <td>{{ $subject->Subj_timein . "-" .$subject->Subj_timeout}}AM</td>
            <td></td>
        </tr>
    @endforeach
    </table>
</body>
</html>