<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<a href="{{route('import')}}" class="button">Import data</a>

    <table class="table table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">UID</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Gender</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <th>{{$item->UID}}</th>
                <td>{{$item->Name}}</td>
                <td>{{$item->Age}}</td>
                <td>{{$item->Email}}</td>
                <td>{{$item->Phone}}</td>
                <td>{{$item->Gender}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
